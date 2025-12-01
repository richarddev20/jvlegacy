<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChangelogEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangelogController extends Controller
{
    public function index()
    {
        $entries = ChangelogEntry::visible()
            ->orderByDesc('created_on')
            ->orderByDesc('id')
            ->get();

        return view('admin.changelog.index', compact('entries'));
    }

    public function create()
    {
        return view('admin.changelog.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'version' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
        ]);

        ChangelogEntry::create([
            'version' => $data['version'],
            'title' => $data['title'],
            'body' => $data['body'] ?? null,
            'created_on' => now(),
            'created_by' => optional(Auth::guard('investor')->user())->id,
            'deleted' => 0,
        ]);

        return redirect()->route('admin.changelog.index')
            ->with('success', 'Changelog entry added.');
    }
}



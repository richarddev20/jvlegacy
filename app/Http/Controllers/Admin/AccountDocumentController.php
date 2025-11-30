<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\AccountDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AccountDocumentController extends Controller
{
    public function store(Request $request, $accountId)
    {
        $account = Account::findOrFail($accountId);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|max:10240', // 10MB max
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_private' => 'nullable|boolean',
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::slug($validated['name']) . '_' . time() . '.' . $extension;
        $filePath = $file->storeAs('account-documents/' . $account->id, $fileName, 'public');

        $document = AccountDocument::create([
            'account_id' => $account->id,
            'name' => $validated['name'],
            'file_path' => $filePath,
            'file_type' => $extension,
            'file_size' => $file->getSize(),
            'category' => $validated['category'] ?? 'general',
            'description' => $validated['description'] ?? null,
            'is_private' => $validated['is_private'] ?? true,
            'uploaded_by' => auth()->id(),
            'created_on' => now(),
            'updated_on' => now(),
        ]);

        return redirect()->back()->with('success', 'Document uploaded successfully.');
    }

    public function destroy($documentId)
    {
        $document = AccountDocument::findOrFail($documentId);
        
        // Soft delete
        $document->deleted = true;
        $document->updated_on = now();
        $document->save();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}


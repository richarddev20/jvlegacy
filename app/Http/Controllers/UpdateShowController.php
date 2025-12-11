<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class UpdateShowController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $update = Update::on('legacy')->findOrFail($id);
        // Optionally, add authorization logic here
        return response()->json([
            'id' => $update->id,
            'project_id' => $update->project_id,
            'sent_on' => $update->sent_on ? $update->sent_on->format('d M Y H:i') : null,
            'comment' => $update->comment,
            'category' => $update->category,
        ]);
    }
}

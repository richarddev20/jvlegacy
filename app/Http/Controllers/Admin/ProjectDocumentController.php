<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectDocumentController extends Controller
{
    public function store(Request $request, $projectId)
    {
        $project = Project::where('project_id', $projectId)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|max:10240', // 10MB max
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'show_to_investors' => 'nullable|boolean',
            'is_public' => 'nullable|boolean',
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::slug($validated['name']) . '_' . time() . '.' . $extension;
        $filePath = $file->storeAs('project-documents/' . $project->project_id, $fileName, 'public');

        $document = ProjectDocument::create([
            'project_id' => $project->id,
            'name' => $validated['name'],
            'file_path' => $filePath,
            'file_type' => $extension,
            'file_size' => $file->getSize(),
            'category' => $validated['category'] ?? 'general',
            'description' => $validated['description'] ?? null,
            'show_to_investors' => $validated['show_to_investors'] ?? true,
            'is_public' => $validated['is_public'] ?? false,
            'uploaded_by' => auth()->id(),
            'created_on' => now(),
            'updated_on' => now(),
        ]);

        return redirect()->back()->with('success', 'Document uploaded successfully.');
    }

    public function destroy($documentId)
    {
        $document = ProjectDocument::findOrFail($documentId);
        
        // Soft delete
        $document->deleted = true;
        $document->updated_on = now();
        $document->save();

        // Optionally delete file
        // Storage::disk('public')->delete($document->file_path);

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

    public function updateVisibility(Request $request, $documentId)
    {
        $document = ProjectDocument::findOrFail($documentId);
        
        $validated = $request->validate([
            'show_to_investors' => 'nullable|boolean',
            'is_public' => 'nullable|boolean',
        ]);

        if (isset($validated['show_to_investors'])) {
            $document->show_to_investors = $validated['show_to_investors'];
        }
        if (isset($validated['is_public'])) {
            $document->is_public = $validated['is_public'];
        }
        
        $document->updated_on = now();
        $document->save();

        return redirect()->back()->with('success', 'Document visibility updated.');
    }
}


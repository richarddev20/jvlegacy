<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateShowController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $update = Update::on('legacy')->with('images')->findOrFail($id);
        // Optionally, add authorization logic here
        return response()->json([
            'id' => $update->id,
            'project_id' => $update->project_id,
            'sent_on' => $update->sent_on ? $update->sent_on->format('d M Y H:i') : null,
            'comment' => $update->comment,
            'category' => $update->category,
            'images' => $update->images->filter(function ($image) {
                // Only return actual images - filter by file_type or check if it's an image
                try {
                    $fileType = $image->file_type ?? '';
                    // If file_type is set and it's not 'image', skip it
                    if ($fileType !== '' && $fileType !== 'image') {
                        return false;
                    }
                    // If file_type is empty, assume it's an image (legacy behavior)
                    $filePath = $image->attributes['file_path'] ?? $image->file_path ?? null;
                    return !empty($filePath) && is_string($filePath);
                } catch (\Throwable $e) {
                    return false;
                }
            })->map(function ($image) {
                try {
                    // Build URLs directly from file_path without using accessor methods
                    $filePath = $image->attributes['file_path'] ?? $image->file_path ?? null;
                    
                    if (empty($filePath) || !is_string($filePath)) {
                        return null;
                    }
                    
                    $filePath = trim($filePath);
                    if ($filePath === '') {
                        return null;
                    }
                    
                    $url = asset('storage/' . $filePath);
                    
                    // Build thumbnail URL manually
                    $thumbnailUrl = $url; // Default to regular URL
                    $lastSlash = strrpos($filePath, '/');
                    if ($lastSlash !== false) {
                        $dirname = substr($filePath, 0, $lastSlash);
                        $basename = substr($filePath, $lastSlash + 1);
                        if ($dirname !== false && $basename !== false && is_string($dirname) && is_string($basename)) {
                            $thumbnailPath = $dirname . '/thumb_' . $basename;
                            if (Storage::disk('public')->exists($thumbnailPath)) {
                                $thumbnailUrl = asset('storage/' . $thumbnailPath);
                            }
                        }
                    }
                    
                    return [
                        'url' => $url,
                        'thumbnail_url' => $thumbnailUrl,
                        'description' => $image->description ?? '',
                    ];
                } catch (\Throwable $e) {
                    return null;
                }
            })->filter(function ($image) {
                // Filter out null values and images with no URL
                return $image !== null && !empty($image['url']);
            })->values(),
        ]);
    }
}

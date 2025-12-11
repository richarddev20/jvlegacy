<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

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
            'images' => $update->images->map(function ($image) {
                try {
                    // Safely access all properties with fallbacks
                    $url = '';
                    $thumbnailUrl = '';
                    $isImage = false;
                    
                    try {
                        $url = $image->url ?? '';
                    } catch (\Throwable $e) {
                        $url = '';
                    }
                    
                    try {
                        $thumbnailUrl = $image->thumbnail_url ?? '';
                    } catch (\Throwable $e) {
                        $thumbnailUrl = $url;
                    }
                    
                    try {
                        $isImage = $image->is_image ?? false;
                    } catch (\Throwable $e) {
                        $isImage = false;
                    }
                    
                    return [
                        'url' => is_string($url) ? $url : '',
                        'thumbnail_url' => is_string($thumbnailUrl) ? $thumbnailUrl : $url,
                        'description' => $image->description ?? '',
                        'file_name' => $image->file_name ?? '',
                        'file_type' => $image->file_type ?? '',
                        'is_image' => (bool)$isImage,
                        'icon' => $image->icon ?? 'fas fa-file text-gray-400',
                    ];
                } catch (\Throwable $e) {
                    // If there's any error accessing image properties, return safe defaults
                    \Log::warning('Error mapping update image: ' . $e->getMessage(), [
                        'image_id' => $image->id ?? null,
                        'update_id' => $update->id ?? null,
                    ]);
                    return [
                        'url' => '',
                        'thumbnail_url' => '',
                        'description' => '',
                        'file_name' => '',
                        'file_type' => '',
                        'is_image' => false,
                        'icon' => 'fas fa-file text-gray-400',
                    ];
                }
            })->filter(function ($image) {
                // Filter out images with no URL
                return !empty($image['url']) && is_string($image['url']);
            })->values(),
        ]);
    }
}

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
                    return [
                        'url' => $image->url ?? '',
                        'thumbnail_url' => $image->thumbnail_url ?? '',
                        'description' => $image->description ?? '',
                        'file_name' => $image->file_name ?? '',
                        'file_type' => $image->file_type ?? '',
                        'is_image' => $image->is_image ?? false,
                        'icon' => $image->icon ?? 'fas fa-file text-gray-400',
                    ];
                } catch (\Exception $e) {
                    // If there's an error accessing image properties, return safe defaults
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
                return !empty($image['url']);
            })->values(),
        ]);
    }
}

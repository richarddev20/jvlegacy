<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class UpdateShowController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $update = Update::on('legacy')->with('images')->findOrFail($id);
        
        // Map images to include all necessary attributes
        $images = $update->images->map(function ($image) {
            return [
                'id' => $image->id,
                'url' => $image->url,
                'thumbnail_url' => $image->thumbnail_url,
                'file_name' => $image->file_name,
                'description' => $image->description,
                'is_image' => $image->is_image,
                'icon' => $image->icon,
                'file_type_category' => $image->file_type_category,
            ];
        });
        
        return response()->json([
            'id' => $update->id,
            'project_id' => $update->project_id,
            'sent_on' => $update->sent_on ? $update->sent_on->format('d M Y H:i') : null,
            'comment' => $update->comment,
            'category' => $update->category,
            'images' => $images,
        ]);
    }
}

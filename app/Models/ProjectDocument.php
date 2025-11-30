<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDocument extends Model
{
    protected $connection = 'legacy';
    protected $table = 'project_documents';
    public $timestamps = false;

    protected $fillable = [
        'project_id',
        'name',
        'file_path',
        'file_type',
        'file_size',
        'category',
        'description',
        'show_to_investors',
        'is_public',
        'uploaded_by',
        'created_on',
        'updated_on',
    ];

    protected $casts = [
        'show_to_investors' => 'boolean',
        'is_public' => 'boolean',
        'file_size' => 'integer',
        'created_on' => 'datetime',
        'updated_on' => 'datetime',
        'deleted' => 'boolean',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function uploader()
    {
        return $this->belongsTo(Account::class, 'uploaded_by');
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $connection = 'legacy';
    protected $table = 'email_templates';
    public $timestamps = false;

    protected $fillable = [
        'key',
        'name',
        'subject',
        'body_html',
        'body_text',
        'created_on',
        'updated_on',
        'deleted',
    ];

    protected $casts = [
        'created_on' => 'datetime',
        'updated_on' => 'datetime',
        'deleted' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('deleted', 0);
    }
}



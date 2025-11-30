<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountDocument extends Model
{
    protected $connection = 'legacy';
    protected $table = 'account_documents';
    public $timestamps = false;

    protected $fillable = [
        'account_id',
        'name',
        'file_path',
        'file_type',
        'file_size',
        'category',
        'description',
        'is_private',
        'uploaded_by',
        'created_on',
        'updated_on',
    ];

    protected $casts = [
        'is_private' => 'boolean',
        'file_size' => 'integer',
        'created_on' => 'datetime',
        'updated_on' => 'datetime',
        'deleted' => 'boolean',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
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


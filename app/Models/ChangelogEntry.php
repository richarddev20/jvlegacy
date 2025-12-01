<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangelogEntry extends Model
{
    protected $connection = 'legacy';
    protected $table = 'changelog_entries';
    public $timestamps = false;

    protected $fillable = [
        'version',
        'title',
        'body',
        'commit_hash',
        'created_on',
        'created_by',
        'deleted',
    ];

    protected $casts = [
        'created_on' => 'datetime',
        'deleted' => 'boolean',
    ];

    public function scopeVisible($query)
    {
        return $query->where('deleted', 0);
    }

    public function creator()
    {
        return $this->belongsTo(Account::class, 'created_by');
    }
}



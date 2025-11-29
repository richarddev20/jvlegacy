<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investments extends Model
{
    protected $connection = 'legacy'; // use the legacy DB
    protected $table = 'project_investments';

    public $timestamps = false; // assuming no created_at/updated_at

    protected $fillable = [
        'id', 'project_id', 'account_id', 'transfer_id', 'pay_in_id',
        'amount', 'type', 'paid', 'paid_on', 'reserved_until',
    ];

    // Removed read-only protection to allow admin management

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function project()
    {
        // project_id in investments table is the internal id, not project_id
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            1 => 'Debt',
            2 => 'Mezzanine',
            default => 'Unknown',
        };
    }
}

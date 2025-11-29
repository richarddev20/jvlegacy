<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $connection = 'legacy';
    protected $table = 'people';
    public $timestamps = false;

    protected $fillable = [
        'address_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'nationality',
        'birthplace_city',
        'birthplace_country',
        'email',
        'telephone_number',
        'mobile_number',
        'website',
        'income_range',
        'occupation',
        'avatar_id',
        'active',
    ];
}

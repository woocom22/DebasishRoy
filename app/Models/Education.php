<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable=[
        'duration',
        'institutionName',
        'location',
        'degree',
        'field',
        'details'
    ];
}

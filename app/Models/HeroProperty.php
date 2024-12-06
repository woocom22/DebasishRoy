<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroProperty extends Model
{
    protected $fillable=[
        'keyLine',
        'title',
        'short_title',
        'img'
    ];
}

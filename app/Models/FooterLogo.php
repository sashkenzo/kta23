<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterLogo extends Model
{
    protected $fillable = [
        'name',
        'image',
        'status',
        'homelink',
    ];
}

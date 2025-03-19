<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'image',
        'name',
        'content',
        'button_url_text',
        'button_url',
        'serial',
        'status',
    ];
}

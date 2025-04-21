<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner2Carousel extends Model
{
    protected $fillable = [
        'image',
        'name',
        'button_url',
        'button_url_text',
        'content',
        'status',
    ];
}

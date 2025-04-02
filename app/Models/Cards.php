<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    protected $fillable = [
        'image',
        'name',
        'content',
        'button_text',
        'button_url',
        'status',
    ];
}

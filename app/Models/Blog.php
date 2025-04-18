<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'title',
        'content',
        'short_content',
        'long_content',
        'subcategory_id',
        'status',
        'user_id',
    ];

    public function subCategory(){
        return $this->belongsTo(SubNavBar::class);
    }
}

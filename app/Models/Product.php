<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'user_id',
        'description','short_description',
        'subcategory_id',
        'price',
        'status',
        'image_1', 'image_2', 'image_3', 'image_4',
    ];

    public function category(){
        return $this->belongsTo(NavBar::class);
    }
    public function subCategory(){
        return $this->belongsTo(SubNavBar::class);
    }
    public function userId(){
        return $this->belongsTo(User::class);
    }
}

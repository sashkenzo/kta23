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
        'description',
        'short_description',
        'category_id',
        'subcategory_id',
        'brand_id',
        'price',
        'stock',
        'status',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubNavBar extends Model
{
    protected $fillable = [
        'navbar_id',
        'name',
        'slug',
        'status',
        'type',
    ];
    public function category(){
        return $this->belongsTo(NavBar::class);
    }
}

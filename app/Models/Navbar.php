<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{

    protected $fillable = [

        'name',
        'slug',
        'status',
    ];
    public function subcategorys(){
        return $this->hasMany(SubNavBar::class);}

}

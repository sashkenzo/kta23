<?php


namespace App\Traits;


use Illuminate\Http\Request;

trait controllerTrait{

    public function deleteImage($inputName,$imageName){
        if(public_path($inputName->$imageName)!=public_path(null)){
            unlink(public_path($inputName->$imageName));

        }
    }
}

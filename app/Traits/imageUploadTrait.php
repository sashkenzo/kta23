<?php
namespace App\Traits;


use Illuminate\Http\Request;

trait imageUpload{

    public function uploadImage(Request $request,$inputName,$path){
        if ($request->hasFile($inputName)) {


            $image = $request->{$inputName};
            $imageName = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path($path), $imageName);

            return $path .'/'.$imageName;
        }else{

            return null;
        }
    }
}

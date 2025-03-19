<?php
namespace App\Traits;


use Illuminate\Http\Request;

trait imageUploadTrait{

    public function uploadImage(Request $request,$inputName,$path,$oldPath=null){
        if ($request->hasFile($inputName)) {
            if ($oldPath) {
                unlink(public_path($oldPath));
            }

            $image = $request->{$inputName};
            $imageName = 'media_'.time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path($path), $imageName);

            return $path .'/'.$imageName;
        }else{
            return $oldPath;
        }
    }
}

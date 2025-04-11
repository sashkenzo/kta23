<?php

namespace App\Http\Controllers\Change;

use App\DataTables\BannerDataTable;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerCarousel;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use imageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BannerDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layouts.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = new Banner();

        $request->validate([
            'image'=>['required','image','max:2000'],]);
        $banner->fill($request->validate([
            'name'=>['required','max:100'],
            'content'=>['required','max:200'],
            'button_url'=>['max:200'],
            'status'=>['required'],
        ]));
        $banner->image = $this->uploadImage($request,'image','upload/carousel',$banner->image);
        $banner->save();
        return redirect()->route('change.banner')->with('status','Banner created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('dashboard.layouts.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'image'=>['nullable','image','max:2000'],]);

        $banner->fill($request->validate([
            'name'=>['required','max:100'],
            'content'=>['required','max:200'],
            'button_url'=>['max:200'],
            'status'=>['required'],
        ]));
        $banner->image = $this->uploadImage($request,'image','upload/carousel',$banner->image);
        $banner->save();
        return redirect()->route('change.banner')->with('status','Banner update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        if(public_path($banner->image)!=public_path(null)){
            unlink(public_path($banner->image));
        }
        $banner->delete();
        return redirect()->route('change.banner')->with('status','Banner deleted successfully');

    }
    public function changeStatusBtn(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->fill($request->validate([
            'status'=>['required'],]));
        $banner->save();
        return redirect()->route('change.banner')->with('status','Banner id: '.$banner->id.' status was updated successfully')->with('success','success');
    }
}

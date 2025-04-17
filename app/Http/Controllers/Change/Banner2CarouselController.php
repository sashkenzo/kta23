<?php

namespace App\Http\Controllers\Change;

use App\DataTables\Banner2CarouselDataTable;
use App\Http\Controllers\Controller;
use App\Models\Banner2Carousel;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;

class Banner2CarouselController extends Controller
{
    use imageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Banner2CarouselDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.bannercarousel.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layouts.bannercarousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner2carousel = new Banner2Carousel();

        $request->validate([
            'image' => ['required', 'image', 'max:2000'],]);
        $banner2carousel->fill($request->validate([
            'name' => ['required', 'max:100'],
            'button_url' => ['required','max:200'],
            'serial' => ['required'],
            'status' => ['required'],
        ]));
        $banner2carousel->image = $this->uploadImage($request, 'image', 'upload', $banner2carousel->image);
        $banner2carousel->save();
        return redirect()->route('change.bannercarousel')->with('status', 'Banner-Carousel created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bannercarousel = Banner2Carousel::findOrFail($id);
        return view('dashboard.layouts.bannercarousel.edit', compact('bannercarousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            $bannercarousel = Banner2Carousel::findOrFail($id);

            $request->validate([
                'image' => ['nullable', 'image', 'max:2000'],]);

            $bannercarousel->fill($request->validate([
                'name' => ['required', 'max:100'],
                'button_url' => ['max:200'],
                'serial' => ['required'],
                'status' => ['required'],
            ]));
            $bannercarousel->image = $this->uploadImage($request, 'image', 'upload', $bannercarousel->image);
            $bannercarousel->save();
            return redirect()->route('change.bannercarousel')->with('status', 'Banner-Carousel update successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bannercarousel = Banner2Carousel::findOrFail($id);
        if (public_path($bannercarousel->image) != public_path(null)) {
            unlink(public_path($bannercarousel->image));
        }
        $bannercarousel->delete();
        return redirect()->route('change.bannercarousel')->with('status', 'Banner-Carousel deleted successfully');

    }

    public function changeStatusBtn(Request $request, string $id)
    {
        $bannercarousel = Banner2Carousel::findOrFail($id);
        $bannercarousel->fill($request->validate([
            'status'=>['required'],]));
        $bannercarousel->save();
        return redirect()->route('change.bannercarousel')->with('status','Carousel id: '.$bannercarousel->id.' status was updated successfully')->with('success','success');
    }
}

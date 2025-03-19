<?php

namespace App\Http\Controllers\Change;

use App\DataTables\CarouselDataTable;
use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    use imageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CarouselDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.carousel.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layouts.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carousel = new Carousel();

        $request->validate([
            'image'=>['required','image','max:2000'],]);
        $carousel->fill($request->validate([
            'name'=>['required','max:100'],
            'content'=>['required','max:200'],
            'button_url'=>['max:200'],
            'button_url_text'=>['max:20'],
            'serial'=> ['required'],
            'status'=>['required'],
        ]));
        $carousel->image = $this->uploadImage($request,'image','upload',$carousel->image);
        $carousel->save();
            return redirect()->route('change.carousel')->with('status','Carousel created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carousel = Carousel::findOrsFail($id);
        return view('dashboard.layouts.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carousel = Carousel::findOrFail($id);

        $request->validate([
            'image'=>['nullable','image','max:2000'],]);

        $carousel->fill($request->validate([
            'name'=>['required','max:100'],
            'content'=>['required','max:200'],
            'button_url'=>['max:200'],
            'button_url_text'=>['max:20'],
            'serial'=> ['required'],
            'status'=>['required'],
        ]));
        $carousel->image = $this->uploadImage($request,'image','upload',$carousel->image);
        $carousel->save();
        return redirect()->route('change.carousel')->with('status','Carousel update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $carousel = Carousel::findOrFail($id);
      if(public_path($carousel->image)!=public_path(null)){
          unlink(public_path($carousel->image));
      }
      $carousel->delete();
      return redirect()->route('change.carousel')->with('status','Carousel deleted successfully');

    }
}

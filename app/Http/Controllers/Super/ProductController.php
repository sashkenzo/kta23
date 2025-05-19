<?php

namespace App\Http\Controllers\Super;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\controllerTrait;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use imageUploadTrait;
    use controllerTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layouts.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $request->validate([
            'image' => ['required']]);
        $product->fill($request->validate([
            'name' => ['required', 'max:100'],
            'user_id' => ['required'],
            'status' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'short_description' => ['required'],
            'subcategory_id' => ['required'],
        ]));

        $product->slug=time().'-'.Str::slug($product->name);
        $product->type='product';

        $images=['image','image_2','image_3','image_4'];

        foreach($images as $image){
            if($request->$image){
                $request->validate([
                    $image => ['nullable', 'image', 'max:2000'],]);
                $product->$image = $this->uploadImage($request, $image, 'upload/product/pics/'.$product->slug, $product->$image);
            }
        }
        $product->save();

        return redirect()->route('product')->with('status', 'Product created successfully')->with('success','success');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('status', 1)->where('slug',$slug)->first();
        return view('layouts.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('dashboard.layouts.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, string $id)
    {
        $product = Product::findOrFail($id);
        if($product->slug!=Str::slug($product->name)){
            $product->fill($request->validate([
                'name' => ['required', 'max:100'],
                'user_id' => ['required'],
                'status' => ['required'],
                'price' => ['required'],
                'description' => ['required'],
                'short_description' => ['required'],
                'subcategory_id' => ['required'],
        ]));

        $product->slug=time().'-'.Str::slug($product->name);
        $product->type='product';
        $images=['image','image_2','image_3','image_4'];
        foreach($images as $image){
            if($request->$image){
                $request->validate([
                    $image => ['nullable', 'image', 'max:2000'],]);
                $product->$image = $this->uploadImage($request, $image, 'upload/product/pics/'.$product->slug, $product->$image);
            }
        }
        $product->save();

        return redirect()->route('product')->with('status', 'Product created successfully')->with('success','success');
        }else{
            return redirect()->route('product')->with('status', 'Something went wrong')->with('success','danger');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $images=['image','image_2','image_3','image_4'];
        foreach($images as $image) {
            $this->deleteImage($product, $image);
        }
        $product->delete();
        return redirect()->route('product')->with('status','A product deleted successfully')->with('success','success');

    }


    public function changeStatusBtn(Request $request, string $slug)
    {
        $product = Product::where('slug',$slug)->get();
        $product[0]->fill($request->validate([
            'status'=>['required'],]));
        $product[0]->save();
        return redirect()->route('product')->with('status','Product: '.$product[0]->slug.' status was updated successfully')->with('success','success');
    }
}

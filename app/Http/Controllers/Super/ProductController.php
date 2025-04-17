<?php

namespace App\Http\Controllers\Super;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use imageUploadTrait;
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

        $product->fill($request->validate([
            'name' => ['required', 'max:100'],
            'user_id' => ['required'],
            'status' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'short_description' => ['required'],
            'subcategory_id' => ['required'],
            'stock' => ['required'],

        ]));

        $product->slug=Str::slug($product->name);
        $product->type='product';
        if($request->image){
            $request->validate([
                'image' => ['nullable', 'image', 'max:2000'],]);
            $product->image = $this->uploadImage($request, 'image', 'upload/product/pics/'.$product->slug, $product->image);
        }
        if($request->image_2){
            $request->validate([
                'image_2' => ['nullable', 'image', 'max:2000'],]);
            $product->image_2 = $this->uploadImage($request, 'image_2', 'upload/product/pics/'.$product->slug, $product->image_2);
        }
        if($request->image_3){
            $request->validate([
                'image_3' => ['nullable', 'image', 'max:2000'],]);
            $product->image_3 = $this->uploadImage($request, 'image_3', 'upload/product/pics/'.$product->slug, $product->image_3);
        }
        if($request->image_4){
            $request->validate([
                'image_4' => ['nullable', 'image', 'max:2000'],]);
            $product->image_4 = $this->uploadImage($request, 'image_4', 'upload/product/pics/'.$product->slug, $product->image_4);
        }

        $product->save();

        return redirect()->route('product')->with('status', 'Product created successfully')->with('success','success');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('status', 1)->where('slug',$slug)->get();
        return view('layouts.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $id)
    {
        return view('dashboard.layouts.product.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, string $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $product = Product::where('slug',$slug)->get();
        if(public_path($product[0]->image)!=public_path(null)){
            unlink(public_path($product->image));
        }
        if(public_path($product[0]->image_2)!=public_path(null)){
            unlink(public_path($product->image_2));
        }
        if(public_path($product[0]->image_3)!=public_path(null)){
            unlink(public_path($product->image_3));
        }
        if(public_path($product[0]->image_4)!=public_path(null)){
            unlink(public_path($product->image_4));
        }
        $product[0]->delete();
        return redirect()->route('product')->with('status','A product deleted successfully');

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

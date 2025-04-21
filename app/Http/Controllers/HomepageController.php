<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Banner2Carousel;
use App\Models\Cards;
use App\Models\Footer;
use App\Models\Product;
use App\Models\SubNavBar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('homepage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $subnavs = SubNavBar::where('slug',$slug)->get();
        if($subnavs[0]->type=='product'){
            $products = Product::where('status',1)->where('subcategory_id',$subnavs[0]->id)->paginate(12);

            $catName = $subnavs[0]->name;
            return view('layouts.productsubnav',compact('products'),compact('catName'));
        }
        if($subnavs[0]->type=='blog'){
            $contents = Blog::where('status',1)->where('subcategory_id',$subnavs[0]->id)->get();
            if($contents!=null){
                $blogs = Blog::where('status',1)->where('subcategory_id',$subnavs[0]->id)->first();

            }else{
                return view('layouts.error');}
            $catName = $subnavs[0]->name;
            return view('layouts.blogsubnav', compact('contents'),compact('catName'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

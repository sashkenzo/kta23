<?php

namespace App\Http\Controllers\Super;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layouts.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $blog = new Blog();
        $blog->fill($request->validate([
            'name' => ['required', 'max:100'],
            'user_id' => ['required'],
            'status' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'short_content' => ['required'],
            'long_content' => ['required'],
            'subcategory_id' => ['required'],

        ]));
        $blog->slug=Str::slug($blog->name);
        $blog->save();

        return redirect()->route('super.blog')->with('status', 'Product created successfully')->with('success','success');


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
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}

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
        $blog->slug=time().Str::slug($blog->name);
        $blog->save();

        return redirect()->route('blog')->with('status', 'Product created successfully')->with('success','success');


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
        $blog = Blog::where('slug',$slug)->get();
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
        $blog->slug=time().Str::slug($blog->name);
        $blog->save();

        return redirect()->route('blog')->with('status', 'Product created successfully')->with('success','success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $slug)
    {
        $blog = Blog::where('slug',$slug)->get();
        $blog->delete();
        return redirect()->route('blog')->with('status','A blog deleted successfully')->with('success','success');

    }

    public function changeStatusBtn(Request $request, string $slug)
    {
        $blog = Blog::where('slug',$slug)->get();
        $blog[0]->fill($request->validate([
            'status'=>['required'],]));
        $blog[0]->save();
        return redirect()->route('blog')->with('status','Blog: '.$blog[0]->slug.' status was updated successfully')->with('success','success');
    }
}

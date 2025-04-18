<?php

namespace App\Http\Controllers\Change;

use App\DataTables\SubNavBarDataTable;
use App\Http\Controllers\Controller;
use App\Models\Navbar;
use App\Models\SubNavBar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubNavBarController extends Controller
{
    public function index(SubNavbarDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.subnavbar.index');
    }

    public function create()
    {
        $navs = Navbar::all();
        return view('dashboard.layouts.subnavbar.create',compact('navs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subnavs = new SubNavBar();

        $subnavs->fill($request->validate([
            'navbar_id' => 'required',
            'name'=>['required','max:200','unique:sub_nav_bars,name'],
            'type'=>['required'],
            'status'=>['required'],
        ]));
        $subnavs->slug=Str::slug($subnavs->name);
        $subnavs->save();

        return redirect()->route('change.subnavs')->with('status','Sub-category for navbar created successfully')->with('success','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $subnavs = SubNavBar::where('slug',$slug)->get();
        if($subnavs[0]->type=='product'){
            return view('layouts.productsubnav');
        }
        if($subnavs[0]->type=='blog'){
            return view('layouts.blogsubnav');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $navs = Navbar::all();
        $subnav = SubNavBar::findOrFail($id);
        return view('dashboard.layouts.subnavbar.edit',compact('subnav','navs'))->with('success','success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subnavs = SubNavBar::findOrFail($id);

        $subnavs->fill($request->validate([
            'navbar_id' => 'required',
            'name' => ['required', 'max:200', 'unique:sub_nav_bars,name,'.$id],
            'type'=>['required'],
            'status' => ['required'],
        ]));

        $subnavs->slug = Str::slug($subnavs->name);
        $subnavs->save();
        return redirect()->route('change.subnavs')->with('status', 'Sub-category for NavBar updated successfully','')->with('success','success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subnavbar = SubNavBar::findOrFail($id);
        $subnavbar->delete();
        return redirect()->route('change.subnavbar')->with('status','Sub-category for NavBar deleted successfully')->with('success','success');

    }
    public function changeStatusBtn(Request $request, string $id)
    {
        $subnavbar = SubNavBar::findOrFail($id);
        $subnavbar->fill($request->validate([
            'status'=>['required'],]));
        $subnavbar->save();
        return redirect()->route('change.subnavbar')->with('status','SubCategory id: '.$subnavbar->id.' status was updated successfully')->with('success','success');
    }
}

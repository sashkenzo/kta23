<?php

namespace App\Http\Controllers\Change;

use App\DataTables\SubNavBarDataTable;
use App\Http\Controllers\Controller;
use App\Models\Navbar;
use App\Models\SubNavbar;
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

        return redirect()->route('change.subnavs')->with('status','Sub-category for navbar created successfully');
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
        $navs = Navbar::all();
        $subnav = SubNavBar::findOrFail($id);
        return view('dashboard.layouts.subnavbar.edit',compact('subnav','navs'));
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
        return redirect()->route('change.subnavs')->with('status', 'Sub-category for NavBar updated successfully','');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subnavbar = Navbar::findOrFail($id);
        $subnavbar->delete();
        return redirect()->route('change.subnavbar')->with('status','Sub-category for NavBar deleted successfully');

    }
}

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
        $navbars = Navbar::all();
        return view('dashboard.layouts.subnavbar.create',compact('navbars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subnavbar = new SubNavBar();

        $subnavbar->fill($request->validate([
            'category_id' => 'required',
            'name'=>['required','max:200','unique:sub_nav_bars,name'],
            'slug'=>['required','max:200'],
            'status'=>['required'],
        ]));
        $subnavbar->slug=Str::slug($request->slug);
        $subnavbar->save();

        return redirect()->route('change.subnavbar')->with('status','Sub-category for navbar created successfully');
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
        $navbars = Navbar::all();
        $subnavbar = SubNavBar::findOrFail($id);
        return view('dashboard.layouts.subnavbar.edit',compact('subnavbar','navbars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subnavbar = SubNavBar::findOrFail($id);
        $subnavbar->fill($request->validate([
            'category_id' => 'required',
            'name' => ['required', 'max:200', 'unique:sub_nav_bars,name,'.$id],
            'slug' => ['required', 'max:200'],
            'status' => ['required'],
        ]));

        $subnavbar->slug = Str::slug($request->slug);
        $subnavbar->save();
        return redirect()->route('change.subnavbar')->with('status', 'Sub-category for NavBar updated successfully','');

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

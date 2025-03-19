<?php

namespace App\Http\Controllers\Change;

use App\DataTables\NavbarDataTable;
use App\Http\Controllers\Controller;
use App\Models\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NavbarController extends Controller
{

    public function index(NavbarDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.navbar.index');
    }

    public function create()
    {
        return view('dashboard.layouts.navbar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $navbar = new Navbar();

        $navbar->fill($request->validate([
            'name'=>['required','max:100','unique:navbars,name'],
            'slug'=>['required','max:200'],
            'icon'=>['nullable','max:2048'],
            'status'=>['required'],
        ]));
        $navbar->icon = substr($navbar->icon, 0,5).'width="24" height ="24" '.substr($navbar->icon, 5,null);
        $navbar->slug=Str::slug($request->slug);
        $navbar->save();

        return redirect()->route('change.navbar')->with('status','Carousel created successfully');
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
        $navbar = Navbar::findOrFail($id);
        return view('dashboard.layouts.navbar.edit',compact('navbar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $navbar = Navbar::findOrFail($id);

        $oldIcon = $navbar->icon;

        $navbar->fill($request->validate([
            'name' => ['required', 'max:100', 'unique:navbars,name'],
            'slug' => ['required', 'max:200'],
            'status' => ['required'],
        ]));

        $navbar->slug = Str::slug($request->slug);
        $navbar->save();
        return redirect()->route('change.navbar')->with('status', 'navbar category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $navbar = Navbar::findOrFail($id);
        $navbar->delete();
        return redirect()->route('change.navbar')->with('status','Navbar Category deleted successfully');

    }
}

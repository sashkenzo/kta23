<?php

namespace App\Http\Controllers\Change;

use App\DataTables\NavbarDataTable;
use App\Http\Controllers\Controller;
use App\Models\Navbar;
use App\Models\SubNavBar;
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
        $nav = new Navbar();

        $nav->fill($request->validate([
            'name'=>['required','max:200','unique:navbars,name'],
            'top' => ['required'],
            'bottom' => ['required'],
            'status'=>['required'],
        ]));
        $nav->slug=Str::slug($nav->name);
        $nav->save();

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
        $nav = Navbar::findOrFail($id);
        return view('dashboard.layouts.navbar.edit',compact('nav'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nav= Navbar::findOrFail($id);
        $nav->fill($request->validate([
            'name' => ['required', 'max:200', 'unique:navbars,name,'.$id],
            'top' => ['required'],
            'bottom' => ['required'],
            'status'=>['required'],
        ]));

        $nav->slug = Str::slug($nav->name);
        $nav->save();
        return redirect()->route('change.navs')->with('status', 'navbar category updated successfully')->with('success','success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nav = Navbar::findOrFail($id);
        $subnavs = SubNavBar::where('navbar_id',$id)->count();
        if($subnavs > 0 ){
            return redirect()->route('change.navs')->with('status','Cant delete element. It has sub categorys')->with('success','danger');
        }else{
            $nav->delete();
            return redirect()->route('change.navs')->with('status','Navbar Category deleted successfully')->with('success','success');
        }
    }
    public function changeStatusBtn(Request $request, string $id)
    {
        $nav = Navbar::findOrFail($id);
        $nav->fill($request->validate([
            'status'=>['required'],]));
        $nav->save();
        return redirect()->route('change.navs')->with('status','Navigation id: '.$nav->id.' status was updated successfully')->with('success','success');
    }
}

<?php

namespace App\Http\Controllers\Change;

use App\DataTables\FooterDataTable;
use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index(FooterDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.footer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layouts.footer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $footer = new Footer();
        $footer->fill($request->validate([
            'name'=>['required','max:100'],
            'status'=>['required'],
        ]));
        $footer->save();
        return redirect()->route('change.footer')->with('status','Footer created successfully');
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
        $footer = Footer::findOrFail($id);
        return view('dashboard.layouts.footer.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $footer = Footer::findOrFail($id);

        $footer->fill($request->validate([
            'name'=>['required','max:100'],
            'status'=>['required'],
        ]));
        $footer->save();
        return redirect()->route('change.footer')->with('status','Footer update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footer = footer::findOrFail($id);
        $footer->delete();
        return redirect()->route('change.footer')->with('status','Footer deleted successfully');

    }
}

<?php

namespace App\Http\Controllers\Change;

use App\DataTables\FooterLogoDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterLogo;
use App\Traits\controllerTrait;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;

class FooterLogoController extends Controller
{
    use imageUploadTrait;
    use controllerTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(FooterLogoDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.footerlogo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layouts.footerlogo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $footerlogo = new FooterLogo();

        $request->validate([
            'image' => ['required', 'image', 'max:2000'],]);
        $footerlogo->fill($request->validate([
            'name' => ['required', 'max:100'],
            'status' => ['required'],
        ]));
        $footerlogo->image = $this->uploadImage($request, 'image', 'upload/logo', $footerlogo->image);
        $footerlogo->save();
        return redirect()->route('change.footerlogo')->with('status', 'Footer logo created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(FooterLogo $footerLogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $footerlogo = FooterLogo::findOrFail($id);
        return view('dashboard.layouts.footerlogo.edit', compact('footerlogo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
            $footerlogo = FooterLogo::findOrFail($id);

            $request->validate([
                'image' => ['required', 'image', 'max:2000'],]);
            $footerlogo->fill($request->validate([
                'name' => ['required', 'max:100'],
                'status' => ['required'],
            ]));
            $footerlogo->image = $this->uploadImage($request, 'image', 'upload/logo', $footerlogo->image);
            $footerlogo->save();
            return redirect()->route('change.footerlogo')->with('status', 'Footer logo created successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footerlogo = FooterLogo::findOrFail($id);
        $this->deleteImage($footerlogo, 'image');
        $footerlogo->delete();
        return redirect()->route('change.footerlogo')->with('status','A Logo deleted successfully');
    }

    public function changeStatusBtn(Request $request, string $id)
    {
        $footerlogo = FooterLogo::findOrFail($id);
        $footerlogo->fill($request->validate([
            'status'=>['required'],]));
        $footerlogo->save();
        return redirect()->route('change.footerlogo')->with('status','Logo id: '.$footerlogo->id.' status was updated successfully')->with('success','success');
    }

}

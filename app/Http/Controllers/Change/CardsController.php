<?php

namespace App\Http\Controllers\Change;

use App\DataTables\CardsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Cards;
use App\Traits\controllerTrait;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    use imageUploadTrait;
    use controllerTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CardsDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.cards.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layouts.cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cards = new Cards();

        $request->validate([
            'image'=>['required','image','max:2000'],]);
        $cards->fill($request->validate([
            'name'=>['required','max:100'],
            'content'=>['required','max:1000'],
            'button_url'=>['max:300'],
            'status'=>['required'],
        ]));
        $cards->image = $this->uploadImage($request,'image','upload/cards',$cards->image);
        $cards->save();
        return redirect()->route('change.cards')->with('status','A card was created successfully');
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
        $cards = Cards::findOrFail($id);
        return view('dashboard.layouts.cards.edit', compact('cards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cards = Cards::findOrFail($id);

        $request->validate([
            'image'=>['nullable','image','max:2000'],]);

        $cards->fill($request->validate([
            'name'=>['required','max:100'],
            'content'=>['required','max:1000'],
            'button_url'=>['max:300'],
            'status'=>['required'],
        ]));
        $cards->image = $this->uploadImage($request,'image','upload/cards',$cards->image);
        $cards->save();
        return redirect()->route('change.cards')->with('status','A card was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cards = Cards::findOrFail($id);
        $this->deleteImage($cards, 'image');
        $cards->delete();
        return redirect()->route('change.cards')->with('status','A card deleted successfully');

    }
    public function changeStatusBtn(Request $request, string $id)
    {
        $cards = Cards::findOrFail($id);
        $cards->fill($request->validate([
            'status'=>['required'],]));
        $cards->save();
        return redirect()->route('change.cards')->with('status','Card id: '.$cards->id.' status was updated successfully')->with('success','success');
    }
}

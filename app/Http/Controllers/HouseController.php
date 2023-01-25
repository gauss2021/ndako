<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\House;
use App\Models\Category;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;

        $user = User::find($id);

        $houses = $user->houses()->get();

        $categories = Category::all();
        return view('house.index', compact('houses', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHouseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ville' => ['required', 'string'],
            'quartier' => ['required', 'string'],
            'prix' => ['required', 'integer'],
            'quotient' => ['required', 'integer'],
            'categorie' => ['required', 'integer'],
            'image' => ['required', 'image'],

        ]);

        //traitement image
        $image = $request->image->store('house');

        //traitement du selecteur des categories
        $categorie = Category::find($request->categorie);

        House::create([
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'prix' => $request->prix,
            'nb_quotient' => $request->quotient,
            'categorie_id' => $categorie->id,
            'image' => $image,
            'user_id' => auth()->user()->id,
            'description' => 'Une description'
        ]);

        return redirect()->route('house.index')->with('success', 'Votre maison a ete mise en location avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHouseRequest  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHouseRequest $request, House $house)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\House;
use App\Models\Category;
use App\Models\HouseImage;
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
            'images' => ['required'],
            'images.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        //traitement du selecteur des categories
        $categorie = Category::find($request->categorie);

        $currentHouse = House::create([
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'prix' => $request->prix,
            'nb_quotient' => $request->quotient,
            'categorie_id' => $categorie->id,
            'user_id' => auth()->user()->id,
        ]);


        foreach ($request->file('images') as $image) {
            $imageName = $image->store('houses');

            HouseImage::create([
                'path' => $imageName,
                'house_id' => $currentHouse->id
            ]);
        }

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
        $images = $house->houseImages()->get();
        return view('house.show', compact('house', 'images'));
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
    public function update(Request $request, House $house)
    {
        $request->validate([
            'ville' => ['string'],
            'quartier' => ['string'],
            'prix' => ['integer'],
            'quotient' => ['integer'],
            'categorie' => ['integer'],
            'images.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        //traitement du selecteur des categories
        $categorie = Category::find($request->categorie);

        if (isset($request->ville) and !empty($request->ville)) {
            $house->ville = $request->ville;
        }

        if (isset($request->quartier) and !empty($request->quartier)) {
            $house->quartier = $request->quartier;
        }

        if (isset($request->prix) and !empty($request->prix)) {
            $house->prix = $request->prix;
        }

        if (isset($request->quotient) and !empty($request->quotient)) {
            $house->nb_quotient = $request->quotient;
        }

        if (isset($categorie->id) and !empty($categorie->id)) {
            $house->categorie_id = $categorie->id;
        }

        $house->save();

        if (null !== $request->file('images') and !empty($request->file('images'))) {

            foreach ($request->file('images') as $image) {
                $imageName = $image->store('houses');

                $houseImage = HouseImage::find($house->id);

                $houseImage->path = $imageName;

                $houseImage->save();
            }
        }
        return redirect()->route('house.index')->with('updateHouse', 'Modification effectuee avec success');
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

    public function retireHouseOfLocation(House $house)
    {

        $house->delete();

        return redirect()->route('house.index')->with('retireHouse', 'Votre maison a bien ete retiree de la location ');
    }
}

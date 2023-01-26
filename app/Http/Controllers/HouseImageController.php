<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHouseImageRequest;
use App\Http\Requests\UpdateHouseImageRequest;
use App\Models\HouseImage;

class HouseImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreHouseImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHouseImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseImage  $houseImage
     * @return \Illuminate\Http\Response
     */
    public function show(HouseImage $houseImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseImage  $houseImage
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseImage $houseImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHouseImageRequest  $request
     * @param  \App\Models\HouseImage  $houseImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHouseImageRequest $request, HouseImage $houseImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseImage  $houseImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseImage $houseImage)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\IspitCollection;
use App\Http\Resources\IspitResource;
use App\Models\Ispit;
use Illuminate\Http\Request;

class IspitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ispiti = Ispit::all();
        return new IspitCollection($ispiti);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ispit  $ispit
     * @return \Illuminate\Http\Response
     */
    public function show(Ispit $ispit)
    {
        return new IspitResource($ispit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ispit  $ispit
     * @return \Illuminate\Http\Response
     */
    public function edit(Ispit $ispit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ispit  $ispit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ispit $ispit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ispit  $ispit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ispit $ispit)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrijavaCollection;
use App\Http\Resources\PrijavaResource;
use App\Models\Prijava;
use Illuminate\Http\Request;

class PrijavaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prijave = Prijava::all();
        return new PrijavaCollection($prijave);
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
     * @param  \App\Models\Prijava  $prijava
     * @return \Illuminate\Http\Response
     */
    public function show(Prijava $prijava)
    {
        return new PrijavaResource($prijava);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prijava  $prijava
     * @return \Illuminate\Http\Response
     */
    public function edit(Prijava $prijava)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prijava  $prijava
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prijava $prijava)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prijava  $prijava
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prijava $prijava)
    {
        //
    }
}

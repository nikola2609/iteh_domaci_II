<?php

namespace App\Http\Controllers;

use App\Http\Resources\IspitCollection;
use App\Http\Resources\IspitResource;
use App\Models\Ispit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IspitController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $ispiti = Ispit::all();
        return new IspitCollection($ispiti);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'naziv_predmeta' => 'required|string',
            'katedra' => 'required|string',
            'godina_studija' => 'required|string',
            'espb' => 'required|string',
            'semestar' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $ispit = Ispit::create([
            'naziv_predmeta' => $request->naziv_predmeta,
            'katedra' => $request->katedra,
            'godina_studija' => $request->godina_studija,
            'espb' => $request->espb,
            'semestar' => $request->semestar,
        ]);

        return response()->json(['Ispit uspesno sacuvan', new IspitResource($ispit)]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ispit $ispit
     * @return \Illuminate\Http\Response
     */
    public function show(Ispit $ispit) {
        return new IspitResource($ispit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ispit $ispit
     * @return \Illuminate\Http\Response
     */
    public function edit(Ispit $ispit) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ispit $ispit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ispit $ispit) {
        $validator = Validator::make($request->all(), [
            'naziv_predmeta' => 'required|string',
            'katedra' => 'required|string',
            'godina_studija' => 'required|string',
            'espb' => 'required|string',
            'semestar' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $ispit->naziv_predmeta = $request->naziv_predmeta;
        $ispit->katedra = $request->katedra;
        $ispit->godina_studija = $request->godina_studija;
        $ispit->espb = $request->espb;
        $ispit->semestar = $request->semestar;

        $ispit->save();

        return response()->json(['Ispit uspesno azuriran', new IspitResource($ispit)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ispit $ispit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ispit $ispit) {
        $ispit->delete();
        return response()->json('Ispit uspesno izbrisan');
    }
}

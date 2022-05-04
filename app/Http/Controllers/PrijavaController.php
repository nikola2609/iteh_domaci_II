<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrijavaCollection;
use App\Http\Resources\PrijavaResource;
use App\Models\Prijava;
use App\Rules\PostojiIspit;
use App\Rules\PostojiStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrijavaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $prijave = Prijava::all();
        return new PrijavaCollection($prijave);
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
            'student_id' => ['required', 'integer', new PostojiStudent()],
            'ispit_id' => ['required', 'integer', new PostojiIspit()],
            'ispitni_rok' => 'required|string',
            'datum_prijave' => 'required|date',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $prijava = Prijava::create([
            'student_id' => $request->student_id,
            'ispit_id' => $request->ispit_id,
            'ispitni_rok' => $request->ispitni_rok,
            'datum_prijave' => $request->datum_prijave,

        ]);

        return response()->json(['Pijava uspesno sacuvana', new PrijavaResource($prijava)]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Prijava $prijava
     * @return \Illuminate\Http\Response
     */
    public function show(Prijava $prijava) {
        return new PrijavaResource($prijava);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Prijava $prijava
     * @return \Illuminate\Http\Response
     */
    public function edit(Prijava $prijava) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Prijava $prijava
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prijava $prijava) {
        $validator = Validator::make($request->all(), [
            'student_id' => ['required', 'integer', new PostojiStudent()],
            'ispit_id' => ['required', 'integer', new PostojiIspit()],
            'ispitni_rok' => 'required|string',
            'datum_prijave' => 'required|date',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $prijava->student_id = $request->student_id;
        $prijava->ispit_id = $request->ispit_id;
        $prijava->ispitni_rok = $request->ispitni_rok;
        $prijava->datum_prijave = $request->datum_prijave;

        $prijava->save();

        return response()->json(['Pijava uspesno sacuvana', new PrijavaResource($prijava)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Prijava $prijava
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prijava $prijava) {
        $prijava->delete();
        return response()->json('Prijava uspesno izbrisana');
    }
}

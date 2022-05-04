<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $studenti = Student::all();
        return new StudentCollection($studenti);
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
            'broj_indeksa' => 'required|string|max:100',
            'ime_prezime' => 'required|string|max:100',
            'datum_rodjenja' => 'required|date',
            'email' => 'required',
            'mesto_stanovanja' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $student = Student::create([
            'broj_indeksa' => $request->broj_indeksa,
            'ime_prezime' => $request->ime_prezime,
            'datum_rodjenja' => $request->datum_rodjenja,
            'email' => $request->email,
            'mesto_stanovanja' => $request->mesto_stanovanja,

        ]);

        return response()->json(['Student uspesno sacuvan', new StudentResource($student)]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student) {
        return new StudentResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student) {
        $validator = Validator::make($request->all(), [
            'broj_indeksa' => 'required|string|max:100',
            'ime_prezime' => 'required|string|max:100',
            'datum_rodjenja' => 'required|date',
            'email' => 'required|string',
            'mesto_stanovanja' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $student->broj_indeksa = $request->broj_indeksa;
        $student->ime_prezime = $request->ime_prezime;
        $student->datum_rodjenja = $request->datum_rodjenja;
        $student->email = $request->email;
        $student->mesto_stanovanja = $request->mesto_stanovanja;

        $student->save();

        return response()->json(['Student uspesno azuriran', new StudentResource($student)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student) {
        $student->delete();
        return response()->json('Student uspesno izbrisan');
    }
}

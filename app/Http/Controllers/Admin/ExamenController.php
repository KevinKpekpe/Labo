<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamenFormRequest;
use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            return view('admin.examens.index',['examens'=>Examen::all()]);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {

            return view('admin.examens.form',['examen'=> new Examen()]);
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(ExamenFormRequest $request)
        {
            //dd($request->validated());
            $examen = Examen::create($request->validated());
            return  redirect()->route('admin.examens.index')->with('success', 'Créer soumis avec succès.');
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
        public function edit(Examen $examen)
        {
            return view('admin.examens.form',['examen'=> $examen]);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(ExamenFormRequest $request, Examen $examen)
        {
            //dd($request->validated());
            $examen->update($request->validated());
            return  redirect()->route('admin.examens.index')->with('success', 'Modifier soumis avec succès.');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Examen $examen)
        {
            $examen->delete();
            return  redirect()->route('admin.examens.index')->with('success', 'Supprimer soumis avec succès.');
        }
}

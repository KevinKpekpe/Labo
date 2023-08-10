<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientFormRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.patients.index',['patients'=> Patient::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patients.form',['patient'=>new Patient()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientFormRequest $request)
    {
        //dd($request->validated());
        $patient = Patient::create($request->validated());
        return redirect()->route('admin.patients.index')->with('success', 'Formulaire soumis avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('admin.patients.form',['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientFormRequest $request, Patient $patient)
    {
        //dd($request->validated());
        $patient->update($request->validated());
        return redirect()->route('admin.patients.index')->with('success', 'Formulaire soumis avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('admin.patients.index')->with('success', 'Formulaire soumis avec succès.');
    }
}

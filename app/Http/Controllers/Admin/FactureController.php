<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FactureRequestForm;
use App\Models\Facture;
use App\Models\Patient;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.facture.index', ['factures' => Facture::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facture.form',['facture' => new Facture(), 'patients' => Patient::all(),]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FactureRequestForm $request)
    {
        //dd($request->validated());
        $facture = Facture::create($request->validated());
        return redirect()->route('admin.factures.index')->with('success', 'Facture enregistrée avec succès.');
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
    public function edit(Facture $facture)
    {
        return view('admin.facture.form',['facture' => $facture, 'patients' => Patient::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FactureRequestForm $request, Facture $facture)
    {
        $facture->update($request->validated());
        return redirect()->route('admin.factures.index')->with('success', 'Facture modifiée avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

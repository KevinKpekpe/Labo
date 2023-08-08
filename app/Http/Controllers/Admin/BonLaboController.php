<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BonDetails;
use App\Models\BonLabo;
use App\Models\Docteur;
use App\Models\Examen;
use App\Models\Patient;
use Illuminate\Http\Request;

class BonLaboController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.bonlabo.index', ['bonlabos' => BonLabo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bonlabo.form', ['bonlabo' => new BonLabo(), 'examens' => Examen::all(), 'patients' => Patient::all(), 'docteurs' => Docteur::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'docteur_id' => 'required|exists:docteurs,id',
            // 'date_prescription' => 'required|date',
            'examens' => 'required|array|min:1'
        ]);
        //dd($request->all());
        $bonlabo = new bonlabo([
            'patient_id' => $request->patient_id,
            'docteur_id' => $request->docteur_id,
            'date_prescription' => now()
        ]);

        $bonlabo->save();

        foreach ($request->examens as $examen_id) {
            $examen = Examen::find($examen_id);

            $bonlaboDetail = new BonDetails([
                'bon_labo_id' => $bonlabo->id,
                'examen_id' => $examen_id,
                'date' => now()
            ]);

            $bonlaboDetail->save();
        }

        return redirect()->route('admin.bonlabos.index')->with('success', 'bonlabo ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bonlabo = bonlabo::with('patient', 'docteur', 'bonDetails.examen')->findOrFail($id);

        return view('admin.bonlabo.show', compact('bonlabo'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bonlabo $bonlabo)
    {
        return view('admin.bonlabo.form', [
            'bonlabo' => $bonlabo,
            'examens' => Examen::all(),
            'patients' => Patient::all(),
            'docteurs' => Docteur::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BonLabo $bonlabo)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'docteur_id' => 'nullable|exists:docteurs,id',
            //'date_prescription' => 'required|date',
            'examens' => 'required|array|min:0'
        ]);

        $bonlabo->update([
            'patient_id' => $request->patient_id,
            'docteur_id' => $request->docteur_id,
            'date_prescription' => now()
        ]);

        // Suppression des examens précédemment associés
        $bonlabo->bonDetails()->delete();

        // Ajout des examens sélectionnés
        foreach ($request->examens as $examen_id) {
            $examen = Examen::find($examen_id);

            $bonlaboDetail = new BonDetails([
                'bon_labo_id' => $bonlabo->id,
                'examen_id' => $examen_id,
                'date' => now()
            ]);

            $bonlaboDetail->save();
        }

        return redirect()->route('admin.bonlabos.index')->with('success', 'bonlabo modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BonLabo $bonlabo)
    {
        $bonlabo->delete();
        return redirect()->route('admin.bonlabos.index')->with('success', 'bonlabo ajoutée avec succès !');
    }
}

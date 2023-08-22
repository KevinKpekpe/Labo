<?php

namespace App\Http\Controllers\Secretaire;

use App\Http\Controllers\Controller;
use App\Models\BonDetails;
use Illuminate\Http\Request;

class BonLaboDetailsController extends Controller
{
    public function edit($bonlaboId)
    {

        $bonlaboDetails = BonDetails::with('examen')
            ->where('bon_labo_id', $bonlaboId)
            ->get();

        return view('secretaire.bonlabo.bon-details', compact('bonlaboDetails','bonlaboId'));
    }

    public function update(Request $request, $bonlaboId)
    {
        //dd($request->all());
        foreach ($request->resultats as $examenId => $resultats) {

            $bonlaboDetail = BonDetails::where('examen_id', $examenId)
                ->where('bon_labo_id', $bonlaboId)
                ->first();

            if ($bonlaboDetail) {
                $bonlaboDetail->resultat = $request->resultats[$examenId];
                $bonlaboDetail->date = $request->date;
                $bonlaboDetail->save();
            } else {
                $bonlaboDetail = new BonDetails;
                $bonlaboDetail->examen_id = $examenId;
                $bonlaboDetail->bonlabo_id = $bonlaboId;
                $bonlaboDetail->resultat = $request->resultats[$examenId];
                $bonlaboDetail->date = $request->date;
                $bonlaboDetail->save();
            }
        }

        return redirect()->route('secretaire.bonlabos.show', $bonlaboId);
    }
}

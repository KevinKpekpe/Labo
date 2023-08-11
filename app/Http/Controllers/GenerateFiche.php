<?php

namespace App\Http\Controllers;

use App\Models\BonLabo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class GenerateFiche extends Controller
{
    public function createPDF($id)
    {
        $bonlabo = BonLabo::with('patient', 'docteur', 'bonDetails.examen')->findOrFail($id);

        // Utilisez la méthode "findOrFail" pour récupérer l'enregistrement correspondant à l'ID
        // et charger les relations "patient", "docteur" et "bonDetails.examen"

        $data = [
            'bonlabo' => $bonlabo,
        ];

        $pdf = PDF::loadView('fiche.index', $data);
        return $pdf->download('invoice.pdf');
    }
}

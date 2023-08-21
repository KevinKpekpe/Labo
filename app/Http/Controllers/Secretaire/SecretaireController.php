<?php

namespace App\Http\Controllers\Secretaire;

use App\Http\Controllers\Controller;
use App\Models\BonDetails;
use App\Models\Examen;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecretaireController extends Controller
{
    public function index(){
        $today = Carbon::now()->toDateString();
        $patientsCount = Patient::count();
        $examCount = Examen::count();

        $amount = DB::table('factures')
        ->select(DB::raw('SUM(CAST(montant AS DECIMAL(10, 2))) AS total'))
        ->value('total');
        $bonDetailsCount = BonDetails::whereDate('date', $today)->count();
        return view('secretaire.index',[
            'patientsCount' => $patientsCount,
            'examCount' => $examCount,
            'bonDetailsCount' => $bonDetailsCount,
            'amount' => $amount,
        ]);
    }
}

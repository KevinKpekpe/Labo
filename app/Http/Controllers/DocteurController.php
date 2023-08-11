<?php

namespace App\Http\Controllers;

use App\Models\BonLabo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocteurController extends Controller
{
    public function index(){
        $id = Auth::user()->docteur->id;

        $bons = BonLabo::where('docteur_id', '=', $id)->get();

        return view('docteur.index',['bons' => $bons]);
    }
    public function show($id)
    {
        $id_doc = Auth::user()->docteur->id;
        $bonlabo = bonlabo::with('patient', 'docteur', 'bonDetails.examen')->where('docteur_id','=',$id_doc)->findOrFail($id);
        //dd($bonlabo);

        return view('docteur.show', compact('bonlabo'));
    }
}



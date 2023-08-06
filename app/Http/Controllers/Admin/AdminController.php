<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $patientsCount = Patient::count();
        $examCount = Examen::count();
        //dd($patientsCount);
        return view('admin.index',['patientsCount' => $patientsCount,'examCount' => $examCount]);
    }
}

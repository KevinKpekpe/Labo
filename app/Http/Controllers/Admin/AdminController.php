<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BonDetails;
use App\Models\Examen;
use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function index(){
        $today = Carbon::now()->toDateString();
        $patientsCount = Patient::count();
        $examCount = Examen::count();
        $bonDetailsCount = BonDetails::whereDate('date', $today)->count();
        //dd($bonDetailsCount);
        //dd($patientsCount);
        return view('admin.index',['patientsCount' => $patientsCount,'examCount' => $examCount,'bonDetailsCount' => $bonDetailsCount]);
    }
}

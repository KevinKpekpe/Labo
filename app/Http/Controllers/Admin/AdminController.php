<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BonDetails;
use App\Models\Examen;
use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $patientsCount = Patient::count();
        $examCount = Examen::count();
        $bonDetailsCount = BonDetails::whereDate('date', $today)->count();
        $data = DB::table('bon_details')
            ->join('examens', 'bon_details.examen_id', '=', 'examens.id')
            ->select(DB::raw('MONTH(bon_Details.date) AS month'), 'examens.description', DB::raw('COUNT(*) AS total'))
            ->groupBy('month', 'examens.description')
            ->orderBy('month')
            ->get();

        $chartData = [];
        $examNames = [];

        // Préparer les données pour le graphique
        foreach ($data as $row) {
            $month = \DateTime::createFromFormat('!m', $row->month)->format('F');
            $examName = $row->description;
            $total = $row->total;

            if (!in_array($examName, $examNames)) {
                $examNames[] = $examName;
            }

            if (!isset($chartData[$month])) {
                $chartData[$month] = [];
            }

            $chartData[$month][$examName] = $total;
        }
        //dd($chartData);
        return view('admin.index', ['patientsCount' => $patientsCount, 'examCount' => $examCount, 'bonDetailsCount' => $bonDetailsCount, 'chartData' => $chartData,'examNames'=>$examNames]);
    }
}

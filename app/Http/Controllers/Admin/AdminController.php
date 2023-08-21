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

        $amount = DB::table('factures')
        ->select(DB::raw('SUM(CAST(montant AS DECIMAL(10, 2))) AS total'))
        ->value('total');
        $bonDetailsCount = BonDetails::whereDate('date', $today)->count();
        // Récupérer les données de la base de données
        $data = DB::table('bon_details')
            ->join('examens', 'bon_details.examen_id', '=', 'examens.id')
            ->select(DB::raw('MONTH(bon_details.date) AS month'), 'examens.description', DB::raw('COUNT(*) AS total'))
            ->groupBy('month', 'examens.description')
            ->orderBy('month')
            ->get();

        // Préparer les données pour le graphique
        $chartData = [];
        $examNames = [];

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

        // Préparer les données pour Chart.js
        $chartLabels = array_keys($chartData);
        $datasets = [];

        foreach ($examNames as $examName) {
            $data = [];
            foreach ($chartData as $monthData) {
                $data[] = isset($monthData[$examName]) ? $monthData[$examName] : 0;
            }

            $datasets[] = [
                'label' => $examName,
                'data' => $data,
                'backgroundColor' => 'rgba(255, 0, 0, 0.3)',
                'borderColor' => 'rgba(255, 0, 0, 0.75)',
                'pointBorderColor' => 'rgba(255, 0, 0, 0)',
                'pointBackgroundColor' => 'rgba(255, 0, 0, 0.9)',
                
            ];
        }

        return view('admin.index', [
            'chartLabels' => $chartLabels,
            'datasets'=> $datasets,
            'patientsCount' => $patientsCount,
            'examCount' => $examCount,
            'bonDetailsCount' => $bonDetailsCount,
            'chartData' => $chartData,
            'examNames'=>$examNames,
            'amount' => $amount,
        ]);
    }
}

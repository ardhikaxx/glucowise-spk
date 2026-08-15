<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Screening;
use App\Models\ModelTrainingLog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if (method_exists($user, 'hasRole') && !$user->hasRole('admin')) {
            $screenings = Screening::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            return view('user_dashboard', compact('screenings'));
        }

        // Stats
        $totalUsers = User::count();
        $totalScreenings = Screening::count();
        $latestModel = ModelTrainingLog::latest()->first();
        
        $accuracy = $latestModel ? $latestModel->accuracy : 0;
        $f1Score = $latestModel ? $latestModel->f1_score : 0;

        // Risk Distribution
        $riskData = Screening::select('result_class', DB::raw('count(*) as total'))
            ->groupBy('result_class')
            ->pluck('total', 'result_class')
            ->toArray();

        // Monthly Screenings Trend
        $monthlyTrend = Screening::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month')
        ->toArray();

        // Pad months 1-12
        $trendData = [];
        for ($i = 1; $i <= 12; $i++) {
            $trendData[] = $monthlyTrend[$i] ?? 0;
        }

        return view('dashboard', compact(
            'totalUsers', 'totalScreenings', 'accuracy', 'f1Score', 'riskData', 'trendData', 'latestModel'
        ));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $currentMonth = now()->startOfMonth();

        $monthlyProfit = Profit::whereMonth('date', $currentMonth->month)
            ->whereYear('date', $currentMonth->year)
            ->sum('amount');

        $totalProfit = Profit::sum('amount');

        $recentProfits = Profit::with('incomeSource')
            ->latest()
            ->limit(10)
            ->get();

        $monthlyChart = Profit::selectRaw('DATE_FORMAT(date, "%Y-%m") as month_label, sum(amount) as total')
            ->groupBy('month_label')
            ->orderBy('month_label', 'desc')
            ->limit(12)
            ->get()
            ->reverse();

        return view('admin.dashboard', compact(
            'monthlyProfit',
            'totalProfit',
            'recentProfits',
            'monthlyChart'
        ));
    }
}

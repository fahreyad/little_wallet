<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(Request $request): View
    {
        $year = $request->input('year', now()->year);

        $monthlyReports = Profit::selectRaw('strftime("%Y-%m", date) as month, sum(amount) as amount, sum(total_amount) as total_amount, count(*) as records')
            ->whereYear('date', $year)
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->get();

        $years = Profit::selectRaw('strftime("%Y", date) as year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        $monthlyDetails = Profit::with('incomeSource')
            ->whereYear('date', $year)
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy(fn ($profit) => $profit->date->format('Y-m'));

        if (! in_array((string) $year, $years)) {
            $years[] = (string) $year;
        }

        return view('admin.reports.index', compact('monthlyReports', 'years', 'year', 'monthlyDetails'));
    }

    public function monthly(string $month): View
    {
        $profits = Profit::with('incomeSource')
            ->whereRaw('strftime("%Y-%m", date) = ?', [$month])
            ->orderBy('amount', 'desc')
            ->get();

        $totals = [
            'amount' => $profits->sum('amount'),
            'total_amount' => $profits->sum('total_amount'),
        ];

        return view('admin.reports.monthly', compact('profits', 'month', 'totals'));
    }
}

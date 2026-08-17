<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function monthly(Request $request): JsonResponse
    {
        $month = $request->input('month', now()->format('Y-m'));

        $profits = Profit::with('incomeSource')
            ->whereRaw('strftime("%Y-%m", date) = ?', [$month])
            ->get();

        return response()->json([
            'month' => $month,
            'total_amount' => $profits->sum('amount'),
            'total_profit' => $profits->sum('total_amount'),
            'records' => $profits,
        ]);
    }

    public function monthlyDetail(string $month): JsonResponse
    {
        $profits = Profit::with('incomeSource')
            ->whereRaw('strftime("%Y-%m", date) = ?', [$month])
            ->get();

        return response()->json([
            'month' => $month,
            'total_amount' => $profits->sum('amount'),
            'total_profit' => $profits->sum('total_amount'),
            'records' => $profits,
        ]);
    }

    public function summary(Request $request): JsonResponse
    {
        $year = $request->input('year', now()->year);

        $monthly = Profit::selectRaw('strftime("%Y-%m", date) as month, sum(amount) as total_amount, sum(total_amount) as total_profit, count(*) as records')
            ->whereYear('date', $year)
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->get();

        $overall = Profit::whereYear('date', $year)
            ->selectRaw('sum(amount) as total_amount, sum(total_amount) as total_profit, count(*) as records')
            ->first();

        return response()->json([
            'year' => $year,
            'overall' => $overall,
            'monthly' => $monthly,
        ]);
    }
}

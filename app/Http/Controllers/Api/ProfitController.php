<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Profit::with('incomeSource')->latest();

        if ($request->has('month')) {
            $query->whereRaw('DATE_FORMAT(date, "%Y-%m") = ?', [$request->input('month')]);
        }

        if ($request->has('date')) {
            $query->whereDate('date', $request->input('date'));
        }

        if ($request->has('income_source_id')) {
            $query->where('income_source_id', $request->input('income_source_id'));
        }

        return response()->json($query->paginate(50));
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'income_source_id' => 'required|exists:income_sources,id',
            'amount' => 'required|numeric|min:0',
            'total_amount' => 'nullable|numeric|min:0',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $validated['total_amount'] = $validated['total_amount'] ?? $validated['amount'];

        $profit = Profit::create($validated);
        $profit->load('incomeSource');

        return response()->json($profit, 201);
    }

    public function show(Profit $profit): JsonResponse
    {
        $profit->load('incomeSource');
        return response()->json($profit);
    }

    public function update(Request $request, Profit $profit): JsonResponse
    {
        $validated = $request->validate([
            'income_source_id' => 'required|exists:income_sources,id',
            'amount' => 'required|numeric|min:0',
            'total_amount' => 'nullable|numeric|min:0',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $validated['total_amount'] = $validated['total_amount'] ?? $validated['amount'];

        $profit->update($validated);
        $profit->load('incomeSource');

        return response()->json($profit);
    }

    public function destroy(Profit $profit): JsonResponse
    {
        $profit->delete();

        return response()->json(['message' => 'Profit deleted successfully.']);
    }
}

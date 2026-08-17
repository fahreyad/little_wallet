<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\IncomeSource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IncomeSourceController extends Controller
{
    public function index(): JsonResponse
    {
        $sources = IncomeSource::orderBy('name')->get();
        return response()->json($sources);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'investment_amount' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['investment_amount'] = $validated['investment_amount'] ?? 0;

        $source = IncomeSource::create($validated);

        return response()->json($source, 201);
    }

    public function show(IncomeSource $incomeSource): JsonResponse
    {
        return response()->json($incomeSource);
    }

    public function update(Request $request, IncomeSource $incomeSource): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'investment_amount' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['investment_amount'] = $validated['investment_amount'] ?? 0;

        $incomeSource->update($validated);

        return response()->json($incomeSource);
    }

    public function destroy(IncomeSource $incomeSource): JsonResponse
    {
        $incomeSource->delete();

        return response()->json(['message' => 'Income source deleted successfully.']);
    }
}

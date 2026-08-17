<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IncomeSource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncomeSourceController extends Controller
{
    public function index(): View
    {
        $incomeSources = IncomeSource::latest()->paginate(20);
        return view('admin.income-sources.index', compact('incomeSources'));
    }

    public function create(): View
    {
        return view('admin.income-sources.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'investment_amount' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['investment_amount'] = $validated['investment_amount'] ?? 0;

        IncomeSource::create($validated);

        return redirect()->route('income-sources.index')->with('success', 'Income source created successfully.');
    }

    public function show(IncomeSource $incomeSource): View
    {
        $incomeSource->load(['profits' => fn ($q) => $q->latest()->limit(50)]);
        return view('admin.income-sources.show', compact('incomeSource'));
    }

    public function edit(IncomeSource $incomeSource): View
    {
        return view('admin.income-sources.edit', compact('incomeSource'));
    }

    public function update(Request $request, IncomeSource $incomeSource): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'investment_amount' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', false);
        $validated['investment_amount'] = $validated['investment_amount'] ?? 0;

        $incomeSource->update($validated);

        return redirect()->route('income-sources.index')->with('success', 'Income source updated successfully.');
    }

    public function destroy(IncomeSource $incomeSource): RedirectResponse
    {
        $incomeSource->delete();

        return redirect()->route('income-sources.index')->with('success', 'Income source deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IncomeSource;
use App\Models\Profit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfitController extends Controller
{
    public function index(Request $request): View
    {
        $query = Profit::with('incomeSource');

        if ($request->filled('income_source_id')) {
            $query->where('income_source_id', $request->input('income_source_id'));
        }

        if ($request->filled('date_from')) {
            $query->whereDate('date', '>=', $request->input('date_from'));
        }

        if ($request->filled('date_to')) {
            $query->whereDate('date', '<=', $request->input('date_to'));
        }

        if ($request->filled('amount_min')) {
            $query->where('amount', '>=', $request->input('amount_min'));
        }

        if ($request->filled('amount_max')) {
            $query->where('amount', '<=', $request->input('amount_max'));
        }

        if ($request->filled('total_min')) {
            $query->where('total_amount', '>=', $request->input('total_min'));
        }

        if ($request->filled('total_max')) {
            $query->where('total_amount', '<=', $request->input('total_max'));
        }

        if ($request->filled('notes')) {
            $query->where('notes', 'like', '%' . $request->input('notes') . '%');
        }

        $sort = $request->input('sort', 'date_desc');
        match ($sort) {
            'date_asc' => $query->orderBy('date', 'asc'),
            'date_desc' => $query->orderBy('date', 'desc'),
            'amount_asc' => $query->orderBy('amount', 'asc'),
            'amount_desc' => $query->orderBy('amount', 'desc'),
            'total_asc' => $query->orderBy('total_amount', 'asc'),
            'total_desc' => $query->orderBy('total_amount', 'desc'),
            default => $query->orderBy('date', 'desc'),
        };

        $profits = $query->paginate(20)->appends($request->query());

        $incomeSources = IncomeSource::orderBy('name')->get();

        return view('admin.profits.index', compact('profits', 'incomeSources'));
    }

    public function create(): View
    {
        $incomeSources = IncomeSource::where('is_active', true)->orderBy('name')->get();
        return view('admin.profits.create', compact('incomeSources'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'income_source_id' => 'required|exists:income_sources,id',
            'amount' => 'required|numeric|min:0',
            'total_amount' => 'nullable|numeric|min:0',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $validated['total_amount'] = $validated['total_amount'] ?? $validated['amount'];

        Profit::create($validated);

        return redirect()->route('profits.index')->with('success', 'Profit recorded successfully.');
    }

    public function show(Profit $profit): View
    {
        $profit->load('incomeSource');
        return view('admin.profits.show', compact('profit'));
    }

    public function edit(Profit $profit): View
    {
        $incomeSources = IncomeSource::where('is_active', true)->orderBy('name')->get();
        return view('admin.profits.edit', compact('profit', 'incomeSources'));
    }

    public function update(Request $request, Profit $profit): RedirectResponse
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

        return redirect()->route('profits.index')->with('success', 'Profit updated successfully.');
    }

    public function destroy(Profit $profit): RedirectResponse
    {
        $profit->delete();

        return redirect()->route('profits.index')->with('success', 'Profit deleted successfully.');
    }
}

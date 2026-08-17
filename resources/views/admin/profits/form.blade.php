@php
    $record = $record ?? $profit ?? null;
@endphp

<div class="mb-3">
    <label for="income_source_id" class="form-label">Income Source</label>
    <select class="form-select" id="income_source_id" name="income_source_id" required>
        <option value="">Select source</option>
        @foreach($incomeSources as $source)
            <option value="{{ $source->id }}" {{ old('income_source_id', $record?->income_source_id) == $source->id ? 'selected' : '' }}>
                {{ $source->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="amount" class="form-label">Profit Amount</label>
    <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ old('amount', $record?->amount) }}" required>
</div>
<div class="mb-3">
    <label for="total_amount" class="form-label">Total Amount</label>
    <input type="number" step="0.01" class="form-control" id="total_amount" name="total_amount" value="{{ old('total_amount', $record?->total_amount) }}">
    <small class="form-text text-muted">Leave empty to use profit amount as total.</small>
</div>
<div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $record?->date?->format('Y-m-d')) }}" required>
</div>
<div class="mb-3">
    <label for="notes" class="form-label">Notes</label>
    <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes', $record?->notes) }}</textarea>
</div>

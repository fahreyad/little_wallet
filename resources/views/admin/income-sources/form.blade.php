@php
    $source = $source ?? $incomeSource ?? null;
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label for="name" class="form-label fw-medium">Name</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-tag"></i></span>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $source?->name) }}" placeholder="e.g. Stock Portfolio" required>
        </div>
    </div>
    <div class="col-md-6">
        <label for="investment_amount" class="form-label fw-medium">Invested Money</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
            <input type="number" step="0.01" class="form-control" id="investment_amount" name="investment_amount" value="{{ old('investment_amount', $source?->investment_amount) }}" placeholder="0.00">
        </div>
        <div class="form-text">Total amount you invested in this source.</div>
    </div>
    <div class="col-12">
        <label for="description" class="form-label fw-medium">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Brief description of this income source">{{ old('description', $source?->description) }}</textarea>
    </div>
    <div class="col-12">
        <div class="form-check form-switch">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $source?->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-medium" for="is_active">Active</label>
        </div>
    </div>
</div>

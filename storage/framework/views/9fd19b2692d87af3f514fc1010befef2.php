<?php
    $source = $source ?? $incomeSource ?? null;
?>

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $source?->name)); ?>" required>
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description', $source?->description)); ?></textarea>
</div>
<div class="mb-3">
    <label for="investment_amount" class="form-label">Invested Money</label>
    <input type="number" step="0.01" class="form-control" id="investment_amount" name="investment_amount" value="<?php echo e(old('investment_amount', $source?->investment_amount)); ?>">
    <small class="form-text text-muted">Total amount you invested in this source.</small>
</div>
<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?php echo e(old('is_active', $source?->is_active ?? true) ? 'checked' : ''); ?>>
    <label class="form-check-label" for="is_active">Active</label>
</div>
<?php /**PATH /var/www/html/resources/views/admin/income-sources/form.blade.php ENDPATH**/ ?>
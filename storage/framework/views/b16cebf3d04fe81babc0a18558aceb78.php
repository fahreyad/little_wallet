<?php
    $record = $record ?? $profit ?? null;
?>

<div class="mb-3">
    <label for="income_source_id" class="form-label">Income Source</label>
    <select class="form-select" id="income_source_id" name="income_source_id" required>
        <option value="">Select source</option>
        <?php $__currentLoopData = $incomeSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($source->id); ?>" <?php echo e(old('income_source_id', $record?->income_source_id) == $source->id ? 'selected' : ''); ?>>
                <?php echo e($source->name); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="mb-3">
    <label for="amount" class="form-label">Profit Amount</label>
    <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="<?php echo e(old('amount', $record?->amount)); ?>" required>
</div>
<div class="mb-3">
    <label for="total_amount" class="form-label">Total Amount</label>
    <input type="number" step="0.01" class="form-control" id="total_amount" name="total_amount" value="<?php echo e(old('total_amount', $record?->total_amount)); ?>">
    <small class="form-text text-muted">Leave empty to use profit amount as total.</small>
</div>
<div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name="date" value="<?php echo e(old('date', $record?->date?->format('Y-m-d'))); ?>" required>
</div>
<div class="mb-3">
    <label for="notes" class="form-label">Notes</label>
    <textarea class="form-control" id="notes" name="notes" rows="3"><?php echo e(old('notes', $record?->notes)); ?></textarea>
</div>
<?php /**PATH /var/www/html/resources/views/admin/profits/form.blade.php ENDPATH**/ ?>
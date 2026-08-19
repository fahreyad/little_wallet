<?php
    $record = $record ?? $profit ?? null;
?>

<div class="row g-3">
    <div class="col-md-6">
        <label for="income_source_id" class="form-label fw-medium">Income Source</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-diagram-3"></i></span>
            <select class="form-select" id="income_source_id" name="income_source_id" required>
                <option value="">Select source</option>
                <?php $__currentLoopData = $incomeSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($source->id); ?>" <?php echo e(old('income_source_id', $record?->income_source_id) == $source->id ? 'selected' : ''); ?>>
                        <?php echo e($source->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <label for="date" class="form-label fw-medium">Date</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo e(old('date', $record?->date?->format('Y-m-d'))); ?>" required>
        </div>
    </div>
    <div class="col-md-6">
        <label for="amount" class="form-label fw-medium">Profit Amount</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="<?php echo e(old('amount', $record?->amount)); ?>" placeholder="0.00" required>
        </div>
    </div>
    <div class="col-md-6">
        <label for="total_amount" class="form-label fw-medium">Total Amount</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-cash-stack"></i></span>
            <input type="number" step="0.01" class="form-control" id="total_amount" name="total_amount" value="<?php echo e(old('total_amount', $record?->total_amount)); ?>" placeholder="0.00">
        </div>
        <div class="form-text">Leave empty to use profit amount as total.</div>
    </div>
    <div class="col-12">
        <label for="notes" class="form-label fw-medium">Notes</label>
        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Optional notes"><?php echo e(old('notes', $record?->notes)); ?></textarea>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/admin/profits/form.blade.php ENDPATH**/ ?>
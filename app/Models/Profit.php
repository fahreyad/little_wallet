<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profit extends Model
{
    use HasFactory;

    protected $fillable = [
        'income_source_id',
        'amount',
        'total_amount',
        'date',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'date' => 'date:Y-m-d',
    ];

    public function incomeSource(): BelongsTo
    {
        return $this->belongsTo(IncomeSource::class);
    }
}

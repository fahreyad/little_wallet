<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IncomeSource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'investment_amount',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'investment_amount' => 'decimal:2',
    ];

    public function profits(): HasMany
    {
        return $this->hasMany(Profit::class);
    }
}

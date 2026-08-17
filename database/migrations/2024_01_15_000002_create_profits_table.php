<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('income_source_id')->constrained('income_sources')->onDelete('cascade');
            $table->decimal('amount', 15, 2);
            $table->decimal('total_amount', 15, 2)->default(0);
            $table->date('month');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('month');
            $table->index(['income_source_id', 'month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profits');
    }
};

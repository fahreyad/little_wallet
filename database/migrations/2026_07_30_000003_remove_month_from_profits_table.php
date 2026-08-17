<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profits_new', function (Blueprint $table) {
            $table->id();
            $table->foreignId('income_source_id')->constrained('income_sources')->onDelete('cascade');
            $table->decimal('amount', 15, 2);
            $table->decimal('total_amount', 15, 2)->default(0);
            $table->date('date');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('date');
            $table->index(['income_source_id', 'date']);
        });

        DB::statement('INSERT INTO profits_new (id, income_source_id, amount, total_amount, date, notes, created_at, updated_at) SELECT id, income_source_id, amount, total_amount, date, notes, created_at, updated_at FROM profits');

        Schema::drop('profits');
        Schema::rename('profits_new', 'profits');
    }

    public function down(): void
    {
        Schema::create('profits_new', function (Blueprint $table) {
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

        DB::statement('INSERT INTO profits_new (id, income_source_id, amount, total_amount, month, notes, created_at, updated_at) SELECT id, income_source_id, amount, total_amount, date, notes, created_at, updated_at FROM profits');

        Schema::drop('profits');
        Schema::rename('profits_new', 'profits');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profits', function (Blueprint $table) {
            $table->date('date')->nullable()->after('total_amount');
        });

        DB::table('profits')->whereNull('date')->update(['date' => DB::raw('month')]);
    }

    public function down(): void
    {
        Schema::table('profits', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }
};

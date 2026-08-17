<?php

namespace Database\Seeders;

use App\Models\Profit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        if (Profit::count() === 0) {
            $this->call(IncomeTrackerSeeder::class);
        }
    }
}

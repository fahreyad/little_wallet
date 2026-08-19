<?php

namespace Database\Seeders;

use App\Models\IncomeSource;
use App\Models\Profit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class IncomeTrackerSeeder extends Seeder
{
    public function run(): void
    {
        $sources = [
            'Garments'  => 100000,
            'Coconut'   => 52500,
            'Banana'    => 22000,
            'Bobin'     => 20000,
            'Supari'    => 31000,
            'Mango'     => 150000,
            'Fruit'     => 20000,
            'Uber'      => 0,
            'Piyaj'     => 0,
            'Lithu'     => 0,
            'Mosola'    => 0,
            'Khasi'     => 0,
            'Extra'     => 0,
            'Adjustment'=> 0,
        ];

        $sourceIds = [];
        foreach ($sources as $name => $investment) {
            $source = IncomeSource::updateOrCreate(
                ['name' => $name],
                [
                    'description' => "Investment: " . number_format($investment, 2),
                    'investment_amount' => $investment,
                    'is_active' => true,
                ]
            );
            $sourceIds[$name] = $source->id;
        }

        $monthlyData = $this->monthlyData();

        foreach ($monthlyData as $monthKey => $data) {
            $date = Carbon::parse($monthKey)->format('Y-m-d');
            $targetTotal = $data['target_total'];
            $currentTotal = 0;

            foreach ($data['entries'] as $entry) {
                $amount = $entry['amount'];
                $totalAmount = $entry['total_amount'] ?? $amount;

                Profit::create([
                    'income_source_id' => $sourceIds[$entry['source']],
                    'amount' => $amount,
                    'total_amount' => $totalAmount,
                    'date' => $date,
                    'notes' => $entry['notes'] ?? 'Seeded',
                ]);

                $currentTotal += $amount;
            }

            if ($targetTotal !== null && $currentTotal != $targetTotal) {
                $diff = round($targetTotal - $currentTotal, 2);

                Profit::create([
                    'income_source_id' => $sourceIds['Adjustment'],
                    'amount' => $diff,
                    'total_amount' => $diff,
                    'date' => $date,
                    'notes' => "Auto adjustment to match monthly total of {$targetTotal}",
                ]);
            }
        }
    }

    private function monthlyData(): array
    {
        return [
            '2026-02-26' => [
                'target_total' => 28335,
                'entries' => [
                    ['source' => 'Coconut', 'amount' => 2000],
                    ['source' => 'Coconut', 'amount' => 2425],
                    ['source' => 'Coconut', 'amount' => 3085],
                    ['source' => 'Coconut', 'amount' => 4075],
                    ['source' => 'Supari', 'amount' => 2700],
                    ['source' => 'Supari', 'amount' => 2800],
                    ['source' => 'Supari', 'amount' => 2800],
                    ['source' => 'Garments', 'amount' => 3000],
                    ['source' => 'Garments', 'amount' => 2000],
                    ['source' => 'Garments', 'amount' => 2500, 'total_amount' => 5500],
                    ['source' => 'Uber', 'amount' => 150],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                ],
            ],
            '2026-03-26' => [
                'target_total' => 26195,
                'entries' => [
                    ['source' => 'Coconut', 'amount' => 3975, 'total_amount' => 7950],
                    ['source' => 'Coconut', 'amount' => 1910],
                    ['source' => 'Supari', 'amount' => 2700, 'total_amount' => 6000],
                    ['source' => 'Garments', 'amount' => 4500, 'total_amount' => 9500],
                    ['source' => 'Garments', 'amount' => 4590, 'total_amount' => 9850],
                    ['source' => 'Garments', 'amount' => 4520, 'total_amount' => 9850],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 1200],
                ],
            ],
            '2026-04-26' => [
                'target_total' => 22500,
                'entries' => [
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 250],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Coconut', 'amount' => 2000],
                    ['source' => 'Coconut', 'amount' => 2200],
                    ['source' => 'Coconut', 'amount' => 2200],
                    ['source' => 'Bobin', 'amount' => 1500],
                    ['source' => 'Bobin', 'amount' => 3750],
                    ['source' => 'Bobin', 'amount' => 1750],
                    ['source' => 'Bobin', 'amount' => 1750],
                    ['source' => 'Garments', 'amount' => 2300, 'total_amount' => 5000],
                ],
            ],
            '2026-05-26' => [
                'target_total' => 19600,
                'entries' => [
                    ['source' => 'Bobin', 'amount' => 1750, 'total_amount' => 415],
                    ['source' => 'Bobin', 'amount' => 1750, 'total_amount' => 400],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Piyaj', 'amount' => 600],
                    ['source' => 'Piyaj', 'amount' => 1400],
                    ['source' => 'Piyaj', 'amount' => 1400],
                    ['source' => 'Garments', 'amount' => 2300, 'total_amount' => 5000],
                    ['source' => 'Coconut', 'amount' => 2200],
                    ['source' => 'Lithu', 'amount' => 900],
                    ['source' => 'Mosola', 'amount' => 900],
                    ['source' => 'Khasi', 'amount' => 2400, 'total_amount' => 4000],
                ],
            ],
            '2026-06-26' => [
                'target_total' => 20000,
                'entries' => [
                    ['source' => 'Garments', 'amount' => 2200, 'total_amount' => 4000],
                    ['source' => 'Mango', 'amount' => 2400, 'total_amount' => 4000],
                    ['source' => 'Mango', 'amount' => 2400, 'total_amount' => 4000],
                    ['source' => 'Mango', 'amount' => 2400, 'total_amount' => 4000],
                    ['source' => 'Mango', 'amount' => 3000, 'total_amount' => 5000],
                    ['source' => 'Mango', 'amount' => 3000, 'total_amount' => 5000],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                ],
            ],
            '2026-07-26' => [
                'target_total' => null,
                'entries' => [
                    ['source' => 'Supari', 'amount' => 3000, 'total_amount' => 5000],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 100],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 300],
                    ['source' => 'Banana', 'amount' => 300],
                    ['source' => 'Banana', 'amount' => 400],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 400],
                    ['source' => 'Mango', 'amount' => 3000, 'total_amount' => 5000],
                    ['source' => 'Mango', 'amount' => 3600, 'total_amount' => 6000],
                    ['source' => 'Mango', 'amount' => 3600, 'total_amount' => 6000],
                    ['source' => 'Extra', 'amount' => 500, 'total_amount' => 800],
                    ['source' => 'Extra', 'amount' => 300, 'total_amount' => 500],
                    ['source' => 'Garments', 'amount' => 2800, 'total_amount' => 4800],
                ],
            ],
            '2026-08-26' => [
                'target_total' => null,
                'entries' => [
                    ['source' => 'Fruit', 'amount' => 720, 'total_amount' => 1200],
                    ['source' => 'Fruit', 'amount' => 720, 'total_amount' => 1200],
                    ['source' => 'Fruit', 'amount' => 700, 'total_amount' => 1200],
                    ['source' => 'Garments', 'amount' => 2880, 'total_amount' => 4800],
                    ['source' => 'Banana', 'amount' => 400],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                    ['source' => 'Banana', 'amount' => 200],
                ],
            ],
        ];
    }
}

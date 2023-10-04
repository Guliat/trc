<?php

namespace Database\Seeders;

use App\Models\PricePeriod;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PricePeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PricePeriod::create([
            'start_date' => Carbon::createFromDate('2024-01-01'),
            'end_date' => Carbon::createFromDate('2024-01-01'),
            'price_per_day' => 2
        ]);

        PricePeriod::create([
            'start_date' => Carbon::createFromDate('2024-01-03'),
            'end_date' => Carbon::createFromDate('2024-01-08'),
            'price_per_day' => 60
        ]);

        PricePeriod::create([
            'start_date' => Carbon::createFromDate('2024-01-05'),
            'end_date' => Carbon::createFromDate('2024-01-09'),
            'price_per_day' => 15
        ]);

        PricePeriod::create([
            'start_date' => Carbon::createFromDate('2024-01-09'),
            'end_date' => Carbon::createFromDate('2024-01-10'),
            'price_per_day' => 150
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConversionRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            [
                'buy_rate' => 1250.00,
                'sell_rate' => 1450.00,
            ],
        ];

        foreach ($recipes as $recipe)
        {
            \DB::table('conversion_rates')->insert($recipe);
        }
    }
}

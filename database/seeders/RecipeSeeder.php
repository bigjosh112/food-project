<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            [
                'name' => 'Afang Soup',
                'calorie_count' => 25,
                'price' => 200.00
            ],
            [
                'name' => 'Milky Pasta',
                'calorie_count' => 12,
                'price' => 500
            ],
            [
                'name' => 'Noodles',
                'calorie_count' => 7,
                'price' => 300
            ]
        ];

        foreach ($recipes as $recipe)
        {
            Recipe::insert($recipe);
        }
    }
}

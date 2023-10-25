<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'name' => 'Dominos',
                'longitude' => 7.345,
                'latitude' => 3.242,
                'address' => 'nowhere'
            ],
            [
                'name' => 'Chicken Republic',
                'longitude' => 5.345,
                'latitude' => 2.242,
                'address' => 'anywhere'
            ],
            [
                'name' => 'Item 7',
                'longitude' => 5.345,
                'latitude' => 2.142,
                'address' => 'everywhere'
            ]
        ];

        foreach ($restaurants as $restaurant)
        {
            Restaurant::insert($restaurant);
        }
    }
}

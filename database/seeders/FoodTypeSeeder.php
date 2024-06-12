<?php

namespace Database\Seeders;

use App\Models\FoodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodType::create([
            'food_type_id' => 1,
            'food_type_name' => 'Dry kibble'
        ]);
        FoodType::create([
            'food_type_id' => 2,
            'food_type_name' => 'Wet canned'
        ]);
        FoodType::create([
            'food_type_id' => 3,
            'food_type_name' => 'Grain-free'
        ]);
        FoodType::create([
            'food_type_id' => 4,
            'food_type_name' => 'Raw food'
        ]);
        FoodType::create([
            'food_type_id' => 5,
            'food_type_name' => 'SPECIAL'
        ]);
    }
}

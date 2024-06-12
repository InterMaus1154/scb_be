<?php

namespace Database\Seeders;

use App\Models\KennelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KennelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KennelType::create([
            'kennel_type_id' => 1,
            'kennel_type_name' => 'SINGLE',
            'max_dogs' => 1
        ]);

        KennelType::create([
            'kennel_type_id' => 2,
            'kennel_type_name' => 'DOUBLE',
            'max_dogs' => 2
        ]);

        KennelType::create([
            'kennel_type_id' => 3,
            'kennel_type_name' => 'CAGE',
            'max_dogs' => 1
        ]);

        KennelType::create([
            'kennel_type_id' => 4,
            'kennel_type_name' => 'BOX',
            'max_dogs' => 1
        ]);
    }
}

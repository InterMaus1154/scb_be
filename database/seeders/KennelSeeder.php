<?php

namespace Database\Seeders;

use App\Models\Kennel;
use Database\Factories\KennelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KennelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 4; $i++) {
            Kennel::create([
                'kennel_type_id' => 2
            ]);
            Kennel::create([
                'kennel_type_id' => 3
            ]);
            Kennel::create([
                'kennel_type_id' => 4
            ]);
        }

        for ($i = 0; $i < 8;$i++){
            Kennel::create([
                'kennel_type_id' => 1
            ]);
        }
    }
}

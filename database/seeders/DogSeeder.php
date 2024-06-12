<?php

namespace Database\Seeders;

use App\Models\Dog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dog::create([
            'caller_name' => 'Max',
            'breed' => 'Staffordshire bull terrier',
            'date_of_birth' => '2020-12-04',
            'customer_id' => '1',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);
        Dog::create([
            'caller_name' => 'Brenda',
            'official_name' => 'Best Kennel of the World Doggi Brenda',
            'breed' => 'Staffordshire bull terrier',
            'date_of_birth' => '2021-12-01',
            'customer_id' => '1',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);
        Dog::create([
            'caller_name' => 'Loki',
            'breed' => 'Chocacopo',
            'date_of_birth' => '2020-12-01',
            'customer_id' => '1',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);

        Dog::create([
            'caller_name' => 'Kevin',
            'breed' => 'Staffordshire bull terrier',
            'date_of_birth' => '2020-12-04',
            'customer_id' => '2',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);
        Dog::create([
            'caller_name' => 'Lia',
            'breed' => 'Staffordshire bull terrier',
            'date_of_birth' => '2021-12-01',
            'customer_id' => '2',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);
        Dog::create([
            'caller_name' => 'Geret',
            'breed' => 'Chocacopo',
            'date_of_birth' => '2020-12-01',
            'customer_id' => '2',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);

        Dog::create([
            'caller_name' => 'Mani',
            'breed' => 'Staffordshire bull terrier',
            'date_of_birth' => '2020-12-04',
            'customer_id' => '3',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);
        Dog::create([
            'caller_name' => 'Piri',
            'breed' => 'Staffordshire bull terrier',
            'date_of_birth' => '2021-12-01',
            'customer_id' => '3',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);
        Dog::create([
            'caller_name' => 'Miki',
            'breed' => 'Chocacopo',
            'date_of_birth' => '2020-12-01',
            'customer_id' => '3',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);

        Dog::create([
            'caller_name' => 'Mani',
            'breed' => 'Staffordshire bull terrier',
            'date_of_birth' => '2020-12-04',
            'customer_id' => '4',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);
        Dog::create([
            'caller_name' => 'Piri',
            'breed' => 'Staffordshire bull terrier',
            'date_of_birth' => '2021-12-01',
            'customer_id' => '4',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);
        Dog::create([
            'caller_name' => 'Miki',
            'breed' => 'Chocacopo',
            'date_of_birth' => '2020-12-01',
            'customer_id' => '4',
            'chip_number' => '1234567890',
            'vet_name' => 'Medivet',
            'last_flea_treatment_date' => '2024-02-03',
            'last_vaccination_date' => '2023-10-12',
            'emergency_phone_number' => '0712345678'
        ]);
    }
}

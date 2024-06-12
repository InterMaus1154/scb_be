<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'employee_number' => '0000ABCD',
            'firstname' => 'Daniel',
            'lastname' => 'Smith',
            'date_of_birth' => '1991-05-05',
            'gender' => 'MALE',
            'role' => 'MANAGER',
            'password' => 'password',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA',
            'phone_number' => '07123456789',
            'email' => 'danielsmith@mail.com',
            'joined_at' => '2015-05-05']);

        Staff::create(['employee_number' => '0000ABCE', 'firstname' => 'Marcus', 'lastname' => 'Williams', 'date_of_birth' => '1995-06-06', 'gender' => 'MALE', 'role' => 'GENERAL', 'password' => 'password',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA',
            'phone_number' => '07123456789',
            'email' => 'marcuswilliams@mail.com',
            'joined_at' => '2015-05-05']);

        Staff::create(['employee_number' => '0000ABCF', 'firstname' => 'Lily', 'lastname' => 'Higgins', 'date_of_birth' => '1998-07-07', 'gender' => 'FEMALE', 'role' => 'GENERAL', 'password' => 'password',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA',
            'phone_number' => '07123456789',
            'email' => 'lilyhiggins@mail.com',
            'joined_at' => '2015-05-05']);

        Staff::create(['employee_number' => '0000ABCG', 'firstname' => 'Evelin', 'lastname' => 'Malfoy', 'date_of_birth' => '1996-09-07', 'gender' => 'FEMALE', 'role' => 'GENERAL', 'password' => 'password',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA',
            'phone_number' => '07123456789',
            'email' => 'evelinmalfoy@mail.com',
            'joined_at' => '2015-05-05']);

        Staff::create(['employee_number' => '0000ABCH', 'firstname' => 'Kevin', 'lastname' => 'Peacock', 'date_of_birth' => '1996-04-04', 'gender' => 'MALE', 'role' => 'GENERAL', 'password' => 'password',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA',
            'phone_number' => '07123456789',
            'email' => 'kevinpeacock@mail.com',
            'joined_at' => '2015-05-05']);
    }
}

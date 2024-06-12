<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'email' => 'johndoe@mail.com',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'date_of_birth' => '1990-08-12',
            'gender' => 'MALE',
            'password' => 'password',
            'phone_number' => '07444567891',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA']);
        Customer::create([
            'email' => 'janedoe@mail.com',
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'date_of_birth' => '2000-06-28',
            'gender' => 'FEMALE',
            'password' => 'password',
            'phone_number' => '07444567891',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA']);
        Customer::create([
            'email' => 'jacksmith@mail.com',
            'firstname' => 'Jack',
            'lastname' => 'Smith',
            'date_of_birth' => '1978-01-16',
            'gender' => 'MALE',
            'password' => 'password',
            'phone_number' => '07444567891',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA']);
        Customer::create([
            'email' => 'dianasmith@mail.com',
            'firstname' => 'Diana',
            'lastname' => 'Smith',
            'date_of_birth' => '2001-06-23',
            'gender' => 'FEMALE',
            'password' => 'password',
            'phone_number' => '07444567891',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA']);
        Customer::create([
            'email' => 'davidbenson@mail.com',
            'firstname' => 'David',
            'lastname' => 'Benson',
            'date_of_birth' => '1989-10-26',
            'gender' => 'MALE',
            'password' => 'password',
            'phone_number' => '07444567891',
            'address_line_first' => 'Test Drive 1',
            'city' => 'London',
            'postcode' => 'N13 5PA']);
    }
}

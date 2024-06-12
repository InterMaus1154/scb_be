<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'customer_id' => '1',
            'dog_id' => '1',
            'booking_start_date' => '2024-05-01',
            'booking_end_date' => '2024-05-05',
            'status' => 'OPEN',
            'kennel_type_id' => '1',
            'feeding_freq' => '2',
            'food_type_id' => '5',
            'food_type_special' => 'Special food sth'
        ]);
        Booking::create([
            'customer_id' => '1',
            'dog_id' => '2',
            'booking_start_date' => '2024-05-01',
            'booking_end_date' => '2024-05-05',
            'status' => 'OPEN',
            'kennel_type_id' => '2',
            'feeding_freq' => '2',
            'food_type_id' => '5',
            'food_type_special' => 'Special food sth'
        ]);
        Booking::create([
            'customer_id' => '1',
            'dog_id' => '3',
            'booking_start_date' => '2024-05-01',
            'booking_end_date' => '2024-05-05',
            'status' => 'OPEN',
            'kennel_type_id' => '2',
            'feeding_freq' => '2',
            'food_type_id' => '1'
        ]);

        Booking::create([
            'customer_id' => '2',
            'dog_id' => '4',
            'booking_start_date' => '2024-04-01',
            'booking_end_date' => '2024-04-05',
            'status' => 'CLOSED',
            'kennel_type_id' => '1',
            'feeding_freq' => 'SPECIAL',
            'special_feeding' => 'Small portion in the morning and evening, regular after 12pm',
            'food_type_id' => '2'
        ]);
        Booking::create([
            'customer_id' => '2',
            'dog_id' => '5',
            'booking_start_date' => '2024-04-01',
            'booking_end_date' => '2024-04-05',
            'status' => 'CLOSED',
            'kennel_type_id' => '3',
            'feeding_freq' => '4',
            'food_type_id' => '3'
        ]);
        Booking::create([
            'customer_id' => '2',
            'dog_id' => '6',
            'booking_start_date' => '2024-04-01',
            'booking_end_date' => '2024-04-05',
            'status' => 'CLOSED',
            'kennel_type_id' => '4',
            'feeding_freq' => '1',
            'food_type_id' => '4'
        ]);

        Booking::create([
            'customer_id' => '4',
            'dog_id' => '4',
            'booking_start_date' => '2024-05-05',
            'booking_end_date' => '2024-05-10',
            'status' => 'OPEN',
            'kennel_type_id' => '1',
            'feeding_freq' => '1',
            'food_type_id' => '4'
        ]);
        Booking::create([
            'customer_id' => '4',
            'dog_id' => '10',
            'booking_start_date' => '2024-05-05',
            'booking_end_date' => '2024-05-10',
            'status' => 'OPEN',
            'kennel_type_id' => '1',
            'feeding_freq' => 'SPECIAL',
            'special_feeding' => 'Two small portions, in the morning in the evening, no fish',
            'food_type_id' => '3'
        ]);
        Booking::create([
            'customer_id' => '4',
            'dog_id' => '11',
            'booking_start_date' => '2024-05-05',
            'booking_end_date' => '2024-05-10',
            'status' => 'OPEN',
            'kennel_type_id' => '1',
            'feeding_freq' => '2',
            'food_type_id' => '2'
        ]);

        Booking::create([
            'customer_id' => '3',
            'dog_id' => '12',
            'booking_start_date' => '2024-06-01',
            'booking_end_date' => '2024-06-05',
            'status' => 'OPEN',
            'kennel_type_id' => '2',
            'feeding_freq' => '4',
            'food_type_id' => '1'
        ]);
        Booking::create([
            'customer_id' => '3',
            'dog_id' => '8',
            'booking_start_date' => '2024-06-01',
            'booking_end_date' => '2024-06-05',
            'status' => 'OPEN',
            'kennel_type_id' => '2',
            'feeding_freq' => '4',
            'food_type_id' => '1'
        ]);
        Booking::create([
            'customer_id' => '3',
            'dog_id' => '9',
            'booking_start_date' => '2024-06-01',
            'booking_end_date' => '2024-06-05',
            'status' => 'OPEN',
            'kennel_type_id' => '2',
            'feeding_freq' => '4',
            'food_type_id' => '2'
        ]);
    }
}

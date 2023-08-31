<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Karolis',
            'email' => 'karolis@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
        ]);

        $faker = Faker::create();

        foreach (range(1, 40) as $index) {
            DB::table('invoices')->insert([
                'invoice_number' => 'FV-' . (1000 + $index),
                'invoice_date' => $faker->date(),
                'client_name' => $faker->company(),
                'client_address' => $faker->address(),
                'client_address2' => rand(0, 2) ? null : $faker->secondaryAddress(),
                'client_vat' => rand(0, 2) ? null : $faker->numberBetween(100000000, 999999999),
                'client_country' => $faker->countryCode(),
                'invoice_amount' => $faker->numberBetween(100, 9999),
            ]);
        }

        // foreach (range(1, 20) as $index) {
        //     DB::table('invoices')->insert([
        //         'invoice_number' => 'FV-' . (1000 + $index),
        //         'invoice_date' => $faker->date(),
        //         'client_id' => $faker->numberBetween(1, 40),
        //         'invoice_amount' => $faker->numberBetween(100, 9999)
        //     ]);
        // }
    }
}

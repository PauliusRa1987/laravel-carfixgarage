<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach(range(1, 4) as $_) { 
            DB::table('work_shops')->insert([
            'address' => $faker->secondaryAddress ,
            'city' => $faker->city ,
            'zip' => $faker->postcode ,
            'name' => $faker->country,
            'phone' => $faker->e164PhoneNumber,
        ]);
        }
        DB::table('users')->insert([
            'name' => 'Zuikis',
            'email' => 'zuikis@gmail.com' ,
            'password' => Hash::make('123')
        ]);
        DB::table('users')->insert([
            'name' => 'Lokis',
            'email' => 'lokis@gmail.com' ,
            'password' => Hash::make('123'),
            'role' => 10,
        ]);
        foreach(range(1, 15) as $_) { 
            DB::table('mechanics')->insert([
            'mechanic_name' => $faker->firstName ,
            'mechanic_surname' => $faker->lastName,
            'mechanic_rating' => rand(1, 5),
            'shop_id' => rand(1, 4)
        ]);}
        $serviss = ['Wheel Alignment', 'Suspecion check', 'Brake Services', 'Clutch Repair', 'Major Engine Service', 'Air Con Re-gas','Wheel Alignment', 'Suspecion check', 'Brake Services', 'Clutch Repair', 'Major Engine Service', 'Air Con Re-gas','Wheel Alignment', 'Suspecion check', 'Brake Services', 'Clutch Repair', 'Major Engine Service', 'Air Con Re-gas','Wheel Alignment', 'Suspecion check', 'Brake Services', 'Clutch Repair', 'Major Engine Service', 'Air Con Re-gas'];
        foreach(range(1, 28) as $_) { 
            DB::table('facilities')->insert([
            'facility_name' => $serviss[$_],
            'duration' => ceil(rand(15, 180)),
            'price' => ceil(rand(15, 500)),
            'shop_id' => rand(1, 4),
        ]);}
        foreach(range(1, 7) as $_) { 
            DB::table('orders')->insert([
            'user_id' => '1' ,
            'shop_id' => rand(1, 4),
            'facility_id' => rand(1, 4),
            'mechanic_id' => rand(1, 3),
            'status' => 'pending',
            'price' => rand(20, 200)
        ]);}
    }
}
    
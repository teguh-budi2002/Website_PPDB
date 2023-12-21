<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 10; $i++) { 
            User::create([
                'role_id' => 2,
                'fullname' => $faker->name,
                'email' => $faker->safeEmail(),
                'nisn' => $faker->randomNumber(5, true),
                'birth_place' => $faker->city(),
                'birth_day' => $faker->date('Y-m-d'),
                'phone_number' => '08773662738',
                'password' => Hash::make('testing123')
            ]);
        }
    }
}

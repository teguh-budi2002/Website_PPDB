<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Teguh Admin
        DB::table('users')->insert([
            'role_id' => 1,
            'fullname' => "Teguh Budi Laksono",
            'email' => 'teguh@gis.com',
            'nisn' => $faker->randomNumber(5, true),
            'birth_place' => $faker->city(),
            'birth_day' => $faker->date('Y-m-d'),
            'phone_number' => str_replace("-", "", $faker->phoneNumber()),
            'password' => Hash::make('teguhadmin')
        ]);

        // Aksa Admin
        DB::table('users')->insert([
            'role_id' => 1,
            'fullname' => "Dhimas Adyaksa Pratama",
            'email' => 'dimas@gis.com',
            'nisn' => $faker->randomNumber(5, true),
            'birth_place' => $faker->city(),
            'birth_day' => $faker->date('Y-m-d'),
            'phone_number' => str_replace("-", "", $faker->phoneNumber()),
            'password' => Hash::make('dimasadmin')
        ]);

        // Reza Admin
        DB::table('users')->insert([
            'role_id' => 1,
            'fullname' => "Reza Kurnia Ramadhan",
            'email' => 'reza@gis.com',
            'nisn' => $faker->randomNumber(5, true),
            'birth_place' => $faker->city(),
            'birth_day' => $faker->date('Y-m-d'),
            'phone_number' => str_replace("-", "", $faker->phoneNumber()),
            'password' => Hash::make('rezaadmin')
        ]);

        // Hisyam Admin
        DB::table('users')->insert([
            'role_id' => 1,
            'fullname' => "Mochammad Hisamsyah",
            'email' => 'hisam@gis.com',
            'nisn' => $faker->randomNumber(5, true),
            'birth_place' => $faker->city(),
            'birth_day' => $faker->date('Y-m-d'),
            'phone_number' => str_replace("-", "", $faker->phoneNumber()),
            'password' => Hash::make('hisamadmin')
        ]);

        // Revo Admin
        DB::table('users')->insert([
            'role_id' => 1,
            'fullname' => "Revo Nagara",
            'email' => 'revo@gis.com',
            'nisn' => $faker->randomNumber(5, true),
            'birth_place' => $faker->city(),
            'birth_day' => $faker->date('Y-m-d'),
            'phone_number' => str_replace("-", "", $faker->phoneNumber()),
            'password' => Hash::make('revoadmin')
        ]);
    }
}

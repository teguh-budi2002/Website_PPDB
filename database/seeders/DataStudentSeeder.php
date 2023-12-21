<?php

namespace Database\Seeders;

use App\Models\ClassSemester;
use App\Models\DataStudentSchool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DataStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i <= 50; $i++) { 
            ClassSemester::create([
                'user_id' => $faker->numberBetween(1, 10),
                'Semester' => "Semester " . $faker->numberBetween(1, 5)
            ]);

        }
        for ($i=0; $i <= 50 ; $i++) { 
            DataStudentSchool::create([
                'class_semester_id' => $faker->numberBetween(1, 50),
                'science' => 87,
                'indonesian_language_lesson' => 66,
                'english_language_lesson' => 98,
                'mathematics' => 88,
                'student_proof_of_grade_report' => 'Testing Data Student'
            ]);
        }
    }
}

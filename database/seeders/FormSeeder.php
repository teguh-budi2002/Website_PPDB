<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Form::create([
            'form_type' => 'FormAdministration',
        ]);

        Form::create([
            'form_type' => 'FormDataStudent',
        ]);

        Form::create([
            'form_type' => 'AnnouncementSelection',
        ]);
    }
}

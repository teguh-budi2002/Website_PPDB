<?php

namespace Database\Seeders;

use App\Models\Form;
use Carbon\Carbon;
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
            'formEnabledUntil' => Carbon::now()->addWeek(),
        ]);

        Form::create([
            'form_type' => 'FormDataStudent',
            'formEnabledUntil' => Carbon::now()->addWeek(),
        ]);

        Form::create([
            'form_type' => 'AnnouncementSelection',
            'formEnabledUntil' => Carbon::now()->addWeek(),
        ]);
    }
}

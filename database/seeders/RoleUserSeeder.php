<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([ 
            'id' => 1,
            'role_name' => 'Admin',
            'role_task' => 'Manage Website'
        ]);

        Role::create([ 
            'id' => 2,
            'role_name' => 'Member',
            'role_task' => 'Participant'
        ]);
    }
}

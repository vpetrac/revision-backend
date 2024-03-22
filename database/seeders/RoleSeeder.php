<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'supervisor']);
        Role::create(['name' => 'auditor']);
        Role::create(['name' => 'subject']);

        $adminRole->givePermissionTo('all');
    }
}

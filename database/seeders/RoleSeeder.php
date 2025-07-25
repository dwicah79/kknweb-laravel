<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super-Admin']);
        Role::create(['name' => 'Pengurus-Desa']);
        Role::create(['name' => 'Pengurus-Pemuda']);
        Role::create(['name' => 'Pengurus-PKK']);
        Role::create(['name' => 'Pengurus-TPA']);
    }
}

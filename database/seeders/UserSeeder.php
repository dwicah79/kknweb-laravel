<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Super-Admin', 'Pengurus-Desa', 'Pengurus-Pemuda', 'Pengurus-PKK', 'Pengurus-TPA'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $user = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@kretek.com',
                'password' => Hash::make('superadmin'),
                'role' => 'Super-Admin'
            ],
            [
                'name' => 'Pengurus Desa',
                'email' => 'pengurusdesa@kretek.com',
                'password' => Hash::make('pengurusdesa'),
                'role' => 'Pengurus-Desa'
            ],
            [
                'name' => 'Pengurus Pemuda',
                'email' => 'penguruspemuda@kretek.com',
                'password' => Hash::make('penguruspemuda'),
                'role' => 'Pengurus-Pemuda'
            ],
            [
                'name' => 'Pengurus PKK',
                'email' => 'penguruspkk@kretek.com',
                'password' => Hash::make('penguruspkk'),
                'role' => 'Pengurus-PKK'
            ],
            [
                'name' => 'Pengurus TPA',
                'email' => 'pengurustpa@kretek.com',
                'password' => Hash::make('pengurustpa'),
                'role' => 'Pengurus-TPA'
            ],
        ];

        foreach ($user as $userData) {
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password']
                ]
            );
            $user->assignRole($userData['role']);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        foreach (range(1, 50) as $index) {
            \App\Models\Umkm::create([
                'name' => $faker->company,
                'telp' => $faker->phoneNumber,
                'description' => $faker->text(500),
                'address' => $faker->address,
                'image' => 'https://picsum.photos/640/480',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

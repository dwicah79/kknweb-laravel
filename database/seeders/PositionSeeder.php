<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            'Kepala Dusun',
            'Ketua RT 1',
            'Ketua RT 2',
            'Ketua RT 3',
            'Ketua RT 4',
            'Ketua RW 2',
            'Ketua RW 1',
            'Ketua Pemuda',
            'Wakil Ketua Pemuda',
            'Sekretaris Pemuda',
            'Bendahara Pemuda',
            'Ketua PKK',
            'Wakil Ketua PKK',
            'Sekretaris PKK',
            'Bendahara PKK',
        ];

        foreach ($positions as $position) {
            \App\Models\Position::create([
                'job_title' => $position,
            ]);
        }
    }
}

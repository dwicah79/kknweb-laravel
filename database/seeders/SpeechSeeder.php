<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $speeches = [
            'Assalamu’alaikum Warahmatullahi Wabarakatuh,
            Yang terhormat Bapak/Ibu perangkat desa, rekan-rekan mahasiswa KKN Unit III.B.2 Universitas Ahmad Dahlan, serta warga Dusun Kretek 1 yang saya banggakan.
            Pada hari yang berbahagia ini, marilah kita bersyukur atas terlaksananya launching website Dusun Kretek 1 yang merupakan hasil kolaborasi antara mahasiswa KKN Universitas Ahmad Dahlan dengan warga dusun kita. Website ini tidak hanya menjadi bukti kemajuan teknologi, tetapi juga menjadi wadah untuk mempromosikan potensi, budaya, dan kegiatan masyarakat kita kepada dunia luar. Semoga dengan adanya website ini, Dusun Kretek 1 semakin dikenal, maju, dan sejahtera. Terima kasih kepada semua pihak yang telah mendukung terwujudnya program ini.
            Wassalamu’alaikum Warahmatullahi Wabarakatuh.',
        ];

        foreach ($speeches as $speech) {
            \App\Models\Speech::create([
                'speech' => $speech,
            ]);
        }
    }
}

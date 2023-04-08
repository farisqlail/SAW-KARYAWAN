<?php

use Illuminate\Database\Seeder;
use App\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'C1',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 15
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'C2',
                'atribut_kriteria' => 'cost',
                'bobot_preferensi' => 10
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'C3',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 10
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'C4',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 20
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'C5',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 20
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'C6',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 15
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'C7',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 10
            ]
        ];

        Kriteria::insert($data);
    }
}

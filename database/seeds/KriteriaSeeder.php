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
                'nama_kriteria' => 'IPK',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 15,
                'tampil_di_pelamar' => 1
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'USIA',
                'atribut_kriteria' => 'cost',
                'bobot_preferensi' => 10,
                'tampil_di_pelamar' => 1
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'PENGALAMAN',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 10,
                'tampil_di_pelamar' => 1
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'EXPERT DALAM MENGGUNAKAN LARAVEL',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 20,
                'tampil_di_pelamar' => 0
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'PAHAM PEMROGRAMAN JAVASCRIPT',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 20,
                'tampil_di_pelamar' => 0
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'PAHAM PEMROGRAMAN PHP',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 10,
                'tampil_di_pelamar' => 0
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'SOAL PEMROGRAMAN',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 10,
                'tampil_di_pelamar' => 0
            ],
            [
                'id_lowongan' => 1,
                'nama_kriteria' => 'PSIKOTES',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 5,
                'tampil_di_pelamar' => 0
            ],

            [
                'id_lowongan' => 2,
                'nama_kriteria' => 'IPK',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 15,
                'tampil_di_pelamar' => 1
            ],
            [
                'id_lowongan' => 2,
                'nama_kriteria' => 'USIA',
                'atribut_kriteria' => 'cost',
                'bobot_preferensi' => 10,
                'tampil_di_pelamar' => 1
            ],
            [
                'id_lowongan' => 2,
                'nama_kriteria' => 'PENGALAMAN',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 10,
                'tampil_di_pelamar' => 1
            ],
            [
                'id_lowongan' => 2,
                'nama_kriteria' => 'EXPERT DALAM MENGGUNAKAN EXCEL',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 20,
                'tampil_di_pelamar' => 0
            ],
            [
                'id_lowongan' => 2,
                'nama_kriteria' => 'PAHAM PEMBUATAN LAPORAN KEUANGAN',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 20,
                'tampil_di_pelamar' => 0
            ],
            [
                'id_lowongan' => 2,
                'nama_kriteria' => 'PAHAM SOFTWARE AKUNTANSI',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 15,
                'tampil_di_pelamar' => 0
            ],
            [
                'id_lowongan' => 2,
                'nama_kriteria' => 'SOAL AKUNTANSI',
                'atribut_kriteria' => 'benefit',
                'bobot_preferensi' => 10,
                'tampil_di_pelamar' => 0
            ]
        ];

        Kriteria::insert($data);
    }
}

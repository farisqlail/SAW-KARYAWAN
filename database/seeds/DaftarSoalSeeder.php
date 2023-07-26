<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DaftarSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftar_soal')->insert([
            [
                'id_kriteria' => 4,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Perintah artisan yang digunakan untuk membuat proyek Laravel baru adalah?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],
            [
                'id_kriteria' => 4,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Apa tujuan dari Eloquent dalam Laravel?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],
            
            [
                'id_kriteria' => 5,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Apa yang merupakan tipe data dasar dalam JavaScript?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],
            [
                'id_kriteria' => 5,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Bagaimana cara menampilkan pesan "Hello, World!" di konsol browser menggunakan JavaScript?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],

            [
                'id_kriteria' => 6,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Apa yang merupakan tipe data dasar dalam PHP?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],
            [
                'id_kriteria' => 6,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Bagaimana cara mendeklarasikan variabel dalam PHP?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],

            [
                'id_kriteria' => 7,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Apa yang dimaksud dengan "IDE" dalam konteks pemrograman?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],
            [
                'id_kriteria' => 7,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Di antara bahasa pemrograman berikut, manakah yang merupakan bahasa pemrograman tingkat tinggi?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],
        ]);
    }
}

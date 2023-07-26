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
            [
                'id_kriteria' => 7,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Fungsi dari loop dalam pemrograman adalah ?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],
            [
                'id_kriteria' => 7,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Apa yang dimaksud dengan "syntax error" dalam pemrograman?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],
            [
                'id_kriteria' => 7,
                'id_jadwal_tes' => 1,
                'id_lowongan' => 1,
                'soal' => 'Manakah dari berikut ini adalah tipe data yang digunakan untuk menyimpan angka desimal?',
                'file_soal' => null,
                'bobot_soal' => 0
            ],
        ]);
    }
}

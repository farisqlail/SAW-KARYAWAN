<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailJawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_jawaban')->insert([
            [
                'id_daftar_soal' => 1,
                'jawaban' => 'A. Integrated Development Environment',
                'isTrue' => 1,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 1,
                'jawaban' => 'B. Interconnected Data Entities',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 1,
                'jawaban' => 'C. Input Data Execution',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 1,
                'jawaban' => 'D. Internal Data Exchange',
                'isTrue' => 0,
                'urutan' => 'd'
            ],

            [
                'id_daftar_soal' => 2,
                'jawaban' => 'A. Assembly Language',
                'isTrue' => 0,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 2,
                'jawaban' => 'B. C++',
                'isTrue' => 1,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 2,
                'jawaban' => 'C. Machine Language',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 2,
                'jawaban' => 'D. Binary Code',
                'isTrue' => 0,
                'urutan' => 'd'
            ],

            [
                'id_daftar_soal' => 3,
                'jawaban' => 'A. Mengambil input dari pengguna',
                'isTrue' => 0,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 3,
                'jawaban' => 'B. Melakukan operasi aritmatika',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 3,
                'jawaban' => 'C. Menjalankan blok kode berulang kali',
                'isTrue' => 1,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 3,
                'jawaban' => 'D. Menghubungkan ke database',
                'isTrue' => 0,
                'urutan' => 'd'
            ],

            [
                'id_daftar_soal' => 4,
                'jawaban' => 'A. Kesalahan logika dalam kode',
                'isTrue' => 0,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 4,
                'jawaban' => 'B. Kesalahan tata bahasa dalam kode',
                'isTrue' => 1,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 4,
                'jawaban' => 'C. Kesalahan koneksi ke database',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 4,
                'jawaban' => 'D. Kesalahan dalam menghitung angka',
                'isTrue' => 0,
                'urutan' => 'd'
            ],

            [
                'id_daftar_soal' => 5,
                'jawaban' => 'A. Integer',
                'isTrue' => 0,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 5,
                'jawaban' => 'B. String',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 5,
                'jawaban' => 'C. Float',
                'isTrue' => 1,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 5,
                'jawaban' => 'D. Boolean',
                'isTrue' => 0,
                'urutan' => 'd'
            ],


        ]);
    }
}

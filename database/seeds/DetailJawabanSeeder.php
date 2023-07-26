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
                'jawaban' => 'A. php artisan startproject',
                'isTrue' => 1,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 1,
                'jawaban' => 'B. php artisan new',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 1,
                'jawaban' => 'C. php artisan create',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 1,
                'jawaban' => 'D. php artisan make:project',
                'isTrue' => 0,
                'urutan' => 'd'
            ],

            [
                'id_daftar_soal' => 2,
                'jawaban' => 'A. Untuk membuat dan mengelola tabel database',
                'isTrue' => 1,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 2,
                'jawaban' => 'B. Untuk menangani permintaan dan respons HTTP',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 2,
                'jawaban' => 'C. Untuk menyediakan antarmuka baris perintah bagi para pengembang',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 2,
                'jawaban' => 'D. Untuk bekerja dengan database menggunakan pendekatan ORM Object-Relational Mapping',
                'isTrue' => 0,
                'urutan' => 'd'
            ],

            [
                'id_daftar_soal' => 3,
                'jawaban' => 'A. String dan Angka',
                'isTrue' => 1,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 3,
                'jawaban' => 'B. Angka dan Objek',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 3,
                'jawaban' => 'C. Array dan Objek',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 3,
                'jawaban' => 'D. Angka dan Boolean',
                'isTrue' => 0,
                'urutan' => 'd'
            ],

            [
                'id_daftar_soal' => 4,
                'jawaban' => 'A. console.print("Hello, World!");',
                'isTrue' => 1,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 4,
                'jawaban' => 'B. console.log("Hello, World!");',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 4,
                'jawaban' => 'C. console.display("Hello, World!");',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 4,
                'jawaban' => 'D. console.alert("Hello, World!");',
                'isTrue' => 0,
                'urutan' => 'd'
            ],

            [
                'id_daftar_soal' => 5,
                'jawaban' => 'A. String dan Integer',
                'isTrue' => 1,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 5,
                'jawaban' => 'B. Integer dan Array',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 5,
                'jawaban' => 'C. Array dan Object',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 5,
                'jawaban' => 'D. Float dan Boolean',
                'isTrue' => 0,
                'urutan' => 'd'
            ],
            [
                'id_daftar_soal' => 6,
                'jawaban' => 'A. var $nama_variabel;
                ',
                'isTrue' => 1,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 6,
                'jawaban' => 'B. let nama_variabel;',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 6,
                'jawaban' => 'C. $nama_variabel;',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 6,
                'jawaban' => 'D. declare $nama_variabel;',
                'isTrue' => 0,
                'urutan' => 'd'
            ],


            [
                'id_daftar_soal' => 7,
                'jawaban' => 'A. Integrated Development Environment',
                'isTrue' => 1,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 7,
                'jawaban' => 'B. Interconnected Data Entities',
                'isTrue' => 0,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 7,
                'jawaban' => 'C. Input Data Execution',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 7,
                'jawaban' => 'D. Internal Data Exchange',
                'isTrue' => 0,
                'urutan' => 'd'
            ],

            [
                'id_daftar_soal' => 8,
                'jawaban' => 'A. Assembly Language',
                'isTrue' => 1,
                'urutan' => 'a'
            ],
            [
                'id_daftar_soal' => 8,
                'jawaban' => 'B. C++',
                'isTrue' => 1,
                'urutan' => 'b'
            ],
            [
                'id_daftar_soal' => 8,
                'jawaban' => 'C. Machine Language',
                'isTrue' => 0,
                'urutan' => 'c'
            ],
            [
                'id_daftar_soal' => 8,
                'jawaban' => 'D. Binary Code',
                'isTrue' => 0,
                'urutan' => 'd'
            ],


        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\BobotKriteria;

class BobotKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // programmer
        $C1 = [
            [
                'id_kriteria' => 1,
                'nama_bobot' => 'IPK 0 - 2.29',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '2.29'
            ],
            [
                'id_kriteria' => 1,
                'nama_bobot' => 'IPK 2.3 - 2.8',
                'jumlah_bobot' => 2,
                'nilai_awal' => '2.3',
                'nilai_akhir' => '2.8'
            ],
            [
                'id_kriteria' => 1,
                'nama_bobot' => 'IPK 2.81 - 3',
                'jumlah_bobot' => 3,
                'nilai_awal' => '2.81',
                'nilai_akhir' => '3'
            ],
            [
                'id_kriteria' => 1,
                'nama_bobot' => 'IPK 3.01 - 3.4',
                'jumlah_bobot' => 4,
                'nilai_awal' => '3.01',
                'nilai_akhir' => '3.4'
            ],
            [
                'id_kriteria' => 1,
                'nama_bobot' => 'IPK 3.41 - 4',
                'jumlah_bobot' => 5,
                'nilai_awal' => '3.41',
                'nilai_akhir' => '4'
            ],
        ];

        BobotKriteria::insert($C1);

        $C2 = [
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 27',
                'jumlah_bobot' => 1,
                'nilai_awal' => '27',
                'nilai_akhir' => '27'
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 25 - 26',
                'jumlah_bobot' => 2,
                'nilai_awal' => '25',
                'nilai_akhir' => '26'
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 23 - 24',
                'jumlah_bobot' => 3,
                'nilai_awal' => '23',
                'nilai_akhir' => '24'
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 21 - 22',
                'jumlah_bobot' => 4,
                'nilai_awal' => '21',
                'nilai_akhir' => '22'
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 18 - 20',
                'jumlah_bobot' => 5,
                'nilai_awal' => '18',
                'nilai_akhir' => '20'
            ],
        ];

        BobotKriteria::insert($C2);

        $C3 = [
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 0 - 1 TAHUN',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '1'
            ],
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 2 - 3 TAHUN',
                'jumlah_bobot' => 2,
                'nilai_awal' => '2',
                'nilai_akhir' => '3'
            ],
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 4 - 5 TAHUN',
                'jumlah_bobot' => 3,
                'nilai_awal' => '4',
                'nilai_akhir' => '5'
            ],
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 6 - 7 TAHUN',
                'jumlah_bobot' => 4,
                'nilai_awal' => '6',
                'nilai_akhir' => '7'
            ],
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 8 - 9 TAHUN',
                'jumlah_bobot' => 5,
                'nilai_awal' => '8',
                'nilai_akhir' => '9'
            ],
        ];

        BobotKriteria::insert($C3);

        $C4 = [
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Laravel 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Laravel 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Laravel 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Laravel 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Laravel 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C4);

        $C5 = [
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham Alur SDLC 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham Alur SDLC 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham Alur SDLC 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham Alur SDLC 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham Alur SDLC 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C5);

        $C6 = [
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham Javascript 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham Javascript 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham Javascript 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham Javascript 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham Javascript 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C6);

        $C7 = [
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'SOAL PEMROGRAMAN 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'SOAL PEMROGRAMAN 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'SOAL PEMROGRAMAN 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'SOAL PEMROGRAMAN 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'SOAL PEMROGRAMAN 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C7);
        //end programmer

        // akuntansi
        $C8 = [
            [
                'id_kriteria' => 8,
                'nama_bobot' => 'IPK 0 - 2.29',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '2.29'
            ],
            [
                'id_kriteria' => 8,
                'nama_bobot' => 'IPK 2.3 - 2.8',
                'jumlah_bobot' => 2,
                'nilai_awal' => '2.3',
                'nilai_akhir' => '2.8'
            ],
            [
                'id_kriteria' => 8,
                'nama_bobot' => 'IPK 2.81 - 3',
                'jumlah_bobot' => 3,
                'nilai_awal' => '2.81',
                'nilai_akhir' => '3'
            ],
            [
                'id_kriteria' => 8,
                'nama_bobot' => 'IPK 3.01 - 3.4',
                'jumlah_bobot' => 4,
                'nilai_awal' => '3.01',
                'nilai_akhir' => '3.4'
            ],
            [
                'id_kriteria' => 8,
                'nama_bobot' => 'IPK 3.41 - 4',
                'jumlah_bobot' => 5,
                'nilai_awal' => '3.41',
                'nilai_akhir' => '4'
            ],
        ];

        BobotKriteria::insert($C8);

        $C9 = [
            [
                'id_kriteria' => 9,
                'nama_bobot' => 'USIA 27',
                'jumlah_bobot' => 1,
                'nilai_awal' => '27',
                'nilai_akhir' => '27'
            ],
            [
                'id_kriteria' => 9,
                'nama_bobot' => 'USIA 25 - 26',
                'jumlah_bobot' => 2,
                'nilai_awal' => '25',
                'nilai_akhir' => '26'
            ],
            [
                'id_kriteria' => 9,
                'nama_bobot' => 'USIA 23 - 24',
                'jumlah_bobot' => 3,
                'nilai_awal' => '23',
                'nilai_akhir' => '24'
            ],
            [
                'id_kriteria' => 9,
                'nama_bobot' => 'USIA 21 - 22',
                'jumlah_bobot' => 4,
                'nilai_awal' => '21',
                'nilai_akhir' => '22'
            ],
            [
                'id_kriteria' => 9,
                'nama_bobot' => 'USIA 18 - 20',
                'jumlah_bobot' => 5,
                'nilai_awal' => '18',
                'nilai_akhir' => '20'
            ],
        ];

        BobotKriteria::insert($C9);

        $C10 = [
            [
                'id_kriteria' => 10,
                'nama_bobot' => 'PENGALAMAN 0 - 1 TAHUN',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '1'
            ],
            [
                'id_kriteria' => 10,
                'nama_bobot' => 'PENGALAMAN 2 - 3 TAHUN',
                'jumlah_bobot' => 2,
                'nilai_awal' => '2',
                'nilai_akhir' => '3'
            ],
            [
                'id_kriteria' => 10,
                'nama_bobot' => 'PENGALAMAN 4 - 5 TAHUN',
                'jumlah_bobot' => 3,
                'nilai_awal' => '4',
                'nilai_akhir' => '5'
            ],
            [
                'id_kriteria' => 10,
                'nama_bobot' => 'PENGALAMAN 6 - 7 TAHUN',
                'jumlah_bobot' => 4,
                'nilai_awal' => '6',
                'nilai_akhir' => '7'
            ],
            [
                'id_kriteria' => 10,
                'nama_bobot' => 'PENGALAMAN 8 - 9 TAHUN',
                'jumlah_bobot' => 5,
                'nilai_awal' => '8',
                'nilai_akhir' => '9'
            ],
        ];

        BobotKriteria::insert($C10);

        $C11 = [
            [
                'id_kriteria' => 11,
                'nama_bobot' => 'Expert dalam menggunakan Excel 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 11,
                'nama_bobot' => 'Expert dalam menggunakan Excel 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 11,
                'nama_bobot' => 'Expert dalam menggunakan Excel 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 11,
                'nama_bobot' => 'Expert dalam menggunakan Excel 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 11,
                'nama_bobot' => 'Expert dalam menggunakan Excel 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C11);

        $C12 = [
            [
                'id_kriteria' => 12,
                'nama_bobot' => 'Paham Pembuatan Laporan Keuangan 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 12,
                'nama_bobot' => 'Paham Pembuatan Laporan Keuangan 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 12,
                'nama_bobot' => 'Paham Pembuatan Laporan Keuangan 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 12,
                'nama_bobot' => 'Paham Pembuatan Laporan Keuangan 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 12,
                'nama_bobot' => 'Paham Pembuatan Laporan Keuangan 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C12);

        $C13 = [
            [
                'id_kriteria' => 13,
                'nama_bobot' => 'Paham Software Keuangan 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 13,
                'nama_bobot' => 'Paham Software Keuangan 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 13,
                'nama_bobot' => 'Paham Software Keuangan 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 13,
                'nama_bobot' => 'Paham Software Keuangan 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 13,
                'nama_bobot' => 'Paham Software Keuangan 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C13);

        $C14 = [
            [
                'id_kriteria' => 14,
                'nama_bobot' => 'SOAL Akuntansi 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 14,
                'nama_bobot' => 'SOAL Akuntansi 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 14,
                'nama_bobot' => 'SOAL Akuntansi 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 14,
                'nama_bobot' => 'SOAL Akuntansi 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 14,
                'nama_bobot' => 'SOAL Akuntansi 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C14);
        //end akuntansi

        
    }
}

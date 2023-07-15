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
                'nama_bobot' => 'USIA 36 - 100',
                'jumlah_bobot' => 1,
                'nilai_awal' => '36',
                'nilai_akhir' => '100'
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 32 -35',
                'jumlah_bobot' => 2,
                'nilai_awal' => '32',
                'nilai_akhir' => '35'
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 28 - 31',
                'jumlah_bobot' => 3,
                'nilai_awal' => '28',
                'nilai_akhir' => '31'
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 24 - 27',
                'jumlah_bobot' => 4,
                'nilai_awal' => '24',
                'nilai_akhir' => '27'
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 18 - 23',
                'jumlah_bobot' => 5,
                'nilai_awal' => '18',
                'nilai_akhir' => '23'
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
                'nama_bobot' => 'Expert dalam menggunakan Excel 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Excel 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Excel 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Excel 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Excel 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C4);

        $C5 = [
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 91 - 100',
                'jumlah_bobot' => 5,
                'nilai_awal' => '91',
                'nilai_akhir' => '100'
            ],
        ];

        BobotKriteria::insert($C5);

        $C6 = [
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 0 - 60',
                'jumlah_bobot' => 1,
                'nilai_awal' => '0',
                'nilai_akhir' => '60'
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 61 - 70',
                'jumlah_bobot' => 2,
                'nilai_awal' => '61',
                'nilai_akhir' => '70'
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 71 - 80',
                'jumlah_bobot' => 3,
                'nilai_awal' => '71',
                'nilai_akhir' => '80'
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 81 - 90',
                'jumlah_bobot' => 4,
                'nilai_awal' => '81',
                'nilai_akhir' => '90'
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 91 - 100',
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
    }
}

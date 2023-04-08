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
                'nama_bobot' => 'IPK 1',
                'bobot_awal' => 0,
                'bobot_akhir' => 2.29
            ],
            [
                'id_kriteria' => 1,
                'nama_bobot' => 'IPK 2',
                'bobot_awal' => 2.3,
                'bobot_akhir' => 2.8
            ],
            [
                'id_kriteria' => 1,
                'nama_bobot' => 'IPK 3',
                'bobot_awal' => 2.81,
                'bobot_akhir' => 3
            ],
            [
                'id_kriteria' => 1,
                'nama_bobot' => 'IPK 4',
                'bobot_awal' => 3.01,
                'bobot_akhir' => 3.4
            ],
            [
                'id_kriteria' => 1,
                'nama_bobot' => 'IPK 5',
                'bobot_awal' => 3.41,
                'bobot_akhir' => 4
            ],
        ];

        BobotKriteria::insert($C1);

        $C2 = [
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 1',
                'bobot_awal' => 36,
                'bobot_akhir' => 100
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 2',
                'bobot_awal' => 32,
                'bobot_akhir' => 35
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 3',
                'bobot_awal' => 28,
                'bobot_akhir' => 31
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 4',
                'bobot_awal' => 24,
                'bobot_akhir' => 27
            ],
            [
                'id_kriteria' => 2,
                'nama_bobot' => 'USIA 5',
                'bobot_awal' => 18,
                'bobot_akhir' => 23
            ],
        ];

        BobotKriteria::insert($C2);

        $C3 = [
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 1',
                'bobot_awal' => 0,
                'bobot_akhir' => 0
            ],
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 2',
                'bobot_awal' => 0,
                'bobot_akhir' => 1
            ],
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 3',
                'bobot_awal' => 0,
                'bobot_akhir' => 2
            ],
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 4',
                'bobot_awal' => 0,
                'bobot_akhir' => 3
            ],
            [
                'id_kriteria' => 3,
                'nama_bobot' => 'PENGALAMAN 5',
                'bobot_awal' => 0,
                'bobot_akhir' => 4
            ],
        ];

        BobotKriteria::insert($C3);

        $C4 = [
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Excel 1',
                'bobot_awal' => 0,
                'bobot_akhir' => 60
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Excel 2',
                'bobot_awal' => 61,
                'bobot_akhir' => 70
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Excel 3',
                'bobot_awal' => 71,
                'bobot_akhir' => 80
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Excel 4',
                'bobot_awal' => 81,
                'bobot_akhir' => 90
            ],
            [
                'id_kriteria' => 4,
                'nama_bobot' => 'Expert dalam menggunakan Excel 5',
                'bobot_awal' => 91,
                'bobot_akhir' => 100
            ],
        ];

        BobotKriteria::insert($C4);

        $C5 = [
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 1',
                'bobot_awal' => 0,
                'bobot_akhir' => 60
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 2',
                'bobot_awal' => 61,
                'bobot_akhir' => 70
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 3',
                'bobot_awal' => 71,
                'bobot_akhir' => 80
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 4',
                'bobot_awal' => 81,
                'bobot_akhir' => 90
            ],
            [
                'id_kriteria' => 5,
                'nama_bobot' => 'Paham pembuatan laporan keuangan 5',
                'bobot_awal' => 91,
                'bobot_akhir' => 100
            ],
        ];

        BobotKriteria::insert($C5);

        $C6 = [
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 1',
                'bobot_awal' => 0,
                'bobot_akhir' => 60
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 2',
                'bobot_awal' => 61,
                'bobot_akhir' => 70
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 3',
                'bobot_awal' => 71,
                'bobot_akhir' => 80
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 4',
                'bobot_awal' => 81,
                'bobot_akhir' => 90
            ],
            [
                'id_kriteria' => 6,
                'nama_bobot' => 'Paham software akuntansi 5',
                'bobot_awal' => 91,
                'bobot_akhir' => 100
            ],
        ];

        BobotKriteria::insert($C6);

        $C7 = [
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'Psikotes 1',
                'bobot_awal' => 0,
                'bobot_akhir' => 60
            ],
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'Psikotes 2',
                'bobot_awal' => 61,
                'bobot_akhir' => 70
            ],
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'Psikotes 3',
                'bobot_awal' => 71,
                'bobot_akhir' => 80
            ],
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'Psikotes 4',
                'bobot_awal' => 81,
                'bobot_akhir' => 90
            ],
            [
                'id_kriteria' => 7,
                'nama_bobot' => 'Psikotes 5',
                'bobot_awal' => 91,
                'bobot_akhir' => 100
            ],
        ];

        BobotKriteria::insert($C7);
    }
}

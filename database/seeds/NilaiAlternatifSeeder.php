<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiAlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilai_alternatif')->insert(
            [
                [
                    'id_pelamar' => 1,
                    'id_bobot_kriteria' => 5,
                    'nilai' => (float) 3.5,
                ],
                [
                    'id_pelamar' => 1,
                    'id_bobot_kriteria' => 9,
                    'nilai' => (float) 22,
                ],
                [
                    'id_pelamar' => 1,
                    'id_bobot_kriteria' => 12,
                    'nilai' => (float) 2,
                ],
                [
                    'id_pelamar' => 2,
                    'id_bobot_kriteria' => 2,
                    'nilai' => (float) 2.6,
                ],
                [
                    'id_pelamar' => 2,
                    'id_bobot_kriteria' => 8,
                    'nilai' => (float) 23,
                ],
                [
                    'id_pelamar' => 2,
                    'id_bobot_kriteria' => 13,
                    'nilai' => (float) 4,
                ],

                [
                    'id_pelamar' => 3,
                    'id_bobot_kriteria' => 5,
                    'nilai' => (float) 3.8,
                ], 
                [
                    'id_pelamar' => 3,
                    'id_bobot_kriteria' => 8,
                    'nilai' => (float) 23,
                ], 
                [
                    'id_pelamar' => 3,
                    'id_bobot_kriteria' => 12,
                    'nilai' => (float) 2,
                ],

                [
                    'id_pelamar' => 4,
                    'id_bobot_kriteria' => 3,
                    'nilai' => (float) 3,
                ], 
                [
                    'id_pelamar' => 4,
                    'id_bobot_kriteria' => 8,
                    'nilai' => (float) 23,
                ], 
                [
                    'id_pelamar' => 4,
                    'id_bobot_kriteria' => 11,
                    'nilai' => (float) 0,
                ],

                [
                    'id_pelamar' => 5,
                    'id_bobot_kriteria' => 5,
                    'nilai' => (float) 3.5,
                ],  
                [
                    'id_pelamar' => 5,
                    'id_bobot_kriteria' => 8,
                    'nilai' => (float) 23,
                ],  
                [
                    'id_pelamar' => 5,
                    'id_bobot_kriteria' => 13,
                    'nilai' => (float) 4,
                ],
            ]
        );
    }
}

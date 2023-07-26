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
                    'nilai' => (double) 3.5,
                ],
                [
                    'id_pelamar' => 1,
                    'id_bobot_kriteria' => 9,
                    'nilai' => (double) 22,
                ],
                [
                    'id_pelamar' => 1,
                    'id_bobot_kriteria' => 12,
                    'nilai' => (double) 2,
                ],
            ]
        );
    }
}

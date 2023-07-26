<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JadwalTesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal_tes')->insert([
            'id_lowongan' => 1,
            'tanggal_notif' => date('2023-07-26'),
            'tanggal' => date('2023-07-26 08:30:00'),
            'durasi_tes' => date('2023-07-26 23:53:00')
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelamar')->insert([
            'id_user' => 6,
            'id_lowongan' => 1,
            'nama_pelamar' => 'rizqi',
            'tanggal_lahir' => date('2000-07-26'),
            'tempat_lahir' => 'Surabaya',
            'agama' => 'Islam',
            'alamat' => 'Jl.tulung agya',
            'no_telepon' => '07907293938',
            'jenis_kelamin' => 'Laki-laki',
            'cv' => '1690335615.pdf',
            'ijazah' => '1690335615.pdf',
            'pas_foto' => '1690335615.jpg',
            'seleksi_satu' => null,
            'seleksi_dua' => null,
            'status_wawancara' => null,
            'hasil_wawancara' => null,
            'status_dokumen' => 'Dokumen Valid',
            'keterangan_psikotes' => null,
            'nilai_tes' => null,
        ]);
    }
}

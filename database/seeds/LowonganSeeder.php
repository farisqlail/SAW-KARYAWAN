<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lowongan')->insert([
            [
                'posisi_lowongan' => 'Programmer',
                'divisi' => 'developer',
                'id_user' => 4,
                'berlaku_sampai' => Carbon::create('2023', '12', '12'),
                'status_approve' => 'selesai',
                'deskripsi_pekerjaan' => 'Fungsi

            Melakukan proyek perbaikan, pembaharuan dan/atau pengembangan baru aplikasi/sistem teknologi yang lebih memadai sesuai dengan kebutuhan User dan/atau Perusahaan.
            Tugas, dan Tanggung jawab:

            Melakukan analisa kebutuhan User dan/atau Perusahaan atas perbaikan, pembaharuan dan/atau pengembangan aplikasi/sistem teknologi guna menunjang operasional bisnis Perusahaan.
            Membuat desain dan membangun aplikasi/sistem sesuai dengan kesepakatan analisa kebutuhan dari User dan/atau Perusahaan.
            Melakukan uji coba aplikasi/sistem sebelum dilakukan implementasi aplikasi/system.
            Melakukan implementasi dan sosialisasi user guide untuk pemakaian aplikasi/sistem kepada User.
            Mengajukan usulan proyek pembaharuan dan pengembangan sistem teknologi yang diajukan dan dianggarkan pada awal tahun.',
                'deskripsi_persyaratan' => 'Spesifikasi:

                S1 Fakultas Ilmu Komputer, dengan IPK 3.00
                Pengalaman Minimal 2 tahun
                Penguasaan konsep Relational Database Management System
                Menguasai dan memahami konsep web application, MVC, API
                Menguasai Bahasa C#, VB. NET, PHP/Ms. SQL ( is must)
                Memahami Bahasa Android/java ( nilai tambah)
                Kemampuan kemandirian dalam melakukan pekerjaannya
                Kemampuan berkoordinasi dan bersosialisasi
                Penempatan : Jakarta - HO',

            ],
            [
                'posisi_lowongan' => 'Akuntansi',
                'divisi' => 'developer',
                'id_user' => 4,
                'berlaku_sampai' => Carbon::create('2023', '12', '12'),
                'status_approve' => 'selesai',
                'deskripsi_pekerjaan' => 'Bertanggung jawab atas pencatatan & penyimpanan transaksi keuangan perusahaan serta penginputan data.
                Mengecek kesesuaian antara transaksi keuangan dengan dokumen pendukung.
                Melakukan perhitungan pajak dan pelaporannya (pph sewa, PPh 21, PPh 23, PPh 25 dan PPN, PPh badan dan perorangan).',
                'deskripsi_persyaratan' => '
                •	Mengelola dan menyusun laporan keuangan, kuitansi/nota/faktur dan bukti pembayaran.
                •	Melakukan pencatatan transaksi keuangan dalam buku besar.
                •	Mengentri data penerimaan, pengeluaran, dan memorial.
                •	Melakukan tutup buku akhir bulan, akhir tahun dan filling dokumen.
                •	Menyiapkan dokumen yang dibutuhkan dalam audit laporan keuangan.
                •	Bertanggung jawab kepada manajer akuntansi dan melaporkan apa yang dikerjakan kepada atasan.',

            ],
        ]);
    }
}

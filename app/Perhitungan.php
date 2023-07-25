<?php

namespace App;

use App\lowongan;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    public static function get_perhitungan($id_lowongan)
    {
        $lowongan = lowongan::findOrFail($id_lowongan);

        $arr = [];

        foreach ($lowongan->pelamar as $key => $pelamar) {

            $arr_y = [];

            foreach ($pelamar->nilai_alternatif as $key => $alternatif) {

                $kriteria = optional($alternatif->bobot_kriteria)->kriteria;
                if ($kriteria && $kriteria->atribut_kriteria == 'benefit') {
                    $max = BobotKriteria::join('nilai_alternatif', 'nilai_alternatif.id_bobot_kriteria', 'bobot_kriteria.id')->where('id_kriteria', $alternatif->bobot_kriteria->id_kriteria)->max('jumlah_bobot');
                    $hitung = $alternatif->bobot_kriteria->jumlah_bobot / $max;
                } else {
                    $min = BobotKriteria::join('nilai_alternatif', 'nilai_alternatif.id_bobot_kriteria', 'bobot_kriteria.id')->where('id_kriteria', $alternatif->bobot_kriteria->id_kriteria)->min('jumlah_bobot');
                    $hitung = $min / $alternatif->bobot_kriteria->jumlah_bobot;
                }

                $y['nama_bobot_kriteria'] = $alternatif->bobot_kriteria->nama_bobot;
                $y['id_bobot_kriteria'] = $alternatif->bobot_kriteria->id;
                $y['id_alternatif'] = $alternatif->id;
                $y['hitung'] = $hitung;
                $y['normalisasi'] = $hitung * ($alternatif->bobot_kriteria->kriteria->bobot_preferensi / 100);

                $arr_y[] = $y;
            }

            foreach ($pelamar->hasil_tes as $key => $hasil_tes) {

                $kriteria = optional($hasil_tes->daftar_soal)->kriteria;
                if ($kriteria && $kriteria->atribut_kriteria == 'benefit') {
                    if ($hasil_tes->daftar_soal->kriteria->atribut_kriteria == 'benefit') {
                        $max = HasilTes::where('id_soal_tes', $hasil_tes->id_soal_tes)->where('id_lowongan', $id_lowongan)->max('bobot');

                        if ($max > 0) {
                            $hitung = $hasil_tes->bobot / $max;
                        } else {
                            $hitung = 0;
                        }
                    } else {
                        $max = HasilTes::where('id_soal_tes', $hasil_tes->id_soal_tes)->where('id_lowongan', $id_lowongan)->min('bobot');
                        $hitung = $min / $hasil_tes->bobot;
                    }

                    $bobot_kriteria = BobotKriteria::where('id_pelamar', $pelamar->id)->join('hasil_tes', 'hasil_tes.id_bobot_kriteria', 'bobot_kriteria.id')->first();

                    $y['nama_bobot_kriteria'] = $bobot_kriteria->nama_bobot;
                    $y['id_bobot_kriteria'] = $bobot_kriteria->id;
                    $y['id_alternatif'] = $alternatif->id;
                    $y['hitung'] = $hitung;
                    $y['normalisasi'] = $hitung * ($hasil_tes->daftar_soal->kriteria->bobot_preferensi / 100);

                    $arr_y[] = $y;
                }
            }

            $x['nama_pelamar'] = $pelamar->nama_pelamar;
            $x['id_pelamar'] = $pelamar->id;
            $x['status_dokumen'] = $pelamar->status_dokumen;
            $x['status'] = $pelamar->seleksi_dua;
            $x['total'] = $pelamar->nilai_tes;
            $x['data'] = $arr_y;
            $x['hasil_normalisasi'] = array_sum(array_column($arr_y, 'normalisasi'));

            $arr[] = $x;
        }
        // dd($arr);

        return $arr;
    }

    // public static function perangkingan($data)
    // {
    //     foreach($data as $dt){
    //         if($dt['status'] !== 'Ditolak'){
    //             $keys = array_column($dt, 'hasil_normalisasi');
    //             array_multisort($keys, SORT_DESC, $dt);
    //             return $dt;
    //         }
    //     }
    // }
    public static function perangkingan($data)
    {
        $sortedData = [];

        foreach ($data as $dt) {
            if ($dt['status'] !== 'Ditolak') {
                $sortedData[] = $dt;
            }
        }

        usort($sortedData, function ($a, $b) {
            return $b['hasil_normalisasi'] <=> $a['hasil_normalisasi'];
        });

        return $sortedData;
    }
}

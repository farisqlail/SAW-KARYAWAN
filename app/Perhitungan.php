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

                if ($alternatif->bobot_kriteria->kriteria->atribut_kriteria == 'benefit') {
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

                if ($hasil_tes->daftar_soal->kriteria->atribut_kriteria == 'benefit') {
                    $max = HasilTes::where('id_soal_tes', $hasil_tes->id_soal_tes)->where('id_lowongan', $id_lowongan)->max('nilai');
                    $hitung = $hasil_tes->nilai / $max;
                } else {
                    $max = HasilTes::where('id_soal_tes', $hasil_tes->id_soal_tes)->where('id_lowongan', $id_lowongan)->min('nilai');
                    $hitung = $min / $hasil_tes->nilai;
                }

                $bobot_kriteria = BobotKriteria::join('hasil_tes','hasil_tes.id_bobot_kriteria','bobot_kriteria.id')->first();

                $y['nama_bobot_kriteria'] = $bobot_kriteria->nama_bobot;
                $y['id_bobot_kriteria'] = $bobot_kriteria->id;
                $y['id_alternatif'] = $alternatif->id;
                $y['hitung'] = $hitung;
                $y['normalisasi'] = $hitung * ($hasil_tes->daftar_soal->kriteria->bobot_preferensi / 100);

                $arr_y[] = $y;

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

        return $arr;
    }

    public static function perangkingan($data)
    {
        $keys = array_column($data, 'hasil_normalisasi');
        array_multisort($keys, SORT_DESC, $data);
        return $data;
    }
}

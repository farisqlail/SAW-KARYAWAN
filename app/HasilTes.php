<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    protected $table        = 'hasil_tes';
    protected $primaryKey   = 'id';
    protected $guarded = [];
    // protected $fillable     = ['jawaban_tes','nilai_tes','id_soal_tes','id_pelamar', 'id_lowongan'];
    protected $hidden       = ['created_at', 'updated_at'];

    public function daftar_soal()
    {
        return $this->belongsTo(DaftarSoal::class, 'id_soal_tes', 'id');
    }

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'id_pelamar', 'id');
    }

    public function jawaban()
    {
        return $this->hasMany(JawabanPelamar::class, 'id_hasil_tes', 'id');
    }
    public function bobot_kriteria()
    {
        return $this->belongsTo(BobotKriteria::class, 'id_kriteria', 'id');
    }
}

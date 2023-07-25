<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarSoal extends Model
{
    protected $table        = 'daftar_soal';
    protected $primaryKey   = 'id';
    // protected $fillable     = ['soal','file_soal','bobot_soal','id', 'id'];
    protected $hidden       = ['created_at', 'updated_at'];

    public function jadwal_tes()
    {
        return $this->belongsTo(JadwalTes::class, 'id', 'id');
    }

    public function hasil_tes()
    {
        return $this->hasMany(HasilTes::class, 'id_soal_tes', 'id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id');
    }

    public function detail()
    {
        return $this->hasMany(DetailJawaban::class, 'id_daftar_soal', 'id');
    }
    public function bobot_kriteria()
    {
        return $this->belongsTo(BobotKriteria::class, 'id_kriteria', 'id');
    }
}

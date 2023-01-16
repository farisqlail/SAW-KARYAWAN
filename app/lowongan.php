<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lowongan extends Model
{
    protected $table        = 'lowongan';
    protected $primaryKey   = 'id';
    protected $fillable     = ['posisi_lowongan','berlaku_sampai','deskripsi_pekerjaan', 'deskripsi_persyaratan', 'status_approve'];
    protected $hidden       = ['created_at','updated_at'];

    public function pelamar() {
        return $this->hasMany(Pelamar::class,'id', 'id');
    }

    public function kriteria() {
        return $this->hasMany(Kriteria::class,'id', 'id');
    }
    
    public function jadwal_tes() {
        return $this->hasMany(JadwalTes::class,'id', 'id');
    }

    public function nilaiAlternatif() {
        return $this->hasMany(NilaiAlternatif::class,'id', 'id');
    }
}

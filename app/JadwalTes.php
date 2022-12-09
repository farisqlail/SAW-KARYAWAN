<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalTes extends Model
{
    protected $table        = 'jadwal_tes';
    protected $primaryKey   = 'id';
    protected $fillable     = ['tanggal','durasi_tes','id'];
    protected $hidden       = ['created_at','updated_at'];

    public function lowongan() {
        return $this->belongsTo(lowongan::class,'id', 'id');
    }
    
    public function soal_tes() {
        return $this->hasMany(DaftarSoal::class,'id', 'id');
    }

    public function pelamar(){

        return $this->belongsTo(Pelamar::class);
    }
}

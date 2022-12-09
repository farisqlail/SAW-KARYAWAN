<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalTes extends Model
{
    protected $table        = 'soal_tes';
    protected $primaryKey   = 'id_tes';
    protected $fillable     = ['id','id'];
    protected $hidden       = ['created_at','updated_at'];

    public function daftar_soal() {
        return $this->belongsTo(DaftarSoal::class,'id', 'id');
    }

    public function jadwal_tes() {
        return $this->belongsTo(JadwalTes::class,'id', 'id');
    }
    
    public function hasil_tes() {
        return $this->hasMany(HasilTes::class,'id_tes', 'id_tes');
    }
}

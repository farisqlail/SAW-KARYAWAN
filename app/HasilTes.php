<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    protected $table        = 'hasil_tes';
    protected $primaryKey   = 'id';
    protected $fillable     = ['jawaban_tes','nilai_tes','id_tes','id'];
    protected $hidden       = ['created_at','updated_at'];

    public function daftar_soal() {
        return $this->belongsTo(DaftarSoal::class,'id_tes', 'id');
    }
    
    public function pelamar() {
        return $this->belongsTo(Pelamar::class,'id', 'id');
    }
   
}

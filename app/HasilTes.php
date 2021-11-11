<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    protected $table        = 'hasil_tes';
    protected $primaryKey   = 'id_hasil';
    protected $fillable     = ['jawaban_tes','nilai_tes','id_soal_tes','id_pelamar'];
    protected $hidden       = ['created_at','updated_at'];

    public function soal_tes() {
        return $this->belongsTo(JadwalTes::class,'id_jadwal_tes', 'id_jadwal_tes');
    }
    
    public function pelamar() {
        return $this->belongsTo(Pelamar::class,'id_pelamar', 'id_pelamar');
    }
   
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarSoal extends Model
{
    protected $table        = 'daftar_soal';
    protected $primaryKey   = 'id_soal';
    protected $fillable     = ['soal','file_soal','bobot_soal','id_jadwal_tes'];
    protected $hidden       = ['created_at','updated_at'];
    
    public function jadwal_tes() {
        return $this->belongsTo(JadwalTes::class,'id_jadwal_tes', 'id_jadwal_tes');
    }
    
    public function hasil_tes() {
        return $this->hasMany(HasilTes::class,'id_soal', 'id_soal');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarSoal extends Model
{
    protected $table        = 'daftar_soal';
    protected $primaryKey   = 'id';
    protected $fillable     = ['soal','file_soal','bobot_soal','id', 'id'];
    protected $hidden       = ['created_at','updated_at'];
    
    public function jadwal_tes() {
        return $this->belongsTo(JadwalTes::class,'id', 'id');
    }
    
    public function hasil_tes() {
        return $this->hasOne(HasilTes::class,'id', 'id');
    }
    
}

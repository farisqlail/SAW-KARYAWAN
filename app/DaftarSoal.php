<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarSoal extends Model
{
    protected $table        = 'daftar_soal';
    protected $primaryKey   = 'id_soal';
    protected $fillable     = ['soal','file_soal','bobot_soal'];
    protected $hidden       = ['created_at','updated_at'];
    
    public function hasil_tes() {
        return $this->hasMany(HasilTes::class,'id_soal', 'id_soal');
    }
}

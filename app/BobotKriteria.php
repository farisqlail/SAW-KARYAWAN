<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    protected $table        = 'bobot_kriteria';
    protected $primaryKey   = 'id';
    protected $fillable     = ['nama_bobot','jumlah_bobot','id'];
    protected $hidden       = ['created_at','updated_at'];

    public function kriteria() {
        return $this->belongsTo(Kriteria::class,'id', 'id');
    }

    public function pelamar() {
        return $this->belongsToMany(Pelamar::class, 'nilai_alternatif','id', 'id');
    }
    
    public function nilai_alternatif() {
        return $this->hasMany(NilaiAlternatif::class,'id', 'id');
    }

    public function pelamar2(){

        return $this->belongsTo(Pelamar::class, 'id', 'id');
    }
}

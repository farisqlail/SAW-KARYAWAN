<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table        = 'kriteria';
    protected $primaryKey   = 'id';
    protected $fillable     = ['nama_kriteria','atribut_kriteria','bobot_preferensi','id'];
    protected $hidden       = ['created_at','updated_at'];

    public function lowongan() {
        return $this->belongsTo(lowongan::class,'id', 'id');
    }

    public function bobot_kriteria() {
        return $this->hasMany(BobotKriteria::class,'id_kriteria', 'id');
    }

    public function pelamar() {
        return $this->belongsTo(Pelamar::class,'id', 'id');
    }
}

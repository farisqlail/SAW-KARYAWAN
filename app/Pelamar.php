<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $table        = 'pelamar';
    protected $primaryKey   = 'id_pelamar';
    protected $fillable     = [
        'nama_pelamar',
        'tanggal_lahir',
        'no_telepon',
        'jenis_kelamin',
        'cv',
        'ijazah',
        'pas_foto',
        'status_lamaran',
        'id_kriteria',
        'id_user',
        'id_lowongan'
    ];
    protected $hidden       = ['created_at','updated_at'];

    public function user() {
        return $this->belongsTo(User::class,'id_user', 'id');
    }

    public function lowongan() {
        return $this->belongsTo(lowongan::class,'id_lowongan', 'id_lowongan');
    }

    public function nilai_alternatif() {
        return $this->hasMany(NilaiAlternatif::class,'id_pelamar', 'id_pelamar');
    }
    
    public function hasil_tes() {
        return $this->hasMany(HasilTes::class,'id_pelamar', 'id_pelamar');
    }

    public function kriteria() {
        return $this->hasMany(Kriteria::class,'id_lowongan', 'id_lowongan');
    }
}

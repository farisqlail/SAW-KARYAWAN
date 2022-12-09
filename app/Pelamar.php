<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $table        = 'pelamar';
    protected $primaryKey   = 'id';
    protected $fillable     = [
        'nama_pelamar',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'alamat',
        'no_telepon',
        'jenis_kelamin',
        'cv',
        'ijazah',
        'pas_foto',
        'seleksi_satu',
        'seleksi_dua',
        'id_user',
        'id'
    ];
    protected $hidden       = ['created_at','updated_at'];

    public function user() {
        return $this->belongsTo(User::class,'id_user', 'id');
    }

    public function lowongan() {
        return $this->belongsTo(lowongan::class,'id', 'id');
    }

    public function bobot()
    {
        return $this->belongsToMany(BobotKriteria::class,'nilai_alternatif','id','id');
    }

    public function nilai_alternatif() {
        return $this->hasMany(NilaiAlternatif::class,'id', 'id');
    }
    
    public function hasil_tes() {
        return $this->hasMany(HasilTes::class,'id', 'id');
    }

    public function kriteria() {
        return $this->hasMany(Kriteria::class,'id', 'id');
    }

    public function bobot_kriteria() {
       return  $this->belongsToMany(BobotKriteria::class,'nilai_alternatif','id', 'id');
    }

    public function bobotKriteria(){
        return $this->hasMany(BobotKriteria::class, 'id', 'id');
    }

    public function jadwalTes(){

        return $this->hasMany(BobotKriteria::class, 'id');
    }
}

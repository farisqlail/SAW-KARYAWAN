<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanPelamar extends Model
{
    protected $table        = 'jawaban_pelamar';
    protected $primaryKey   = 'id';
    protected $fillable     = ['id_pelamar', 'id_detail_jawaban', 'nilai_jawaban'];
    protected $hidden       = ['created_at', 'updated_at'];

    public function hasiltes()
    {
        return $this->belongsTo(HasilTes::class,'id_hasil_tes','id');
    }

    public function detail_jawaban()
    {
        return $this->belongsTo(DetailJawaban::class,'id_detail_jawaban','id');
    }
}

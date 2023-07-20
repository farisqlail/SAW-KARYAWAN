<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanPelamar extends Model
{
    protected $table        = 'jawaban_pelamar';
    protected $primaryKey   = 'id';
    protected $fillable     = ['id_pelamar', 'id_detail_jawaban', 'nilai_jawaban'];
    protected $hidden       = ['created_at', 'updated_at'];
}

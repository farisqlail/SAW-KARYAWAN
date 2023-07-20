<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailJawaban extends Model
{
    protected $table        = 'detail_jawaban';
    protected $primaryKey   = 'id';
    protected $fillable     = ['id_daftar_soal', 'jawaban_a', 'jawaban_b', 'jawaban_c', 'jawaban_d', 'isTrue', 'urutan'];
    protected $hidden       = ['created_at', 'updated_at'];
}

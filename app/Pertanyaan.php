<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table        = 'pertanyaan';
    protected $primaryKey   = 'id';
    protected $fillable     = ['id_daftar_soal', 'soal'];
    protected $hidden       = ['created_at', 'updated_at'];
}

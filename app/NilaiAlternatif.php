<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    protected $table        = 'nilai_alternatif';
    protected $fillable     = ['id', 'id'];
    protected $hidden       = ['created_at', 'updated_at'];

    public function bobot_kriteria()
    {
        return $this->belongsTo(BobotKriteria::class, 'id_bobot_kriteria', 'id');
    }

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'id_pelamar', 'id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id', 'id');
    }
}

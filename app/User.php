<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'no_telepon',
        'jenis_kelamin',
        'alamat', 
        'password', 
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function pelamar() {
        return $this->hasMany(Pelamar::class,'id_user', 'id');
    }
}

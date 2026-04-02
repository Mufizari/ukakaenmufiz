<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $guard = 'mahasiswa';

    protected $fillable = [
        'nama',
        'nim',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
    }
}

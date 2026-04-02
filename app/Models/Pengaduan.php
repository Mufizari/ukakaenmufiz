<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'judul',
        'isi_aduan',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }
}
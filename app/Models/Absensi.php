<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi
    protected $fillable = ['siswa_id', 'status'];

    // Relasi ke model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    // use HasFactory;

    // Nama tabel yang terkait dengan model
    protected $table = 'dosens';

    // Kolom yang dapat diisi 
    protected $fillable = [
        'kode_dosen',
        'nama_dosen',
        'nip',
        'email',
        'no_telepon',
    ];

    // Relasi One-to-Many, jadi 1 dosen bisa memiliki lebih dari 1 mahasiswa
    public function mahasiswas() {
        return $this->hasMany(Mahasiswa::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //use HasFactory;

    // Nama tabel yang terkait dengan model
    protected $table = 'mahasiswas';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nim',
        'nama_mahasiswa', 
        'email',
        'jurusan',
        'dosen_id'
    ];

    // Relasi Many-to-One, jadi banyak mahasiswa hanya memiliki satu dosen 
    public function dosen() {
        return $this->belongsTo(Dosen::class);
    }
}

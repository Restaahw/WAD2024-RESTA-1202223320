<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Menampilkan semua data Mahasiswa
    public function index()
    {
        $dosens = Dosen::all();
        $mahasiswas = Mahasiswa::all();
        $nav = 'Data Mahasiswa';

        return view('mahasiswa.index', compact('mahasiswas', 'nav', 'dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */

    // Form Tambah Data
    public function create()
    {
        $nav = 'Tambah Mahasiswa'; 
        $dosens = Dosen::all();
        return view('mahasiswa.create', compact('nav', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // Menyimpan Data Baru
    public function store(Request $request) {

    $validasiData = $request->validate([
        'nim' => 'required|string|unique:mahasiswas,nim',
        'nama_mahasiswa' => 'required|string',
        'email' => 'required|string|email|max:100|unique:mahasiswas,email',
        'jurusan' => 'required|string',
        'dosen_id' => 'required|integer|exists:dosens,id',
    ]);

    Mahasiswa::create($validasiData);
    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambahkan!');
    }



    /**
     * Display the specified resource.
     */

    // Menampilkan detail spesifik Mahasiswa
    public function show(Mahasiswa $mahasiswa)
    {
        $dosen = $mahasiswa->dosen;
        $kode_dosen = $dosen ? $dosen->kode_dosen : null;
        $nav = 'Detail Mahasiswa' . $mahasiswa->nama_mahasiswa;
        return view('mahasiswa.show', compact('mahasiswa', 'nav','kode_dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    // Menampilkan Form Edit Mahasiswa
    public function edit(Mahasiswa $mahasiswa)
    {
        $dosens = Dosen::all();
        $nav = 'Edit Mahasiswa'. $mahasiswa->nama;
        return view('mahasiswa.edit', compact('mahasiswa', 'nav', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */

    // Form Update Mahasiswa
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
    $validasiData = $request->validate([ 
        'nim' => 'required|string|unique:mahasiswas,nim,' . $mahasiswa->id,
        'nama_mahasiswa' => 'required|string',
        'email' => 'required|string|email|max:100|unique:mahasiswas,email,' . $mahasiswa->id,
        'jurusan' => 'required|string',
        'dosen_id' => 'required|integer|exists:dosens,id',
    ]);

    $mahasiswa->update($validasiData);
    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */

    //Fungsi menghapus data Mahasiswa
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus!');
    }
}

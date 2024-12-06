<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Menampilkan semua data Dosen
    public function index()
    {
        $dosens = Dosen::all();
        $nav = 'Data Dosen';

        return view('dosen.index', compact('dosens', 'nav'));
    }

    /**
     * Show the form for creating a new resource.
     */

    // Form Tambah Data
    public function create()
    {
        $nav = 'Tambah Dosen'; 
        return view('dosen.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // Menyimpan Data Baru
    public function store(Request $request)
{
    // Validasi inputan dari form
    $validasiData = $request->validate([
        'kode_dosen' => 'required|string|max:3|unique:dosens,kode_dosen', // Maksimal 3 karakter dan harus unik
        'nama_dosen' => 'required|string|max:255', // Nama dosen, maksimal 255 karakter
        'nip' => 'required|string|unique:dosens,nip|max:20', // NIP harus unik dan maksimal 20 karakter
        'email' => 'required|email|unique:dosens,email|max:255', // Email harus valid, unik, dan maksimal 255 karakter
        'no_telepon' => 'nullable|string|max:15', // Nomor telepon opsional dan maksimal 15 karakter
    ]);

    // Menyimpan data dosen ke database
    Dosen::create($validasiData);

    // Redirect ke halaman daftar dosen dengan pesan sukses
    return redirect()->route('dosen.index')->with('success', 'Data Dosen Berhasil Ditambahkan!');
}


    /**
     * Display the specified resource.
     */

    // Menampilkan detail spesifik Dosen
    public function show(Dosen $dosen)
    {
        $nav = 'Detail Dosen' . $dosen->nama_dosen;
        return view('dosen.show', compact('dosen', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    // Menampilkan Form Edit Dosen
    public function edit(Dosen $dosen)
    {
        $nav = 'Edit Dosen'. $dosen->nama;
        return view('dosen.edit', compact('dosen', 'nav'));
    }

    /**
     * Update the specified resource in storage.
     */

    // Form Update Dosen
    public function update(Request $request, Dosen $dosen)
{
    // Validasi inputan dari form
    $validasiData = $request->validate([
        'kode_dosen' => 'required|string|max:3|unique:dosens,kode_dosen,' . $dosen->id, 
        'nama_dosen' => 'required|string|max:255', 
        'nip' => 'required|string|max:20|unique:dosens,nip,' . $dosen->id,
        'email' => 'required|email|max:255|unique:dosens,email,' . $dosen->id,
        'no_telepon' => 'nullable|string|max:15', 
    ]);

    // Update data dosen
    $dosen->update($validasiData);

    // Redirect ke halaman daftar dosen dengan pesan sukses
    return redirect()->route('dosen.index')->with('success', 'Data Dosen Berhasil Diupdate!');
}


    /**
     * Remove the specified resource from storage.
     */

    //Fungsi menghapus data Dosen
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus!');
    }
}

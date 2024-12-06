<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahDosen = \App\Models\Dosen::count();
        $jumlahMahasiswa = \App\Models\Mahasiswa::count();

        return view('dashboard.index', compact('jumlahDosen', 'jumlahMahasiswa'));
    }
}
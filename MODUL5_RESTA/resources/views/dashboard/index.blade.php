{{-- resources/views/dashboard/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Welcome to Dashboard</h1>

    <div class="row">
        <!-- Total Dosen Card -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Total Dosen</h4>
                    <i class="bi bi-person-fill" style="font-size: 24px;"></i>
                </div>
                <div class="card-body">
                    <h3 class="display-4 text-center">{{ $jumlahDosen }}</h3>
                    <p class="text-center">Jumlah dosen yang terdaftar di Sistem Manajemen Data</p>
                </div>
            </div>
        </div>

        <!-- Total Mahasiswa Card -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Total Mahasiswa</h4>
                    <i class="bi bi-person-badge-fill" style="font-size: 24px;"></i>
                </div>
                <div class="card-body">
                    <h3 class="display-4 text-center">{{ $jumlahMahasiswa }}</h3>
                    <p class="text-center">Jumlah mahasiswa yang terdaftar di Sistem Manajemen Data</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

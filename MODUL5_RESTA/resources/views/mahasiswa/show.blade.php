@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1>Detail Mahasiswa</h1>
    <form action="{{ isset($mahasiswa) ? route('mahasiswa.update', $mahasiswa->id) : route('mahasiswa.store') }}" method="POST">
        @csrf
        @if(isset($mahasiswa))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim ?? old('nim') }}" maxlength="3" disabled>
        </div>

        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa ?? old('nama_mahasiswa') }}" disabled>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $mahasiswa->email ?? old('email') }}" disabled>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Jurusan</label>
            <input type="email" class="form-control" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan ?? old('jurusan') }}" disabled>
        </div>

        <div class="mb-3">
            <label for="kode_dosen" class="form-label">Kode Dosen</label>
            <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" value="{{ $kode_dosen }}" disabled>
        </div>

        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
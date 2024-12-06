@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Dosen</h1>
    <form action="{{ isset($dosen) ? route('dosen.update', $dosen->id) : route('dosen.store') }}" method="POST">
        @csrf
        @if(isset($dosen))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="kode_dosen" class="form-label">Kode Dosen</label>
            <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" value="{{ $dosen->kode_dosen ?? old('kode_dosen') }}" maxlength="3" required>
        </div>

        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{ $dosen->nama_dosen ?? old('nama_dosen') }}" required>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ $dosen->nip ?? old('nip') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $dosen->email ?? old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $dosen->no_telepon ?? old('no_telepon') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ isset($mahasiswa) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' }}</h1>
    <form action="{{ isset($mahasiswa) ? route('mahasiswa.update', $mahasiswa->id) : route('mahasiswa.store') }}" method="POST">
        @csrf
        @if(isset($mahasiswa))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim ?? old('nim') }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa ?? old('nama_mahasiswa') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email ?? old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan ?? old('jurusan') }}" required>
        </div>

        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen</label>
            <select class="form-control" id="dosen_id" name="dosen_id" required>
                <option value="">Pilih Dosen</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}" 
                        @if(isset($mahasiswa) && $mahasiswa->dosen_id == $dosen->id) selected @endif>
                        {{ $dosen->nama_dosen }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Siswa</h1>
    <form action="{{ route('siswa.update', $siswa) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}" required>
        </div>
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis" class="form-control" value="{{ $siswa->nis }}" required>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas" class="form-control" required>
                <option value="X" {{ $siswa->kelas == 'X' ? 'selected' : '' }}>X</option>
                <option value="XI" {{ $siswa->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                <option value="XII" {{ $siswa->kelas == 'XII' ? 'selected' : '' }}>XII</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan" class="form-control" required>
                <option value="TKR" {{ $siswa->jurusan == 'TKR' ? 'selected' : '' }}>TKR</option>
                <option value="RPL" {{ $siswa->jurusan == 'RPL' ? 'selected' : '' }}>RPL</option>
                <option value="MB" {{ $siswa->jurusan == 'MB' ? 'selected' : '' }}>MB</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning mt-2">Simpan Perubahan</button>
    </form>
</div>
@endsection
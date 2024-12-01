@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Siswa</h1>
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas" class="form-control" required>
                <option value="" disabled selected>Pilih Kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan" class="form-control" required>
                <option value="" disabled selected>Pilih Jurusan</option>
                <option value="TKR">TKR</option>
                <option value="RPL">RPL</option>
                <option value="MB">MB</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
</div>
@endsection
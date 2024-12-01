@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Daftar Siswa</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Siswa
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Menambahkan table-responsive untuk responsivitas -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->kelas }}</td>
                        <td>{{ $siswa->jurusan }}</td>
                        <td class="text-center">
                            <a href="{{ route('siswa.edit', $siswa) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('siswa.destroy', $siswa) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus siswa ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
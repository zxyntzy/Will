@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Data Absensi</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('absensi.exportCSV') }}" class="btn btn-success">
        <i class="fas fa-download"></i> Export ke CSV
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
                    <th>Nama Siswa</th>
                    <th>Status Absensi</th>
                    <th>Tanggal Absensi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($absensiData as $key => $absensi)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $absensi->siswa->nama }}</td>
                        <td>{{ $absensi->status }}</td>
                        <td>{{ $absensi->created_at->format('d-m-Y H:i') }}</td>
                        <td class="text-center">
                            <!-- Tombol Hapus -->
                            <form action="{{ route('absensi.destroy', $absensi) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus absensi ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data absensi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
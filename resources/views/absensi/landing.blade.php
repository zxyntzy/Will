<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f8fc;
        }
        .card {
            border-radius: 15px;
        }
        .btn-custom {
            background-color: #6c63ff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #5a53e1;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Form Absensi</h3>
                    </div>
                    <div class="card-body">
                        @if($isAbsent)
                            <p class="text-center">Anda sudah melakukan absensi hari ini.</p>
                        @else
                            <form action="{{ route('absensi.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="siswa_id" class="form-label">Pilih Siswa</label>
                                    <select name="siswa_id" id="siswa_id" class="form-select" required>
                                        <option value="">-- Pilih Siswa --</option>
                                        @foreach($siswas as $siswa)
                                            <option value="{{ $siswa->id }}">{{ $siswa->nama }} - {{ $siswa->kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status Absensi</label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Alpa">Alpa</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-custom w-100">Kirim Absensi</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
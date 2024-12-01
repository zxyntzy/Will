<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class AbsensiController extends Controller
{
    // Menampilkan halaman absensi
    public function index()
    {
        // Ambil semua data siswa
        $siswas = Siswa::all();

        // Cek apakah siswa sudah absen hari ini
        $isAbsent = Absensi::where('siswa_id', Auth::id())
                           ->whereDate('created_at', today())
                           ->exists();

        // Kirim data siswa dan status absensi ke view
        return view('absensi.landing', compact('siswas', 'isAbsent'));
    }

    // Menyimpan absensi
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'status' => 'required|in:Hadir,Izin,Alpa',
        ]);

        // Cek apakah siswa sudah absen hari ini
        $isAbsent = Absensi::where('siswa_id', $request->siswa_id)
                           ->whereDate('created_at', today())
                           ->exists();

        if ($isAbsent) {
            return redirect()->route('absensi.index')->with('error', 'Anda sudah absen hari ini.');
        }

        // Simpan absensi ke tabel absensi
        Absensi::create([
            'siswa_id' => $request->siswa_id,
            'status' => $request->status,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil.');
    }
    
    // Menampilkan data absensi yang sudah ada
    public function showData()
    {
        // Ambil semua data absensi dengan relasi siswa
        $absensiData = Absensi::with('siswa')->get();

        return view('absensi.data', compact('absensiData'));
    }
    public function destroy(Absensi $absensi)
{
    // Menghapus absensi berdasarkan ID
    $absensi->delete();

    // Redirect ke halaman data absensi dengan pesan sukses
    return redirect()->route('absensi.data')->with('success', 'Absensi berhasil dihapus.');
}
public function exportCSV()
{
    $absensiData = Absensi::with('siswa')->get();  // Ambil data absensi beserta data siswa

    $csvHeader = ['No', 'Nama Siswa', 'Status Absensi', 'Tanggal Absensi'];
    $csvData = [];
    
    foreach ($absensiData as $key => $absensi) {
        $csvData[] = [
            $key + 1,
            $absensi->siswa->nama,
            $absensi->status,
            $absensi->created_at->format('d-m-Y H:i'),
        ];
    }

    // Menggunakan stream untuk output CSV
    $callback = function () use ($csvHeader, $csvData) {
        $csvFile = fopen('php://output', 'w');
        fputcsv($csvFile, $csvHeader);  // Menulis header CSV
        foreach ($csvData as $row) {
            fputcsv($csvFile, $row);  // Menulis data baris
        }
        fclose($csvFile);  // Menutup file CSV
    };

    return response()->stream($callback, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="absensi.csv"',
    ]);
}


}
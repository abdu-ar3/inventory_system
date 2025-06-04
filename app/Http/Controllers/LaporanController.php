<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use PDF;  // Untuk ekspor PDF

class LaporanController extends Controller
{
    // app/Http/Controllers/LaporanController.php

    public function summary(Request $request)
    {
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');

        // Ambil semua barang yang ada
        $barang = Barang::all();

        $laporan = [];

        foreach ($barang as $item) {
            // Total barang masuk dalam rentang tanggal
            $barangMasuk = BarangMasuk::where('barang_id', $item->id)
                ->whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])
                ->sum('jumlah');

            // Total barang keluar dalam rentang tanggal
            $barangKeluar = BarangKeluar::where('barang_id', $item->id)
                ->whereBetween('tanggal_keluar', [$tanggal_awal, $tanggal_akhir])
                ->sum('jumlah');

            // Hitung jumlah saat ini
            $jumlahSaatIni = $barangMasuk - $barangKeluar;

            // Ambil tanggal masuk terakhir (bukan max() yang menyebabkan error)
            $tanggalMasukTerakhir = BarangMasuk::where('barang_id', $item->id)
                ->whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])
                ->orderBy('tanggal_masuk', 'desc')
                ->first();

            // Ambil tanggal keluar terakhir
            $tanggalKeluarTerakhir = BarangKeluar::where('barang_id', $item->id)
                ->whereBetween('tanggal_keluar', [$tanggal_awal, $tanggal_akhir])
                ->orderBy('tanggal_keluar', 'desc')
                ->first();

            // Simpan data laporan
            $laporan[] = [
                'barang' => $item->nama_barang,
                'jumlah_saat_ini' => $jumlahSaatIni,
                'tanggal_masuk' => $tanggalMasukTerakhir ? $tanggalMasukTerakhir->tanggal_masuk : null,  // Ambil tanggal masuk terakhir
                'tanggal_keluar' => $tanggalKeluarTerakhir ? $tanggalKeluarTerakhir->tanggal_keluar : null, // Ambil tanggal keluar terakhir
            ];
        }

        // Return view laporan
        return view('laporan.summary', compact('laporan', 'tanggal_awal', 'tanggal_akhir'));
    }


    // app/Http/Controllers/LaporanController.php

    public function exportToPdf(Request $request)
    {
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');

        // Ambil semua barang yang ada
        $barang = Barang::all();
        $laporan = [];

        foreach ($barang as $item) {
            // Total barang masuk dalam rentang tanggal
            $barangMasuk = BarangMasuk::where('barang_id', $item->id)
                ->whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])
                ->sum('jumlah');

            // Total barang keluar dalam rentang tanggal
            $barangKeluar = BarangKeluar::where('barang_id', $item->id)
                ->whereBetween('tanggal_keluar', [$tanggal_awal, $tanggal_akhir])
                ->sum('jumlah');

            // Hitung jumlah saat ini
            $jumlahSaatIni = $barangMasuk - $barangKeluar;

            // Ambil tanggal masuk terakhir
            $tanggalMasukTerakhir = BarangMasuk::where('barang_id', $item->id)
                ->whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])
                ->orderBy('tanggal_masuk', 'desc')
                ->first();  // Ambil tanggal masuk terakhir yang valid

            // Ambil tanggal keluar terakhir
            $tanggalKeluarTerakhir = BarangKeluar::where('barang_id', $item->id)
                ->whereBetween('tanggal_keluar', [$tanggal_awal, $tanggal_akhir])
                ->orderBy('tanggal_keluar', 'desc')
                ->first();  // Ambil tanggal keluar terakhir yang valid

            // Simpan data laporan
            $laporan[] = [
                'barang' => $item->nama_barang,
                'jumlah_saat_ini' => $jumlahSaatIni,
                'tanggal_masuk' => $tanggalMasukTerakhir ? $tanggalMasukTerakhir->tanggal_masuk : null,  // Ambil tanggal masuk terakhir
                'tanggal_keluar' => $tanggalKeluarTerakhir ? $tanggalKeluarTerakhir->tanggal_keluar : null, // Ambil tanggal keluar terakhir
            ];
        }

        // Load view untuk PDF
        $pdf = FacadePdf::loadView('laporan.summary_pdf', compact('laporan', 'tanggal_awal', 'tanggal_akhir'));
        return $pdf->download('laporan_summary.pdf');
    }

}


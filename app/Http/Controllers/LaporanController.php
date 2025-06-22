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
        $barangId = $request->input('barang_id');
        $barang = $barangId
            ? Barang::where('id', $barangId)->get()
            : Barang::all();
        $semuaBarang = Barang::all();    

        $laporan = [];

        foreach ($barang as $item) {
            // Total barang masuk dalam rentang tanggal
            $jumlahMasuk = BarangMasuk::where('barang_id', $item->id)
                ->whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])
                ->sum('jumlah');

            // Total barang keluar dalam rentang tanggal
            $jumlahKeluar = BarangKeluar::where('barang_id', $item->id)
                ->whereBetween('tanggal_keluar', [$tanggal_awal, $tanggal_akhir])
                ->sum('jumlah');

            // Hitung jumlah saat ini
            $jumlahSaatIni = $jumlahMasuk - $jumlahKeluar;

            // Ambil tanggal masuk terakhir
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
                'kode' => $item->kode_barang,
                'barang' => $item->nama_barang,
                'jumlah_masuk' => $jumlahMasuk,
                'jumlah_keluar' => $jumlahKeluar,
                'jumlah_saat_ini' => $jumlahSaatIni,
                'tanggal_masuk' => $tanggalMasukTerakhir ? $tanggalMasukTerakhir->tanggal_masuk : null,
                'tanggal_keluar' => $tanggalKeluarTerakhir ? $tanggalKeluarTerakhir->tanggal_keluar : null,
            ];
        }

        return view('laporan.summary', compact('laporan', 'tanggal_awal', 'tanggal_akhir', 'semuaBarang'));
    }


    // app/Http/Controllers/LaporanController.php

   public function exportToPdf(Request $request)
    {
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');
        $barangId = $request->input('barang_id');

        // Ambil barang sesuai filter
        $barang = $barangId
            ? Barang::where('id', $barangId)->get()
            : Barang::all();

        $laporan = [];

        foreach ($barang as $item) {
            $jumlahMasuk = BarangMasuk::where('barang_id', $item->id)
                ->whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])
                ->sum('jumlah');

            $jumlahKeluar = BarangKeluar::where('barang_id', $item->id)
                ->whereBetween('tanggal_keluar', [$tanggal_awal, $tanggal_akhir])
                ->sum('jumlah');

            $jumlahSaatIni = $jumlahMasuk - $jumlahKeluar;

            $tanggalMasukTerakhir = BarangMasuk::where('barang_id', $item->id)
                ->whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])
                ->orderBy('tanggal_masuk', 'desc')
                ->first();

            $tanggalKeluarTerakhir = BarangKeluar::where('barang_id', $item->id)
                ->whereBetween('tanggal_keluar', [$tanggal_awal, $tanggal_akhir])
                ->orderBy('tanggal_keluar', 'desc')
                ->first();

            $laporan[] = [
                'kode' => $item->kode_barang,
                'barang' => $item->nama_barang,
                'jumlah_masuk' => $jumlahMasuk,
                'jumlah_keluar' => $jumlahKeluar,
                'jumlah_saat_ini' => $jumlahSaatIni,
                'tanggal_masuk' => $tanggalMasukTerakhir ? $tanggalMasukTerakhir->tanggal_masuk : null,
                'tanggal_keluar' => $tanggalKeluarTerakhir ? $tanggalKeluarTerakhir->tanggal_keluar : null,
            ];
        }

        $pdf = FacadePdf::loadView('laporan.summary_pdf', compact('laporan', 'tanggal_awal', 'tanggal_akhir'));
        return $pdf->download('laporan_summary.pdf');
    }



}


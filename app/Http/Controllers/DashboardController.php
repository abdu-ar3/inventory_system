<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        // Jumlah stok barang masuk
        $totalBarangMasuk = BarangMasuk::sum('jumlah');

        // Jumlah barang keluar
        $totalBarangKeluar = BarangKeluar::sum('jumlah');

        // Total supplier
        $totalSupplier = Supplier::count();

        // Total barang
        $totalBarang = Barang::count();

        // Kirim data ke view dashboard
        return view('dashboard.index', compact(
            'totalBarangMasuk',
            'totalBarangKeluar',
            'totalSupplier',
            'totalBarang'
        ));
    }
}


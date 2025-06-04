<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        // Mengambil semua barang keluar dan menghubungkannya dengan data barang
        $barangKeluar = BarangKeluar::with('barang')->get();
        return view('barang_keluar.index', compact('barangKeluar'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('barang_keluar.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer',
            'tanggal_keluar' => 'required|date',
            'tujuan' => 'required|string',
        ]);

        BarangKeluar::storeBarangKeluar($request->all());

        return redirect()->route('barang_keluar.index')->with('success', 'Barang berhasil dikurangi dari stok.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        // Menghapus barang keluar
        $barangKeluar->delete();
        return redirect()->route('barang_keluar.index')->with('success', 'Transaksi barang keluar berhasil dihapus');
    }
}


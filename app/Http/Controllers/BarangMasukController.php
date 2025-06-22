<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::with('barang', 'supplier')->get();
        return view('barang_masuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('barang_masuk.create', compact('barang', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer',
            'satuan' => 'required',
            'tanggal_masuk' => 'required|date',
            'supplier_id' => 'required|exists:supplier,id',
        ]);

        // Menggunakan model untuk menyimpan dan update stok
        BarangMasuk::storeBarangMasuk($request->all());

        return redirect()->route('barang_masuk.index')->with('success', 'Barang berhasil ditambahkan ke stok.');
        
    }
}

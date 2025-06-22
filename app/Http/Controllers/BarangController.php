<?php
// app/Http/Controllers/BarangController.php
namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $kategori = KategoriBarang::all();
        return view('barang.create', compact('kategori'));
    }

  public function store(Request $request)
{
     $data =    $request->validate([
        'kode_barang' => 'required|unique:barang',
        'nama_barang' => 'required',
        'kategori_id' => 'required|exists:kategori_barang,id',
        'satuan' => 'required',
        'stok' => 'required|integer',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);


    if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barangs', 'public');
        }

    Barang::create($data);

    return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
}


    public function edit(Barang $barang)
    {
        $kategori = KategoriBarang::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang,' . $barang->id,
            'nama_barang' => 'required',
            'kategori_id' => 'required|exists:kategori_barang,id',
            'satuan' => 'required',
            'stok' => 'required|integer',
        ]);

        if ($request->hasFile('gambar')) {
            if ($barang->gambar && Storage::disk('public')->exists($barang->gambar)) {
                Storage::disk('public')->delete($barang->gambar);
            }

                $gambar = $request->file('gambar')->store('barang', 'public');
                $validated['gambar'] = $gambar;
            }

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}

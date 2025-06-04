<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';

    protected $fillable = [
        'barang_id',
        'jumlah',
        'tanggal_masuk',
        'supplier_id',
        'keterangan',
    ];

    // Relasi ke barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // Relasi ke supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Menangani stok barang yang masuk
    public static function storeBarangMasuk($data)
    {
        // Membuat transaksi barang masuk
        $barangMasuk = self::create($data);

        // Mengupdate stok barang
        $barang = Barang::find($data['barang_id']);
        $barang->stok += $data['jumlah']; // Menambah stok
        $barang->save();
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';

    protected $fillable = [
        'barang_id',
        'jumlah',
        'tanggal_keluar',
        'tujuan',
        'keterangan',
    ];

    // Relasi ke barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // Mengurangi stok barang yang keluar
    public static function storeBarangKeluar($data)
    {
        // Membuat transaksi barang keluar
        $barangKeluar = self::create($data);

        // Mengupdate stok barang
        $barang = Barang::find($data['barang_id']);
        $barang->stok -= $data['jumlah']; // Mengurangi stok
        $barang->save();
    }
}

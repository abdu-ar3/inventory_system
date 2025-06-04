<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    
    protected $table = 'supplier';

    protected $fillable = [
        'nama_supplier',  // hanya kolom ini yang boleh diisi dengan mass assignment
        'alamat',
        'kontak',
    ];
}

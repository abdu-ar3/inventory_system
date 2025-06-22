<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->enum('satuan', ['karton', 'pcs'])->after('jumlah');
        });
    }

    public function down()
    {
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->dropColumn('satuan');
        });
    }

};

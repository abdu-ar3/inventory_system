@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Barang Keluar</h1>

    <form action="{{ route('barang_keluar.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="barang_id">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control">
                @foreach($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="satuan">Satuan</label>
            <select name="satuan" id="satuan" class="form-control" required>
                <option value="pcs">PCS</option>
                <option value="karton">Karton</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" name="tujuan" id="tujuan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan (Opsional)</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection

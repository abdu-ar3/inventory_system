<!-- resources/views/barang_masuk/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Barang Masuk</h1>

    <form action="{{ route('barang_masuk.store') }}" method="POST">
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
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-control">
                @foreach($supplier as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection

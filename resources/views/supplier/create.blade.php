@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Supplier</h1>

    <form action="{{ route('supplier.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_supplier">Nama Supplier</label>
            <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="text" name="kontak" id="kontak" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection

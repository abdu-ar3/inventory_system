@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Supplier</h1>

    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_supplier">Nama Supplier</label>
            <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $supplier->alamat) }}</textarea>
        </div>

        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="text" name="kontak" id="kontak" class="form-control" value="{{ old('kontak', $supplier->kontak) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection

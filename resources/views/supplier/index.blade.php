@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Supplier</h1>
    <a href="{{ route('supplier.create') }}" class="btn btn-primary">Tambah Supplier</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->nama_supplier }}</td>
                <td>{{ $supplier->alamat }}</td>
                <td>{{ $supplier->kontak }}</td>
                <td>
                    <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

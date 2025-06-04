@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Barang Masuk</h1>
    <a href="{{ route('barang_masuk.create') }}" class="btn btn-primary">Tambah Barang Masuk</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Masuk</th>
                <th>Supplier</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangMasuk as $item)
            <tr>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>{{ $item->supplier->nama_supplier }}</td>
                <td>
                    <form action="{{ route('barang_masuk.destroy', $item->id) }}" method="POST">
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

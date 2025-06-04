<!-- resources/views/barang_keluar/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Barang Keluar</h1>
    <a href="{{ route('barang_keluar.create') }}" class="btn btn-primary">Tambah Barang Keluar</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Keluar</th>
                <th>Tujuan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluar as $item)
            <tr>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->tanggal_keluar }}</td>
                <td>{{ $item->tujuan }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <form action="{{ route('barang_keluar.destroy', $item->id) }}" method="POST" style="display:inline;">
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

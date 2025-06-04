<!-- resources/views/laporan/summary.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Summary Barang Masuk dan Keluar</h1>

    <form action="{{ route('laporan.summary') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col">
                <label for="tanggal_awal">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="{{ old('tanggal_awal', $tanggal_awal) }}" required>
            </div>
            <div class="col">
                <label for="tanggal_akhir">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="{{ old('tanggal_akhir', $tanggal_akhir) }}" required>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mt-4">Tampilkan Laporan</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jumlah Saat Ini</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $item)
            <tr>
                <td>{{ $item['barang'] }}</td>
                <td>{{ $item['jumlah_saat_ini'] }}</td>
                <td>{{ $item['tanggal_masuk'] }}</td>
                <td>{{ $item['tanggal_keluar'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('laporan.summary.export', ['tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir]) }}" class="btn btn-success">Export to PDF</a>
</div>
@endsection

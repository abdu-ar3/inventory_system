<!-- resources/views/laporan/summary.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Summary Barang Masuk dan Keluar</h1>

    <form action="{{ route('laporan.summary') }}" method="GET" class="mb-4">
        <div class="row">
             <div class="col">
                <label for="barang_id">Pilih Barang</label>
                <select name="barang_id" id="barang_id" class="form-control">
                    <option value="">-- Semua Barang --</option>
                    @foreach($semuaBarang as $b)
                        <option value="{{ $b->id }}" {{ request('barang_id') == $b->id ? 'selected' : '' }}>
                            {{ $b->kode_barang }} - {{ $b->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </div>
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

    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Barang</th>
            <th>Jumlah Masuk</th>
            <th>Jumlah Keluar</th>
            <th>Jumlah Saat Ini</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laporan as $item)
        <tr>
            <td>{{ $item['kode'] }}</td>
            <td>{{ $item['barang'] }}</td>
            <td>{{ $item['jumlah_masuk'] }}</td>
            <td>{{ $item['jumlah_keluar'] }}</td>
            <td>{{ $item['jumlah_saat_ini'] }}</td>
            <td>{{ $item['tanggal_masuk'] ?? '-' }}</td>
            <td>{{ $item['tanggal_keluar'] ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('laporan.summary.export', [
        'tanggal_awal' => $tanggal_awal,
        'tanggal_akhir' => $tanggal_akhir,
        'barang_id' => request('barang_id')
    ]) }}" class="btn btn-success mt-2">
        Export to PDF
    </a>

</div>
@endsection

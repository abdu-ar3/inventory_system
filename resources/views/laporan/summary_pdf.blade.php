<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Summary</title>
</head>
<body>
    <h1>Laporan Summary Barang Masuk dan Keluar</h1>
    <p>Periode: {{ $tanggal_awal }} sampai {{ $tanggal_akhir }}</p>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
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
</body>
</html>

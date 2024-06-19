<!DOCTYPE html>
<html>
    <head>
        <style>
        body {
            box-sizing: border-box;
            font-size: 16px;
        }
        h1 {
            text-align: center;
        }
        table {
            box-sizing: border-box;
            border: 2px solid black;
            border-collapse: collapse;
            width: 100%;
        }
        thead {
            background-color: #0d47a1;
            color: white;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: left;
            padding: 10px;
        }
        .center {
            text-align: center;
        }
        </style>
    </head>
    <body>
    <center>
        <h3>laporan data pembelian</h3>
    </center>
    <table align="center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Nomor HP</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($transaction as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama}}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ optional($data->tbmenu)->menu }}</td>
            <td>{{ $data->jumlah }}</td>
            <td>Rp. {{ number_format($data->harga) }}</td>
            <td>{{ $data->no_hp }}</td>
            <td>{{ $data->updated_at }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
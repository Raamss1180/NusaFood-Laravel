<!DOCTYPE html>
<html>
    <head>
        <style>
            #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #1d528a;
            color: white;
            }
        </style>
    </head>
    <body>
    <center>
        <h3>laporan data pembelian</h3>
    </center>
    <table id="customers">
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
            <td>{{ $data->tbmenu->menu}}</td>
            <td>{{ $data->jumlah }}</td>
            <td>{{ number_format($transaction->harga) }}</td>
            <td>{{ $data->no_hp }}</td>
            <td>{{ $data->updated_at }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
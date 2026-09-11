<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .tersedia {
            color: green;
            font-weight: bold;
        }

        .habis {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Daftar Produk</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($produk as $index => $item)

                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>{{ $item['nama'] }}</td>

                    <td>{{ $item['kategori'] }}</td>

                    <td>
                        Rp {{ number_format($item['harga'], 0, ',', '.') }}
                    </td>

                    <td>{{ $item['stok'] }}</td>

                    <td>
                        @if ($item['stok'] > 0)
                            <span class="tersedia">
                                Tersedia
                            </span>
                        @else
                            <span class="habis">
                                Habis
                            </span>
                        @endif
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

</div>

</body>
</html>
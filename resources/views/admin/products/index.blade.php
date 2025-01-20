@extends('admin.navbar')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container">
        <h1 class="page-title"><i class="fas fa-boxes"></i> Daftar Produk</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Produk</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->kategori }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>{{ $product->location->nama ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info"><i class="fas fa-eye"></i> Lihat Detail</a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tombol Back di bawah tabel -->
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-back">Kembali</a>
    </div>

    <style>
        /* Kontainer utama */
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 95%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Judul halaman */
        .page-title {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Tombol utama */
        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            font-weight: bold;
        }

        /* Tombol primer */
        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        /* Tombol info */
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        /* Tombol warning */
        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        /* Tombol danger */
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        /* Efek hover pada tombol */
        .btn:hover {
            opacity: 0.8;
        }

        /* Styling untuk tabel */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        /* Header tabel */
        .table th {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase;
        }

        /* Baris tabel ganjil dan genap */
        .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        /* Hover baris tabel */
        .table tr:hover {
            background-color: #e9ecef;
        }

        .table td {
            color: #333;
            font-size: 15px;
        }

        /* Tombol aksi di dalam tabel */
        .table .btn {
            font-size: 14px;
            padding: 8px 15px;
            margin: 0 5px;
        }

        /* Tombol kembali */
        .btn-back {
            font-size: 16px;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #6c757d;
            color: white;
            border-radius: 8px;
            margin-top: 20px;
            display: block;
            width: 97%;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }

            .table th, .table td {
                padding: 10px;
            }

            .btn-back {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
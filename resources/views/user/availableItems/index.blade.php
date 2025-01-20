@extends('user.navbar')

@section('title', 'Barang Tersedia')

@section('content')
<div class="available-items">
    <!-- Tombol Kembali -->
    <a href="{{ route('user.dashboard') }}" class="btn btn-back">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <!-- Judul Halaman -->
    <h1>Barang Tersedia</h1>

    <!-- Menampilkan Tabel jika ada barang -->
    @if ($products->isEmpty())
        <p>Tidak ada barang yang tersedia saat ini.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Spesifikasi</th>
                    <th>Stok</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->kategori }}</td>
                        <td>{{ $product->spesifikasi }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>{{ $product->location->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<style>
    .available-items {
        padding: 30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        font-size: 32px;
        color: #333;
        margin-bottom: 20px;
    }

    /* Tombol Kembali */
    .btn-back {
        float: left;
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #0056b3;
    }

    /* Tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 8px;
        overflow: hidden;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    /* Responsif */
    @media (max-width: 768px) {
        .table {
            font-size: 14px;
        }

        th, td {
            padding: 8px;
        }
    }
</style>

<!-- Include Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
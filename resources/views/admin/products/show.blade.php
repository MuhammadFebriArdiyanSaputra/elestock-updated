@extends('admin.navbar')

@section('title', 'Detail Produk')

@section('content')
    <div class="container">
        <h1 class="page-title"><i class="fas fa-info-circle"></i> Detail Produk</h1>
        <div class="product-details">
            <p><strong>ID Produk:</strong> {{ $product->id }}</p>
            <p><strong>Nama:</strong> {{ $product->nama }}</p>
            <p><strong>Kategori:</strong> {{ $product->kategori }}</p>
            <p><strong>Spesifikasi:</strong> {{ $product->spesifikasi }}</p>
            <p><strong>Stok:</strong> {{ $product->stok }}</p>
            <p><strong>Lokasi:</strong> {{ $product->location->nama ?? 'N/A' }}</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>

    <style>
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .page-title {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-details p {
            font-size: 16px;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-size: 16px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
@endsection
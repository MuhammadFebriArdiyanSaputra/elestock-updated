@extends('admin.navbar')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard">
    <h1>Selamat Datang, Admin!</h1>
    <p class="intro">Kelola situs web Anda dengan mudah dan efisien melalui dashboard ini.</p>
    
    <!-- Statistik Grid -->
    <div class="stats-grid">
        <div class="stat-box">
            <i class="fas fa-box-open stat-icon"></i>
            <h2>Produk</h2>
            <p>{{ $productCount }} Total Produk</p>
            <a href="{{ route('admin.products.index') }}">Lihat Produk</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-truck stat-icon"></i>
            <h2>Supplier</h2>
            <p>{{ $supplierCount }} Total Supplier</p>
            <a href="{{ route('admin.suppliers.index') }}">Lihat Supplier</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-map-marker-alt stat-icon"></i>
            <h2>Lokasi</h2>
            <p>{{ $locationCount }} Total Lokasi</p>
            <a href="{{ route('admin.locations.index') }}">Lihat Lokasi</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-tasks stat-icon"></i>
            <h2>Persetujuan Peminjaman</h2>
            <p>{{ $borrowRequestCount }} Pengajuan Peminjaman</p>
            <a href="{{ route('admin.borrowRequests.index') }}">Lihat Pengajuan</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-clipboard-check stat-icon"></i>
            <h2>Persetujuan Permintaan</h2>
            <p>{{ $requestItemCount }} Permintaan Barang</p>
            <a href="{{ route('admin.requestItems.index') }}">Lihat Permintaan</a>
        </div>
    </div>

    <!-- Aksi Cepat -->
    <div class="actions">
        <h2>Aksi Cepat</h2>
        <p>Gunakan tombol di bawah untuk melakukan aksi cepat seperti menambahkan produk, supplier, atau lokasi baru.</p>
        <div class="actions-grid">
            <a href="{{ route('admin.products.create') }}" class="action-button">
                <i class="fas fa-plus-circle"></i> Tambah Produk
            </a>
            <a href="{{ route('admin.suppliers.create') }}" class="action-button">
                <i class="fas fa-plus-circle"></i> Tambah Supplier
            </a>
            <a href="{{ route('admin.locations.create') }}" class="action-button">
                <i class="fas fa-plus-circle"></i> Tambah Lokasi
            </a>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .dashboard {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 30px;
        color: #333;
    }
    .intro {
        margin-bottom: 20px;
        color: #666;
        font-size: 20px; 
    }
    .stats-grid {
        display: flex;
        gap: 20px;
        margin-bottom: 40px;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .stat-box {
        flex: 1;
        min-width: 250px;
        padding: 30px;
        border-radius: 12px;
        text-align: center;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        
    }
    .stat-icon {
        font-size: 60px; 
        color: #007bff;
        margin-bottom: 20px;
    }
    .stat-box h2 {
        font-size: 26px; 
        margin-bottom: 10px;
        color: #333;
    }
    .stat-box p {
        font-size: 18px;
        color: #555;
    }
    .stat-box a {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        transition: color 0.3s ease;
    }
    .stat-box a:hover {
        color: #0056b3;
    }
    .actions {
        margin-top: 40px;
    }
    .actions-grid {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
    }
    .action-button {
        flex: 1;
        min-width: 180px;
        padding: 20px;
        text-align: center;
        border: none;
        border-radius: 8px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        font-size: 18px; 
    }
    .action-button:hover {
        background-color: #0056b3;
    }
    .action-button i {
        font-size: 24px;
    }
</style>

<!-- Include Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
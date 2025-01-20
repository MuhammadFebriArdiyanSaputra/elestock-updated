@extends('user.navbar')

@section('title', 'User Dashboard')

@section('content')
<div class="dashboard">
    <h1>Selamat Datang, {{ Session::get('user')['name'] }}!</h1>
    <p class="intro">Kelola permintaan dan peminjaman barang Anda dengan mudah dan efisien melalui dashboard ini.</p>

    <!-- Statistik Grid -->
    <div class="stats-grid">
        <div class="stat-box">
            <i class="fas fa-box-open stat-icon"></i>
            <h2>Barang Tersedia</h2>
            <p>{{ $availableItemsCount }} Total Barang</p>
            <a href="{{ route('user.availableItems.index') }}">Lihat Barang</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-truck stat-icon"></i>
            <h2>Pinjam Barang</h2>
            <p>{{ $borrowedItemsCount }} Total Barang Ingin Dipinjam</p>
            <a href="{{ route('user.borrowReqs.index') }}">Lihat Status Barang Pinjaman</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-map-marker-alt stat-icon"></i>
            <h2>Request Barang</h2>
            <p>{{ $requestItemCount }} Total Barang Diminta</p>
            <a href="{{ route('user.requestItems.index') }}">Lihat Barang yang Diminta</a>
        </div>
    </div>

    <!-- Aksi Cepat -->
    <div class="actions">
        <h2>Aksi Cepat</h2>
        <p>Gunakan tombol di bawah untuk melakukan aksi cepat seperti menambahkan permintaan atau peminjaman barang.</p>
        <div class="actions-grid">
            <a href="{{ route('user.borrowReqs.create') }}" class="action-button">
                <i class="fas fa-plus-circle"></i> Ajukan Perminjaman Barang
            </a>
            <a href="{{ route('user.requestItems.create') }}" class="action-button">
                <i class="fas fa-plus-circle"></i> Ajukan Permintaan Barang
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
        background-color: #f4f7fa;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .intro {
        margin-bottom: 20px;
        color: #666;
        font-size: 20px;
        text-align: center;
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
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease; /* hanya transisi bayangan */
    }
    .stat-box:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1); /* hanya menambah bayangan saat hover */
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
        text-align: center;
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

    /* Responsive Styling */
    @media (max-width: 768px) {
        .stats-grid {
            flex-direction: column;
            gap: 10px;
        }
        .action-button {
            min-width: 150px;
        }
    }
</style>

<!-- Include Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
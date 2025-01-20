@extends('admin.navbar')

@section('title', 'Daftar Pengajuan Peminjaman Barang')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Daftar Pengajuan Peminjaman Barang</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Alasan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($borrowRequests as $index => $request)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->product->nama }}</td>
                    <td>{{ $request->product->kategori }}</td>
                    <td>{{ $request->borrow_date }}</td>
                    <td>{{ $request->return_date }}</td>
                    <td>{{ $request->reason }}</td>
                    <td>
                        @if ($request->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif ($request->status == 'approved')
                            <span class="badge badge-success">Disetujui</span>
                        @elseif ($request->status == 'rejected')
                            <span class="badge badge-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        @if ($request->status == 'pending')
                            <form action="{{ route('admin.borrowRequests.approve', $request->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-success btn-sm" onclick="return confirm('Setujui pengajuan ini?')">Setujui</button>
                            </form>
                            <form action="{{ route('admin.borrowRequests.reject', $request->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tolak pengajuan ini?')">Tolak</button>
                            </form>
                        @else
                            Tidak ada aksi
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada pengajuan peminjaman barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tombol Kembali di bawah tabel -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-back">Kembali</a><br><br>
</div>

<style>
    /* Kontainer utama */
    .container {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Table styling */
    table.table {
        background-color: #ffffff;
        border-collapse: collapse;
        width: 100%;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
    }

    table.table thead th {
        background-color: #007bff;
        color: #ffffff;
        font-weight: bold;
        padding: 10px 15px;
        border: 1px solid #ddd;
        text-align: center;
    }

    table.table tbody td {
        padding: 10px 15px;
        border: 1px solid #ddd;
    }

    table.table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table.table tbody tr:hover {
        background-color: #f1f9ff;
        transition: background-color 0.3s ease;
    }

    /* Badge styling */
    .badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 500;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .badge-success {
        background-color: #28a745;
        color: #ffffff;
    }

    .badge-danger {
        background-color: #dc3545;
        color: #ffffff;
    }

    /* Button styling */
    button.btn {
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button.btn-sm {
        font-size: 12px;
        padding: 5px 8px;
    }

    button.btn-success {
        background-color: #28a745;
        color: #ffffff;
    }

    button.btn-success:hover {
        background-color: #218838;
    }

    button.btn-danger {
        background-color: #dc3545;
        color: #ffffff;
    }

    button.btn-danger:hover {
        background-color: #c82333;
    }

    /* Alert styling */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        font-size: 14px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    /* Tombol kembali */
    .btn-back {
        font-size: 16px;
        padding: 12px 25px;
        text-decoration: none;
        background-color: #6c757d;
        color: white;
        border-radius: 8px;
        margin-top: 20px;
        display: block;
        text-align: center;
    }

    .btn-back:hover {
        background-color: #5a6268;
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        .btn-back {
            width: 100%;
        }
    }
</style>

<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@extends('user.navbar')

@section('title', 'Barang Pinjaman')

@section('content')
<div class="borrow-requests">
    <h1>Barang Pinjaman</h1>

    <div class="actions">
        <a href="{{ route('user.borrowReqs.create') }}" class="btn-create-request">
            <i class="fas fa-plus-circle"></i> Ajukan Barang Pinjaman
        </a>
    </div>

    @if ($borrowRequests->isEmpty())
        <p>Tidak ada barang pinjaman saat ini.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Alasan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowRequests as $index => $request)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $request->product->nama }}</td>
                        <td>{{ $request->product->kategori }}</td>
                        <td>{{ $request->borrow_date }}</td>
                        <td>{{ $request->return_date ?? 'Belum Dikembalikan' }}</td>
                        <td>{{ $request->reason }}</td>
                        <td>
                            @if ($request->status == 'pending')
                                <span class="badge badge-warning">Menunggu Validasi</span>
                            @elseif ($request->status == 'approved')
                                <span class="badge badge-success">Disetujui</span>
                            @elseif ($request->status == 'rejected')
                                <span class="badge badge-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br>

        <a href="{{ route('user.dashboard') }}" class="btn-back">Kembali</a><br>
    @endif
</div>

<style>
    .borrow-requests {
        padding: 30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .actions {
        margin-bottom: 20px;
        display: flex;
        justify-content: flex-end;
    }

    .btn-create-request {
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-create-request:hover {
        background-color: #218838;
    }

    .btn-back {
        display: inline-block;
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    tbody tr {
        background-color: #fff;
        transition: background-color 0.3s ease;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.9em;
        color: white;
    }

    .badge-warning {
        background-color: #ffc107;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-danger {
        background-color: #dc3545;
    }

    @media (max-width: 768px) {
        table {
            font-size: 14px;
        }

        th, td {
            padding: 10px;
        }

        .btn-create-request, .btn-back {
            font-size: 14px;
        }
    }
</style>
@endsection
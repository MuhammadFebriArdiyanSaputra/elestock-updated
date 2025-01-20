@extends('user.navbar')

@section('title', 'Permintaan Barang')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Permintaan Barang</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('user.requestItems.create') }}" class="btn btn-primary" style="float: right; margin-bottom: 10px; ">Buat Permintaan Barang</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Alasan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($requests as $index => $request)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $request->product->nama }}</td>
                    <td>{{ $request->alasan }}</td>
                    <td>
                        @if ($request->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif ($request->status == 'approved')
                            <span class="badge badge-success">Disetujui</span>
                        @elseif ($request->status == 'rejected')
                            <span class="badge badge-danger">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada permintaan barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table><br>
    <a href="{{ route('user.dashboard') }}" class="btn btn-primary" style="float: left; margin-bottom: 10px;">Back</a><br>
</div>

<style>
    .container {
        font-family: Arial, sans-serif;
        margin: 20px auto;
        max-width: 900px;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .alert {
        text-align: center;
        font-size: 16px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s;

    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table th {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #333;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        text-transform: capitalize;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #fff;
    }

    .badge-success {
        background-color: #28a745;
        color: #fff;
    }

    .badge-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .text-center {
        text-align: center;
    }
</style>

@endsection
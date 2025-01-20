@extends('admin.navbar')

@section('title', 'Permintaan Barang')

@section('content')
<div class="container mt-5">
    <h1>Permintaan Barang</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Nama Barang</th>
                <th>Alasan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $index => $request)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->product->nama }}</td>
                    <td>{{ $request->alasan }}</td>
                    <td>
                        @if($request->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif($request->status == 'approved')
                            <span class="badge badge-success">Disetujui</span>
                        @elseif($request->status == 'rejected')
                            <span class="badge badge-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        @if($request->status == 'pending')
                            <form action="{{ route('admin.requestItems.approve', $request->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>
                            <form action="{{ route('admin.requestItems.reject', $request->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Sudah Diproses</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div><br>
<a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-back" >Kembali</a><br><br>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0
    }

    .container {
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #343a40;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .table thead {
        background-color: #007bff;
        color: white;
    }

    .table th, .table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #dee2e6;
    }

    .table th {
        font-weight: bold;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
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

    .btn {
        padding: 8px 12px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
    }

    .btn-sm {
        font-size: 12px;
        padding: 6px 10px;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

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

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .alert-success a {
        color: #0b2e13;
        text-decoration: none;
        font-weight: bold;
    }

    .alert-success a:hover {
        text-decoration: underline;
    }
</style>

@endsection
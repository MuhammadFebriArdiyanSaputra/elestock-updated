@extends('admin.navbar')

@section('title', 'Daftar Supplier')

@section('content')
    <div class="container">
        <h1 class="page-title"><i class="fas fa-truck"></i> Daftar Supplier</h1>
        <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Supplier</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->nama }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>
                            <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus supplier ini?')"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

            <!-- Tombol Kembali -->
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-back">Back</a><br>
    </div>

    <style>
        .container {
            margin: 20px auto;
            padding: 30px;
            max-width: 90%;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            margin-bottom: 20px;
            font-size: 32px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 12px;
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

        .btn-primary {
            background-color: #28a745;
            color: white;
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            font-size: 14px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 14px 20px;
            text-align: left;
        }

        .table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        .table td {
            vertical-align: middle;
        }

        /* Styling for the Back button */
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
            background-color: #0056b3;
        }

        /* Responsive styling */
        @media (max-width: 768px) {

            .table th, .table td {
                font-size: 12px;
                padding: 10px;
            }
        }
    </style>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
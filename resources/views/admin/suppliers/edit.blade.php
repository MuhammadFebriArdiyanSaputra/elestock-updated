@extends('admin.navbar')

@section('title', 'Edit Supplier')

@section('content')
    <div class="container">
        <h1 class="page-title"><i class="fas fa-edit"></i> Edit Supplier</h1>

        <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama"><i class="fas fa-user"></i> Nama Supplier:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $supplier->nama }}" placeholder="Masukkan nama supplier" required>
            </div>

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $supplier->email }}" placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label for="phone"><i class="fas fa-phone"></i> Telepon:</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $supplier->phone }}" placeholder="Masukkan nomor telepon" required>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Supplier</button>
                <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </form>
    </div>

    <style>
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 60%;
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

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 16px;
            margin-bottom: 5px;
            display: inline-block;
            color: #555;
        }

        .form-group label i {
            color: #007bff;
            margin-right: 5px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
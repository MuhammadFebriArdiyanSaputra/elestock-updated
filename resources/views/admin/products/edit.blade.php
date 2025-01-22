@extends('admin.navbar')

@section('title', 'Edit Product')

@section('content')
    <div class="container">
        <h1 class="page-title"><i class="fas fa-edit"></i> Edit Product</h1>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama"><i class="fas fa-tag"></i> Name:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $product->nama }}" required>
            </div>

            <div class="form-group">
                <label for="kategori"><i class="fas fa-list-alt"></i> Category:</label>
                <input type="text" id="kategori" name="kategori" class="form-control" value="{{ $product->kategori }}" required>
            </div>

            <div class="form-group">
                <label for="spesifikasi"><i class="fas fa-info-circle"></i> Specification:</label>
                <textarea id="spesifikasi" name="spesifikasi" class="form-control" required>{{ $product->spesifikasi }}</textarea>
            </div>

            <div class="form-group">
                <label for="stok"><i class="fas fa-boxes"></i> Stock:</label>
                <input type="number" id="stok" name="stok" class="form-control" value="{{ $product->stok }}" required>
            </div>

            <div class="form-group">
                <label for="location_id"><i class="fas fa-map-marker-alt"></i> Location:</label>
                <select id="location_id" name="location_id" class="form-control" required>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ $product->location_id == $location->id ? 'selected' : '' }}>
                            {{ $location->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Product</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </form>
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
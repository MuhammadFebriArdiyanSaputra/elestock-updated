@extends('admin.navbar')

@section('title', 'Add Product')

@section('content')
<div class="container">
    <h1 class="page-title"><i class="fas fa-box"></i> Add New Product</h1>
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama"><i class="fas fa-tag"></i> Product Name:</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter product name" required>
        </div>
        <div class="form-group">
            <label for="kategori"><i class="fas fa-list-alt"></i> Category:</label>
            <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Enter category" required>
        </div>
        <div class="form-group">
            <label for="spesifikasi"><i class="fas fa-info-circle"></i> Specification:</label>
            <textarea id="spesifikasi" name="spesifikasi" class="form-control" placeholder="Enter specifications" required></textarea>
        </div>
        <div class="form-group">
            <label for="stok"><i class="fas fa-boxes"></i> Stock:</label>
            <input type="number" id="stok" name="stok" class="form-control" placeholder="Enter stock quantity" required>
        </div>
        <div class="form-group">
            <label for="location_id"><i class="fas fa-map-marker-alt"></i> Location:</label>
            <select id="location_id" name="location_id" class="form-control" required>
                <option value="" disabled selected>Select a location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </form>
</div>

<style>
    .container {
        margin: 20px auto;
        padding: 20px;
        max-width: 700px;
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
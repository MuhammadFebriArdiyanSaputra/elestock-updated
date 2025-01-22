@extends('user.navbar')

@section('title', 'Buat Permintaan Barang')

@section('content')
<a href="{{ route('user.dashboard') }}" class="btn btn-back">Back</a><br>

<div class="container">

    <h1 class="mt-4 mb-4">Buat Permintaan Barang</h1>

    <form action="{{ route('user.requestItems.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Nama Barang</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="" disabled selected>Pilih Barang</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->nama }} (Stok: {{ $product->stok }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alasan">Alasan</label>
            <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajukan</button>
    </form>
</div>

<style>
    .btn-back{
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
    }

    .container {
        font-family: Arial, sans-serif;
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        color: #555;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        color: #333;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    textarea {
        resize: none;
        height: 100px;
    }

    .btn-primary {
        display: block;
        width: 100%;
        background-color: #007bff;
        border: none;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .alert {
        text-align: center;
        margin-bottom: 15px;
        font-size: 14px;
        color: #fff;
        background-color: #dc3545;
        padding: 10px;
        border-radius: 5px;
    }
</style>

@endsection
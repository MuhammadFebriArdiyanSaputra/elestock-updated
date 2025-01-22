@extends('admin.layoutadmin')

@section('title', 'Add New Product')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Add New Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Product Name</label>
            <input type="text" name="nama" class="form-control" id="nama" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Category</label>
            <input type="text" name="kategori" class="form-control" id="kategori" required>
        </div>
        <div class="mb-3">
            <label for="spesifikasi" class="form-label">Specifications</label>
            <textarea name="spesifikasi" class="form-control" id="spesifikasi" required></textarea>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stock</label>
            <input type="number" name="stok" class="form-control" id="stok" required>
        </div>
        <div class="mb-3">
            <label for="location_id" class="form-label">Location</label>
            <select name="location_id" class="form-control" id="location_id" required>
                <option value="">Select Location</option>
                @forelse($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->nama }}</option> <!-- Ubah $location->name menjadi $location->nama -->
                @empty
                    <option value="">No Locations Available</option>
                @endforelse
            </select>
        </div>        
        <button type="submit" class="btn btn-success">Add Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
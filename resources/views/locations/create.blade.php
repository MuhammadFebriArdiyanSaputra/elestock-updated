@extends('admin.layoutadmin')

@section('title', 'Add New Location')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Add New Location</h1>

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Location Name</label>
            <input type="text" name="nama" class="form-control" id="nama" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Location</button>
        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

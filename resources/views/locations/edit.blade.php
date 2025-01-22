@extends('admin.layoutadmin')

@section('title', 'Edit Location')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Edit Location</h1>

    <form action="{{ route('locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Location Name</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ $location->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ $location->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Location</button>
        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
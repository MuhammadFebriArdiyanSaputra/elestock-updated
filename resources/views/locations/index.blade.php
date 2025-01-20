@extends('admin.layoutadmin')

@section('title', 'Location List')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Location List</h1>
    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Add New Location</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $index => $location)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $location->nama }}</td>
                    <td>{{ $location->description }}</td>
                    <td>
                        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
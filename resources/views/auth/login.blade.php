@extends('layouts.layout')

@section('title', 'Login Page')

<!-- Menambahkan Font Awesome -->
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 d-flex">
        <!-- Card untuk Form Login dengan lebar lebih besar -->
        <div class="card w-75" style="min-height: 50vh;">
            <div class="card-body d-flex flex-column justify-content-center">
                <h2 class="card-title text-center">Login</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Login -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Input Email dengan Icon -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <!-- Input Password dengan Icon -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>

                    <!-- Tombol Login -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tempat Gambar di Sebelah Kanan -->
        <div class="w-50 d-flex align-items-center justify-content-center" style="min-height: 50vh;">
            <!-- Menggunakan helper asset() untuk mengambil gambar dari folder public -->
            <img src="{{ asset('images/gudang 2.jpg') }}" alt="Login Image" class="img-fluid" style="object-fit: cover; width: 100%; height: auto;"/>
        </div>
    </div>
</div>

@endsection
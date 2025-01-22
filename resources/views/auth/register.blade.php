@extends('layouts.layout')

@section('title', 'Register Page')

<!-- Menambahkan Font Awesome -->
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 d-flex">
        <!-- Card untuk Form Register dengan lebar lebih besar -->
        <div class="card w-75" style="min-height: 50vh;">
            <div class="card-body d-flex flex-column justify-content-center">
                <h2 class="card-title text-center">Register</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Register -->
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <!-- Input Name dengan Ikon -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <!-- Input Email dengan Ikon -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <!-- Input Password dengan Ikon -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>

                    <!-- Input Confirm Password dengan Ikon -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>

                    <!-- Tombol Register -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tempat Gambar di Sebelah Kanan -->
        <div class="w-50 d-flex align-items-center justify-content-center" style="min-height: 50vh;">
            <!-- Menggunakan helper asset() untuk mengambil gambar dari folder public -->
            <img src="{{ asset('images/gudang 2.jpg') }}" alt="Register Image" class="img-fluid" style="object-fit: cover; height: 100%; width: 100%;"/>
        </div>
    </div>
</div>
@endsection
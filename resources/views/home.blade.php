<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Link untuk font Poppins dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Link untuk Animasi -->
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet"> 

    <style>
        /* Mengatur font default ke Poppins */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            background: url('{{ asset('images/gudang 1.jpg') }}') no-repeat center center;
            background-size: cover; /* Gambar akan menutupi seluruh layar */
            background-position: center center; /* Posisi gambar di tengah */
            height: 100vh; /* Menggunakan 100% tinggi layar */
            display: flex;
            justify-content: flex-start; /* Pastikan konten di sebelah kiri */
            align-items: center;
            background-attachment: fixed; /* Efek paralaks: gambar tetap saat scroll */
        }

        /* Overlay untuk meningkatkan kontras teks */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Overlay hitam dengan transparansi */
            z-index: 1;
        }

        /* Konten di atas overlay */
        .hero-content {
            position: relative;
            z-index: 2; /* Konten di atas overlay */
            padding: 20px;
            text-align: left; /* Ubah dari center menjadi left */
            max-width: 600px; /* Menentukan lebar maksimum konten */
            color: white;
        }

        /* Gaya untuk judul */
        .hero-title {
            font-size: 4rem;
            font-weight: 600;
            text-shadow: 3px 3px 20px rgba(0, 0, 0, 0.8); /* Bayangan teks untuk kontras */
            margin-bottom: 20px;
        }

        /* Gaya untuk deskripsi */
        .hero-description {
            font-size: 1.5rem;
            text-shadow: 2px 2px 15px rgba(0, 0, 0, 0.7); /* Bayangan teks untuk deskripsi */
            margin-bottom: 30px;
        }

        /* Tombol Get Started */
        .btn-get-started {
            background-color: #007bff; /* Warna biru untuk tombol */
            color: white;
            padding: 12px 30px;
            font-size: 1.2rem;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-get-started:hover {
            background-color: #0056b3; /* Warna biru gelap saat hover */
            transform: translateY(-3px);
        }

        /* Animasi untuk fade in */
        .animate__fadeInDown, .animate__fadeInUp {
            animation-duration: 1s;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem; /* Ukuran font lebih kecil di perangkat mobile */
            }

            .hero-description {
                font-size: 1.2rem; /* Ukuran font deskripsi lebih kecil di perangkat mobile */
            }

            .btn-get-started {
                font-size: 1rem; /* Ukuran font tombol lebih kecil di perangkat mobile */
                padding: 10px 25px;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title animate__animated animate__fadeInDown">Welcome to StockStream</h1>
            <p class="hero-description animate__animated animate__fadeInUp">StockStream adalah sistem manajemen barang elektronik yang dirancang untuk membantu pengguna dalam melacak lokasi barang secara efisien dan mendapatkan informasi detail mengenai produk yang disimpan.</p>
            <!-- Tombol Get Started -->
            <a href="{{ url('login') }}" class="btn-get-started animate__animated animate__pulse animate__infinite">Get Started</a>
        </div>
    </div>
</body>
</html>
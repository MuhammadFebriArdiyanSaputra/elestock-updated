@extends('admin.navbar')

@section('title', 'Daftar Lokasi')

@section('content')
    <div class="container">
        <h1 class="page-title"><i class="fas fa-map-marker-alt"></i> Daftar Lokasi</h1>
        <a href="{{ route('admin.locations.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Lokasi</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->nama }}</td>
                        <td>{{ $location->description }}</td>
                        <td>
                            <a href="{{ route('admin.locations.edit', $location->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus lokasi ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tombol Back di bawah tabel -->
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-back">Kembali</a>
    </div>

    <style>
        /* Kontainer utama */
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 95%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Judul halaman */
        .page-title {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Tombol utama */
        .btn {
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            font-weight: bold;
        }

        /* Tombol primer */
        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        /* Tombol warning */
        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        /* Tombol danger */
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        /* Efek hover pada tombol */
        .btn:hover {
            opacity: 0.8;
        }

        /* Styling untuk tabel */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        /* Header tabel */
        .table th {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase;
        }

        /* Baris tabel ganjil dan genap */
        .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        /* Hover baris tabel */
        .table tr:hover {
            background-color: #e9ecef;
        }

        .table td {
            color: #333;
            font-size: 15px;
        }

        /* Tombol aksi di dalam tabel */
        .table .btn {
            font-size: 14px;
            padding: 8px 15px;
            margin: 0 5px;
        }

        /* Tombol kembali */
        .btn-back {
            font-size: 16px;
            padding: 12px 25px;
            text-decoration: none;
            background-color: #6c757d;
            color: white;
            border-radius: 8px;
            margin-top: 20px;
            display: block;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }

            .table th, .table td {
                padding: 10px;
            }

            .btn-back {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
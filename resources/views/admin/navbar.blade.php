<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar .logo i {
            margin-right: 10px;
        }

        /* Menu Navigation */
        .navbar ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 8px;
            border-radius: 4px;
        }

        .navbar ul li a:hover {
            background-color: #0056b3;
            color: #d4d4d4;
        }

        /* Right section (User Profile / Logout) */
        .navbar .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar .user-profile .user-avatar {
            width: 35px;
            height: 35px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #007bff;
        }

        .navbar .user-profile .logout-btn {
            background-color: #ff4b5c;
            border: none;
            padding: 8px 12px;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .navbar .user-profile .logout-btn:hover {
            background-color: #c0392b;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar ul {
                flex-direction: column;
                width: 100%;
                text-align: left;
            }

            .navbar ul li {
                margin: 10px 0;
            }

            .navbar .user-profile {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <i class="fas fa-cog"></i> Admin Panel
        </a>

        <!-- Menu Navigasi -->
        <ul>
            <li><a href="{{ route('admin.products.index') }}"><i class="fas fa-box-open"></i> Produk</a></li>
            <li><a href="{{ route('admin.locations.index') }}"><i class="fas fa-map-marker-alt"></i> Lokasi</a></li>
            <li><a href="{{ route('admin.suppliers.index') }}"><i class="fas fa-truck"></i> Supplier</a></li>
            <li><a href="{{ route('admin.borrowRequests.index') }}"><i class="fas fa-tasks"></i> Permohonan Pinjam Barang</a></li>
        </ul>

        <!-- User Profile Section (Avatar and Logout) -->
        <div class="user-profile">
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
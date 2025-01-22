<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background-color: #007bff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

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
        }

        .navbar ul li a:hover {
            color: #d4d4d4;
        }

        /* Logout button */
        .navbar .logout-btn {
            background-color: #ff4b5c;
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .navbar .logout-btn:hover {
            background-color: #c0392b;
        }

        /* Content */
        .content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .navbar ul {
                flex-direction: column;
            }
            .navbar ul li {
                margin: 10px 0;
            }
            .content {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('user.dashboard') }}" class="logo"><i class="fas fa-cog"></i> User Panel</a>
        <ul>
            <li><a href="{{ route('user.availableItems.index') }}"><i class="fas fa-box-open"></i> Barang Tersedia</a></li>
            <li><a href="{{ route('user.borrowReqs.index') }}"><i class="fas fa-tasks"></i> Pengajuan Pinjam Barang</a></li>
            <li><a href="{{ route('user.requestItems.index') }}"><i class="fas fa-tasks"></i> Pengajuan yang Diminta</a></li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </nav>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
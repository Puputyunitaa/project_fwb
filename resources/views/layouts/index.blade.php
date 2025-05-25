<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fdf6f0; /* latar belakang coksu terang */
            color: #4e342e; /* coklat tua lembut */
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .navbar {
            background-color: #9f8a82; /* coksu elegan */
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
            color: #4e342e !important; /* teks judul */
        }
        .btn-logout {
            background-color: #6d4c41;
            border: none;
            color: white;
        }
        .btn-logout:hover {
            background-color: #5d4037;
        }
        .card {
            background-color: #fff8f0; /* putih gading/coksu muda */
            border: 1px solid #a1887f;
            box-shadow: 0 0 15px rgba(109, 76, 65, 0.15);
        }
        .btn-primary {
            background-color: #a1887f;
            border-color: #a1887f;
        }
        .btn-primary:hover {
            background-color: #8d6e63;
            border-color: #8d6e63;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="#">SISTEM PENGELOLAAN STOK BARANG JUALAN TOKO</a>

            @auth
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>

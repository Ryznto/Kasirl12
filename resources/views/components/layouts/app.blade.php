<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Nunito', sans-serif;
        }

        .wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        aside.sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.15);
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .logo h5 {
            margin-top: 10px;
            font-weight: bold;
        }

        .sidebar a {
            color: #fff;
            padding: 10px 15px;
            margin: 5px 0;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar .active {
            background-color: #0d6efd;
        }

        /* Main content area */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
            overflow: auto;
        }

        /* Header atas */
        header.topbar {
            height: 60px;
            background-color: white;
            border-bottom: 1px solid #ddd;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgb(0 0 0 / 0.1);
            z-index: 10;
        }

        /* User info di kiri */
        .user-info {
            color: #343a40;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info i {
            font-size: 1.3rem;
            color: #0d6efd;
        }

        /* Tombol logout di kanan */
        .logout-btn button {
            width: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside class="sidebar">
            <div class="logo">
                {{-- <img src="https://via.placeholder.com/60" alt="Logo"> --}}
                <h5>{{ config('app.name', 'Laravel') }}</h5>
            </div>

            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><i class="bi bi-person-plus me-2"></i>Register</a>
                @endif
            @else
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house-door me-2"></i>Beranda
                </a>

                @if (Auth::user()->peran == 'admin')
                    <a href="{{ route('user') }}" class="{{ request()->routeIs('user') ? 'active' : '' }}">
                        <i class="bi bi-people me-2"></i>Pengguna
                    </a>
                    <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk') ? 'active' : '' }}">
                        <i class="bi bi-box-seam me-2"></i>Produk
                    </a>
                @endif

                <a href="{{ route('transaksi') }}" class="{{ request()->routeIs('transaksi') ? 'active' : '' }}">
                    <i class="bi bi-cash-stack me-2"></i>Transaksi
                </a>

                <a href="{{ route('laporan') }}" class="{{ request()->routeIs('laporan') ? 'active' : '' }}">
                    <i class="bi bi-clipboard-data me-2"></i>Laporan
                </a>
            @endguest
        </aside>

        <div class="main-content">
            <header class="topbar">
                @auth
                    <div class="user-info">
                        <i class="bi bi-person-circle"></i>
                        <span>{{ Auth::user()->name }}</span> |
                        <span class="text-muted text-capitalize">{{ Auth::user()->peran }}</span>
                    </div>

                    <div class="logout-btn">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-box-arrow-right me-1"></i>Logout
                            </button>
                        </form>
                    </div>
                @endauth
            </header>

            <main class="p-3">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>

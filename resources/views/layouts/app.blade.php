<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }

        .table-responsive {
            -webkit-overflow-scrolling: touch;
            overflow-x: auto;
        }

        table {
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: #4e73df;
            color: white;
            position: fixed;
            height: 100%;
            z-index: 1030;
            transition: transform 0.3s ease;
        }

        .sidebar .sidebar-brand {
            background-color: #2e59d9;
            padding: 15px;
            text-align: center;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        #content-wrapper {
            margin-left: 250px;
            flex-grow: 1;
            transition: margin-left 0.3s ease;
        }

        /* Tombol Close di Sidebar */
        .sidebar-close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            #content-wrapper {
                margin-left: 0;
            }
        }

        .navbar-toggler {
            display: inline-block;
        }

        @media (max-width: 576px) {
            .sidebar {
                position: fixed;
                width: 100%;
                height: 100%;
            }
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- Tombol Close Sidebar -->
            <button class="sidebar-close-btn" id="sidebarCloseBtn">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="sidebar-brand">
                {{ config('app.name', 'Laravel') }}
            </div>
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('siswa.index') }}">
                        <i class="fas fa-user-graduate"></i> Data Siswa
                    </a>
                </li>
                <li class="nav-item">
    <a class="nav-link" href="{{ route('absensi.data') }}">
        <i class="fas fa-check-circle"></i> Data Absensi
    </a>
</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <!-- Content Wrapper -->
        <div id="content-wrapper">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <button class="btn btn-link navbar-toggler" type="button" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="container-fluid p-3">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        });

        document.getElementById('sidebarCloseBtn').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.remove('active');
        });
    </script>
</body>
</html>
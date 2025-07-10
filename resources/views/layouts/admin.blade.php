<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.75rem 1.25rem;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h5 class="text-white mb-4"><i class="fas fa-user-shield me-2"></i>Admin</h5>
            <a href="{{ route('admin.kyc.index') }}" class="{{ request()->routeIs('admin.kyc.*') ? 'active' : '' }}">
                <i class="fas fa-id-card me-2"></i> KYC Applications
            </a>
            <!-- Add more admin links here -->
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <h2 class="mb-4">@yield('page_title', 'Admin Dashboard')</h2>
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

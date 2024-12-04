    <!DOCTYPE html>
    <html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenesia</title>
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    <body>
    <!-- Header -->
    <header>
        <div class="container header__content">
            <h1>Vigenesia</h1>
            <div class="user-info">
                <span>Halo, <strong>{{ Auth::user()->name }}</strong></span>
                <nav>
                    <button onclick="window.location='{{ route('profile.settings') }}'" class="btn btn-primary">
                        <i class="fas fa-cog"></i> Setting
                    </button>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="button">
                            <i class="fas fa-sign-out-alt"></i> 
                            Logout
                        </button> 
                    </form>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="main-content">
            <!-- Main Content Begin -->
            @yield('content')
            <!-- Main Content End -->
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container footer__content">
            <p>&copy; 2024 Vigenesia</p>
        </div>
    </footer>
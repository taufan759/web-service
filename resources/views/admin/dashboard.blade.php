    <!DOCTYPE html>
    <html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenesia</title>
    <link rel="stylesheet" href="{{ asset('admin/css/dashboard.css') }}">
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
        <section class="form-section">
            <h2 style="text-align: left;">Tulis Motivasi</h2>
            <form action="{{ route('dashboard.store') }}" method="POST">
                @csrf
                <textarea name="content" placeholder="Tulis motivasi Anda di sini" required></textarea>
                <div class="form-buttons">
                    <select name="visibility" required>
                        <option value="private">Private</option>
                        <option value="public">Public</option>
                    </select>
                    <button type="submit">Submit</button>
                </div>
            </form>
            
        </section>

        <section class="motivations-section">
            <h2 style="text-align: left; padding-left: 20px;">Motivasi</h2>

            <!-- Tab Navigation -->
            <div class="tab-navigation">
                <button class="tab-button active" onclick="showTab('myMotivations')">Motivasi Saya</button>
                <button class="tab-button" onclick="showTab('otherMotivations')">Motivasi Lainnya</button>
            </div>

            <!-- Motivasi Saya -->
            <div class="tab-content" id="myMotivations">
                @foreach($myMotivations as $motivation)
                <div class="motivation-card">
                    <p>"{{ $motivation->content }}"</p>
                    <span class="author">Ditulis oleh: <strong>{{ $motivation->user->name }}</strong></span>
                    <div class="motivation-buttons">
                        <form action="{{ route('dashboard.update', $motivation->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </form>
                        <form action="{{ route('dashboard.destroy', $motivation->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Motivasi Lainnya -->
            <div class="tab-content" id="otherMotivations" style="display: none;">
                @foreach($otherMotivations as $motivation)
                <div class="motivation-card">
                    <p>"{{ $motivation->content }}"</p>
                    <span class="author">Ditulis oleh: <strong>{{ $motivation->user->name }}</strong></span>
                </div>
                @endforeach
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container footer__content">
            <p>&copy; 2024 Vigenesia</p>
        </div>
    </footer>

    <script>
        function showTab(tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.style.display = 'none');
            document.getElementById(tabId).style.display = 'block';

            const buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(button => button.classList.remove('active'));
            document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('active');
        }
    </script>
    </body>
    </html>

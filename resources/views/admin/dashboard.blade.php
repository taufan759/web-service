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
                            <div class="motivation-buttons" style="display: flex; gap: 10px; align-items: center;">
                                <!-- Tombol Edit -->
                                <a href="{{ route('dashboard.edit', $motivation->id) }}" class="btn btn-warning" style="color: black; text-decoration: none; padding: 10px 15px; border-radius: 5px; display: inline-block;">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            
                                <!-- Tombol Hapus -->
                                <form action="{{ route('dashboard.destroy', $motivation->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="background-color: #dc3545; border: none; color: #fff; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>                            
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
    <script>
        document.querySelectorAll('.motivation-buttons form').forEach(form => {
            form.addEventListener('submit', function (event) {
                if (!confirm('Apakah Anda yakin ingin menghapus motivasi ini?')) {
                    event.preventDefault();
                }
            });
        });
    </script>
    
    </body>
    </html>

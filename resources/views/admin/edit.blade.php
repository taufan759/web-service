<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Motivasi - Vigenesia</title>
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
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container">
            <section class="form-section">
                <h2>Edit Motivasi</h2>
                <form action="{{ route('dashboard.update', $motivation->id) }}" method="POST" class="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="content" class="form-label">Motivasi</label>
                        <textarea id="content" name="content" class="form-control" rows="5" required>{{ $motivation->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="visibility" class="form-label">Visibilitas</label>
                        <select id="visibility" name="visibility" class="form-select" required>
                            <option value="private" {{ $motivation->visibility == 'private' ? 'selected' : '' }}>Private</option>
                            <option value="public" {{ $motivation->visibility == 'public' ? 'selected' : '' }}>Public</option>
                        </select>
                    </div>
                    <div class="form-buttons" style="display: flex; gap: 10px; align-items: center;">
                      <button type="submit" class="btn btn-primary">
                          <i class="fas fa-save"></i> Simpan Perubahan
                      </button>
                      <a href="{{ route('admin.dashboard') }}" class="btn btn-light" style="border: 1px solid #ccc; color: #555; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
                          <i class="fas fa-arrow-left"></i> Kembali
                      </a>
                  </div>
                  
                </form>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container footer__content">
            <p>&copy; 2024 Vigenesia</p>
        </div>
    </footer>
</body>
</html>

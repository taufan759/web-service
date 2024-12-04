<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Motivasi - Vigenesia</title>
    <link rel="stylesheet" href="{{ asset('admin/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .form-section {
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-label {
        font-weight: bold;
        }

        .form-label select {
        background-color: #0F4C75;
        color: white;
        border: none;
        padding: 10px 5px 10px 10px;
        border-radius: 5px;
        margin-right: 10px;
        transition: background-color 0.3s ease;
        }

        .form-label select :hover {
        background-color: #1B262C;
        }

        .form-control {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        }

        .form-buttons {
        justify-content: center; /* Menempatkan tombol di tengah */
        }

        .btn {
        padding: 10px 20px;
        border-radius: 5px;
        }

        /* Gaya tambahan untuk tombol */
        .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
        }

        .btn-primary:hover {
        background-color: #0069d9;
        }

        .btn-secondary {
        background-color: #e2e2e2;
        color: #333;
        }

        .btn-secondary:hover {
        background-color: #d6d6d6;
        }
    </style>
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
                        <select id="visibility" name="visibility" class="form-select" required style="background-color: #0F4C75;; color: white; border: none; padding: 10px 5px 10px 10px; border-radius: 5px; margin-right: 10px; transition: background-color 0.3s ease; margin-bottom: 20px">
                            <option value="private" {{ $motivation->visibility == 'private' ? 'selected' : '' }}>Private</option>
                            <option value="public" {{ $motivation->visibility == 'public' ? 'selected' : '' }}>Public</option>
                        </select>
                    </div>
                    <div class="form-buttons d-flex gap-2">
                        <button type="submit" class="btn" style="background-color: #3282B8; color: white; transition: background-color 0.3s ease;">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <button class="btn" style="background-color: #6c757d; color: white; transition: background-color 0.3s ease;" onclick="window.location.href='{{ route('admin.dashboard') }}'">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button>
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
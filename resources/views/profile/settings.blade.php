<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenesia - Pengaturan Profil</title>
    <link rel="stylesheet" href="{{ asset('admin/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        h2 {
            text-align: center;
            color: #495464;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            border-color: #007bff;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 10px 15px; 
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .save-btn {
            background-color: #28a745;
            color: white;
        }

        .save-btn:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .back-btn {
            background-color: #6c757d;
            color: white;
            font-size: 0.8rem;
        }

        .back-btn:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header__content">
            <h1>Pengaturan Profil</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container">
            <h2>Detail Akun</h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn save-btn">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn back-btn">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container footer__content">
            <p style="text-align: center;">&copy; 2024 Vigenesia</p>
        </div>
    </footer>
</body>
</html>

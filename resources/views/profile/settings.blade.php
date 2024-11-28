<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenesia - Pengaturan Profil</title>
    <link rel="stylesheet" href="{{ asset('admin/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <section class="form-section">
            <h2 style="text-align: left;">Detail Akun</h2>
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" value="John Doe" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="johndoe@example.com" required>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container footer__content">
            <button onclick="window.location='{{ route('admin.dashboard') }}'" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </button>
        </div>
    </footer>
</body>
</html>
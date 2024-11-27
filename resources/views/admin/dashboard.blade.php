<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vigenesia</title>
<link rel="stylesheet" href="{{ asset('admin/css/dashboard.css')}}">
</head>
<body>
<!-- Header -->
<header>
    <div class="container header__content">
    <h1>Vigenesia</h1>
    <div class="user-info">
        <span >Halo, <strong>Nama Mahasiswa</strong></span>
        <nav>
            <button class="button">Settings</button>
            <button class="button">Logout</button>
        </nav>
    </div>
    </div>
</header>

<!-- Main Content -->
<main>
    <section class="form-section">
    <h2 style="text-align: left;">Tulis Motivasi</h2>
    <form id="motivationForm">
        <textarea name="motivation" id="motivation" rows="4" placeholder="Tulis motivasi Anda di sini..."></textarea>
        <div class="form-buttons">
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
        <div class="motivation-card">
        <p>"Belajar adalah kunci kesuksesan."</p>
        <span class="author">Ditulis oleh: <strong>Nama Mahasiswa</strong></span>
        <div class="motivation-buttons">
            <button>Edit</button>
            <button>Hapus</button>
        </div>
        </div>
    </div>

    <!-- Motivasi Lainnya -->
    <div class="tab-content" id="otherMotivations" style="display: none;">
        <div class="motivation-card">
        <p>"Jangan menyerah sebelum mencoba."</p>
        <span class="author">Ditulis oleh: <strong>Nama Pengguna Lain</strong></span>
        </div>
    </div>
    </section>
</main>

<!-- Footer -->
<footer>
    <div class="container footer__content">
    <p>&copy; 2024 Vigenesia</p>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
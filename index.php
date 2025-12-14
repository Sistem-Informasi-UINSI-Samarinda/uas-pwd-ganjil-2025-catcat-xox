<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Nyaman - Home</title>
    <link rel="stylesheet" href="assets/css/user_header-footer.css">
    <link rel="stylesheet" href="assets/css/user_home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">    

</head>
<body>
    <header>

        <div class="logo">

            <img src="assets/images/ikon_kos.png" alt="ikon_kos" class="ikon_kos">
            <div class="namakos"><h3>KOS BERKAH</h3></div>
           
        </div>

        <nav>
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="hamburger">
                <i class="fa-solid fa-bars"></i>
            </label>

            <ul>
                <li>
                    <a href="index.php"
                    class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?>">
                    Home
                    </a>
                </li>

                <li>
                    <a href="pages/users/Facilities.php"
                    class="nav-link <?= ($current_page == 'Facilities.php') ? 'active' : '' ?>">
                    Fasilitas
                    </a>
                </li>

                <li>
                    <a href="pages/users/Contact.php"
                    class="nav-link <?= ($current_page == 'Contact.php') ? 'active' : '' ?>">
                    Contact
                    </a>
                </li>

                <li>
                    <a href="pages/users/About.php"
                    class="nav-link <?= ($current_page == 'About.php') ? 'active' : '' ?>">
                    About
                    </a>
                </li>

                <li>
                    <a href="pages/admin/login_admin.php"
                    class="nav-link <?= ($current_page == 'login_admin.php') ? 'active' : '' ?>">
                    Admin
                    </a>
                </li>
            </ul>
        </nav>
        
    </header>

    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Selamat Datang di Kos Berkah</h1>
            <p>Temukan kenyamanan dan kemudahan tinggal di kos kami yang strategis, bersih, dan terjangkau. Cocok untuk mahasiswa, pekerja, atau siapa saja yang mencari hunian ideal.</p>
            <a href="pages/users/Contact.php" class="btn">Hubungi Kami Sekarang</a>
        </div>
    </section>

    <section class="features">
        <h2>Kenapa Memilih Kos Kami?</h2>
        <div class="feature-grid">
            <div class="feature-item">
                <h3>Lokasi Strategis</h3>
                <p>Berada di pusat kota, dekat dengan transportasi umum, kampus, dan pusat perbelanjaan.</p>
            </div>
            <div class="feature-item">
                <h3>Fasilitas Lengkap</h3>
                <p>WiFi cepat, kamar mandi dalam, dapur bersama, dan keamanan 24 jam.</p>
            </div>
            <div class="feature-item">
                <h3>Harga Terjangkau</h3>
                <p>Tarif mulai dari Rp500.000 per bulan, dengan opsi pembayaran fleksibel.</p>
            </div>
            <div class="feature-item">
                <h3>Komunitas</h3>
                <p>Bergabunglah dengan penghuni lain yang hangat dan saling mendukung.</p>
            </div>
        </div>
    </section>

    <section class="gallery">
        <h2>Galeri Kos Kami</h2>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="assets/images/strategis.jpg" alt="Lokasi Strategis">
                <div class="overlay">
                    <h4>Lokasi Strategis di Pusat Kota</h4>
                </div>
            </div>
            <div class="gallery-item">
                <img src="assets/images/gambar_pemilik.jpg" alt="Lokasi Strategis">
                <div class="overlay">
                    <h4>Pemilik yang Ramah dan Baik Hati</h4>
                </div>
            </div>
            <div class="gallery-item">
                <img src="assets/images/gambar_kos.jpg" alt="Lokasi Strategis">
                <div class="overlay">
                    <h4>Bangunan Modern dan Minimalis</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">


        <?php
        include 'config/koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM testimoni ORDER BY id DESC");
        ?>

        <h2>Apa Kata Penghuni Kami?</h2>

        <div class="testimonial-grid">
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <div class="testimonial-item">
                    <p>"<?= $row['isi']; ?>"</p>
                    <div class="author">- <?= $row['nama']; ?>, <?= $row['status']; ?></div>
                </div>
            <?php endwhile; ?>
        </div>


    </section>

    <footer>
        <p>&copy; Kos Berkah. Semua hak dilindungi.</p>
    </footer>
</body>
</html>

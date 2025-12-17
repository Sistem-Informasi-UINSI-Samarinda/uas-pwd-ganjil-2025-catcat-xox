<?php
include '../../config/koneksi.php';

$galeri = mysqli_query($conn, "SELECT * FROM fasilitas ORDER BY id_fasilitas DESC");
?>

<?php include '../../includes/meta.php'; ?>
    <link rel="stylesheet" href="../../assets/css/user_facilities.css">   
<?php include '../../includes/header.php'; ?>

<div class="body">
    <section class="hero-facilities" id="facilities">
        <div class="judul">
            <h1>Fasilitas Kos Kami</h1>
            <p>Jelajahi berbagai fasilitas lengkap yang kami tawarkan untuk memastikan kenyamanan dan kemudahan hidup Anda di Kos Nyaman.</p>
        </div>
    </section>

    <section class="facilities-section">
        <h2>Fasilitas Utama</h2>
        <div class="facilities-grid">
            <div class="facility-item">
                <h3>WiFi Cepat</h3>
                <p>Internet berkecepatan tinggi 24 jam untuk mendukung kegiatan online Anda, baik untuk belajar maupun bekerja.</p>
            </div>
            <div class="facility-item">
                <h3>Kamar Mandi Dalam</h3>
                <p>Setiap kamar dilengkapi dengan kamar mandi pribadi yang bersih dan modern untuk privasi maksimal.</p>
            </div>
            <div class="facility-item">
                <h3>Dapur Bersama</h3>
                <p>Dapur lengkap dengan peralatan memasak, kulkas, dan area makan bersama untuk memasak sendiri.</p>
            </div>
            <div class="facility-item">
                <h3>Keamanan 24 Jam</h3>
                <p>Sistem keamanan dengan CCTV, penjaga malam, dan akses kartu untuk menjaga kenyamanan penghuni.</p>
            </div>
        </div>
    </section>

    <!-- Galeri Fasilitas -->
    <section class="galeri">
        <div class="container">
            <h2>Galeri Fasilitas</h2>

            <div class="galeri-grid">

                <?php if(mysqli_num_rows($galeri) > 0){ ?>
                    <?php while($row = mysqli_fetch_assoc($galeri)){ ?>

                        <div class="galeri-card">
                            <img src="../../assets/images/fasilitas/<?= $row['gambar']; ?>" 
                                alt="<?= $row['nama_fasilitas']; ?>">

                            <div class="content">
                                <h3><?= $row['nama_fasilitas']; ?></h3>
                                <p><?= $row['deskripsi']; ?></p>
                            </div>
                        </div>

                    <?php } ?>
                <?php } else { ?>
                    <p>Belum ada galeri fasilitas.</p>
                <?php } ?>

            </div>
        </div>
    </section>

    <section class="advantages">
        <h2>Keunggulan Fasilitas Kami</h2>
        <div class="advantages-grid">
            <div class="advantage-item">
                <h3>Bersih dan Terawat</h3>
                <p>Semua fasilitas selalu dibersihkan secara rutin untuk menjaga kebersihan dan kesehatan penghuni.</p>
            </div>
            <div class="advantage-item">
                <h3>Energi Ramah Lingkungan</h3>
                <p>Penggunaan lampu LED dan sistem hemat energi untuk mendukung lingkungan yang lebih hijau.</p>
            </div>
            <div class="advantage-item">
                <h3>Pemeliharaan Rutin</h3>
                <p>Tim kami melakukan pemeliharaan berkala untuk memastikan semua fasilitas berfungsi optimal.</p>
            </div>
            <div class="advantage-item">
                <h3>Fleksibilitas Penggunaan</h3>
                <p>Fasilitas dapat digunakan kapan saja sesuai kebutuhan, tanpa batasan waktu.</p>
            </div>
        </div>
    </section>
</div>


<?php include '../../includes/footer.php'; ?>

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kos Nyaman</title>
    <link rel="stylesheet" href="../../assets/css/admin_dashboard.css">
    <link rel="stylesheet" href="../../assets/css/admin_tambahfasilitas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">    
</head>
<body>
    <header class="admin-header">
        <h1>Dashboard Admin Kos Berkah</h1>
    </header>

    <input type="checkbox" id="toggle-menu">
    <label for="toggle-menu" class="overlay"></label>

    <div class="nav-bar-admin">
        <span class="nav-title">Navigasi Menu</span>

        <label for="toggle-menu" class="nav-toggle">
            <i class="fa-solid fa-bars"></i>
        </label>
    </div>


    <div class="dashboard-container">
        <aside class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="../../pages/admin/dashboard_admin.php" class="menu-link" >Dashboard</a></li>
                <li><a href="../../pages/admin/pesan_admin.php" class="menu-link" >Lihat Pesan</a></li>
                <li><a href="../../pages/admin/generate_admin.php" class="menu-link" >New Admin</a></li>
                <li><a href="../../pages/admin/testimoni_admin.php" class="menu-link" >Testimoni</a></li>
                <li><a href="../../pages/admin/fasilitas_admin.php" class="menu-link" >Fasilitas</a></li>
                <li><a href="../../pages/admin/logout_admin.php" class="menu-link" >Logout</a></li>
            </ul>
        </aside>

        <main class="main-content">

            <section class="cards">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <label>Nama Fasilitas</label><br>
                        <input type="text" name="nama_fasilitas" placeholder="Isikan nama fasilitas" required>
                        <br>

                        <label>Deskripsi Fasilitas</label><br>
                        <textarea name="deskripsi" rows="5" cols="70"></textarea>
                        <br>

                        <label>Gambar Fasilitas</label><br>
                        <input type="file" name="gambar" required>
                        <br>

                        <button type="submit" name="simpan">Simpan Fasilitas</button>
                    </form>
                </div>
            </section>

            <?php
            if(isset($_POST['simpan'])){

                $nama_fasilitas = $_POST['nama_fasilitas'];
                $deskripsi = $_POST['deskripsi'];

                // Upload gambar
                $gambar = $_FILES['gambar']['name'];
                $tmp = $_FILES['gambar']['tmp_name'];
                $folder = '../../assets/images/fasilitas/';

                // buat nama file unik (SAMA seperti pembimbing)
                $nama_gambar = uniqid() . "_" . $gambar;

                // validasi upload
                if($_FILES['gambar']['error'] !== UPLOAD_ERR_OK){
                    echo "ERROR UPLOAD GAMBAR, KODE: " . $_FILES['gambar']['error'];
                    exit;
                }

                // eksekusi upload
                move_uploaded_file($tmp, $folder . $nama_gambar);

                // query simpan
                $query = "
                    INSERT INTO fasilitas (nama_fasilitas, deskripsi, gambar)
                    VALUES ('$nama_fasilitas', '$deskripsi', '$nama_gambar')
                ";

                if(mysqli_query($conn, $query)){
                    echo "<script>
                        alert('Fasilitas berhasil ditambahkan');
                        window.location.href='../../pages/admin/fasilitas_admin.php';
                    </script>";
                } else {
                    echo "<script>
                        alert('Fasilitas gagal ditambahkan');
                        window.location.href='../../pages/admin/fasilitas_admin.php';
                    </script>";
                }
            }
            ?>

            


        </main>
</body>
</html>
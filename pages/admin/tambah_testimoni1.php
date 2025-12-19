<?php 
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../pages/admin/login_admin.php");
    exit();
}

include '../../config/koneksi.php';
$tes = "SELECT * FROM testimoni";
$kategori = mysqli_query($conn, $tes);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Berkah</title>
    <link rel="stylesheet" href="../../assets/css/admin_tambahtestimoni.css">
    <link rel="stylesheet" href="../../assets/css/admin_dashboard_home.css">
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
            <div class="testimoni-container">
                <div class="tambah-testimoni">
                    <h2>Tambah Testimoni</h2>

                    <form method="POST">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama..." required>

                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" placeholder="Mahasiswa, Pekerja, dll" required>

                        <label for="isi">Isi </label>
                        <textarea id="isi" name="isi" placeholder="Tulis isi testimoni..." rows="4" required></textarea>

                        <button type="submit" name="submit">Tambah</button>
                    </form>
                </div>
            </div>




            <?php 

                if(isset($_POST['submit'])){
                    $nama = $_POST['nama'];
                    $status = $_POST ['status'];
                    $isi = $_POST['isi'];

                    $query = "
                        INSERT INTO testimoni (nama, status, isi )
                        VALUES ('$nama', '$status', '$isi')
                        ";

                    if(mysqli_query($conn, $query)){
                        header("Location: ../../pages/admin/testimoni_admin.php");
                        exit();
                    }
                    else{
                        echo "<script>
                            alert('pendaftaran gagal!!');
                        </script>";
                    }
                }
                
            ?>


        </main>
</body>
</html>
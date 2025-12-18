<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

include '../../config/koneksi.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM testimoni WHERE id = '$id'");
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<script>alert('Testimoni tidak ditemukan'); window.location.href='../../pages/admin/testimoni_admin.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID testimoni tidak ditemukan'); window.location.href='../../pages/admin/testimoni_admin.php';</script>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Berkah</title>
    <link rel="stylesheet" href="../../assets/css/admin_edit-testimoni.css">
    <link rel="stylesheet" href="../../assets/css/admin_dashboard.css">
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
                <h2 class="judul-edit">Edit Testimoni</h2>

                <form action="" method="post">
                    <label>Nama</label>
                    <br>
                    <input type="text" name="nama" value="<?= $data['nama']; ?>" required>
                    <br><br>

                    <label>Status</label>
                    <br>
                    <input type="text" name="status" value="<?= $data['status']; ?>" required>
                    <br><br>

                    <label>Isi Testimoni</label>
                    <br>
                    <textarea name="isi" rows="5" required><?= $data['isi']; ?></textarea>
                    <br><br>

                    <button type="submit" name="simpan">Simpan Perubahan</button>
                </form>
            </section>
        </main>
        <?php
            if (isset($_POST['simpan'])) {
                $nama = $_POST['nama'];
                $status = $_POST['status'];
                $isi = $_POST['isi'];

                $query = "
                    UPDATE testimoni
                    SET nama   = '$nama', status = '$status', isi    = '$isi' WHERE id   = '$id' ";

                if (mysqli_query($conn, $query)) {
                    echo "<script>alert('Testimoni berhasil diupdate'); window.location.href='../../pages/admin/testimoni_admin.php';</script>";
                    exit();
                } else {
                    echo "Gagal mengupdate data: " . mysqli_error($conn);
                }
            }
        ?>
</body>
</html>
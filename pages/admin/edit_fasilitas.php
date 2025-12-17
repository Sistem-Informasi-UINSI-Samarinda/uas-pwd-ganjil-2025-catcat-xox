<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../pages/admin/login_admin.php");
    exit();
}

include '../../config/koneksi.php';

if(isset($_GET['id'])){
    $id_fasilitas = $_GET['id'];
    $result = mysqli_query($conn, 
        "SELECT * FROM fasilitas WHERE id_fasilitas = '$id_fasilitas'"
    );
    $data = mysqli_fetch_assoc($result);
} else {
    echo "<script>
        alert('ID Fasilitas tidak ditemukan'); 
        window.location.href='../../pages/admin/fasilitas_admin.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kos Nyaman</title>
    <link rel="stylesheet" href="../../assets/css/admin_dashboard.css">
    <link rel="stylesheet" href="../../assets/css/admin_editfasilitas.css">
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
                <form action="" method="post" enctype="multipart/form-data">

                    <label>Nama Fasilitas</label>
                    <input type="text" name="nama_fasilitas" 
                        value="<?= $data['nama_fasilitas']; ?>" required>
                    <br>

                    <label>Deskripsi Fasilitas</label>
                    <textarea name="deskripsi" rows="5"><?= $data['deskripsi']; ?></textarea>
                    <br>

                    <label>Gambar Saat Ini</label>
                    <img src="../../assets/images/fasilitas/<?= $data['gambar']; ?>" 
                        width="120" style="margin-bottom:10px;border-radius:8px;">
                    <br>

                    <label>Ganti Gambar (opsional)</label>
                    <input type="file" name="gambar">
                    <br>

                    <button type="submit" name="simpan">Simpan</button>
                </form>
            </section>
        

            <?php
            if(isset($_POST['simpan'])){
                $nama_fasilitas = $_POST['nama_fasilitas'];
                $deskripsi = $_POST['deskripsi'];

                // jika admin upload gambar baru
                if(!empty($_FILES['gambar']['name'])){
                    $gambar_baru = $_FILES['gambar']['name'];
                    $tmp = $_FILES['gambar']['tmp_name'];
                    $folder = '../../assets/images/fasilitas/';

                    $nama_gambar_baru = uniqid() . "_" . $gambar_baru;

                    move_uploaded_file($tmp, $folder . $nama_gambar_baru);

                    $gambar_lama = "../../assets/images/fasilitas/" . $data['gambar'];
                    if(file_exists($gambar_lama)){
                        unlink($gambar_lama);
                    }

                    // update dengan gambar baru
                    $query = "
                        UPDATE fasilitas 
                        SET nama_fasilitas = '$nama_fasilitas',
                            deskripsi = '$deskripsi',
                            gambar = '$nama_gambar_baru'
                        WHERE id_fasilitas = '$id_fasilitas'
                    ";
                } 
                // jika tidak ganti gambar
                else {
                    $query = "
                        UPDATE fasilitas 
                        SET nama_fasilitas = '$nama_fasilitas',
                            deskripsi = '$deskripsi'
                        WHERE id_fasilitas = '$id_fasilitas'
                    ";
                }

                if(mysqli_query($conn, $query)){
                    header("Location: ../../pages/admin/fasilitas_admin.php");
                    exit();
                } else {
                    echo "Gagal mengedit data: " . mysqli_error($conn);
                }
            }
            ?>


        </main>
</body>
</html>

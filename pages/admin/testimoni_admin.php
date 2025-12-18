<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

include '../../config/koneksi.php';
$ambiltestimoni = "SELECT id, nama, status, isi, tanggal
               FROM testimoni 
               ORDER BY id DESC";

$testimoni = mysqli_query($conn, $ambiltestimoni);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Berkah</title>
    <link rel="stylesheet" href="../../assets/css/admin_dashboard.css">
    <link rel="stylesheet" href="../../assets/css/admin_testimoni.css">
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
                    <table>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>isi</th>
                        <th>tanggal</th>
                        <th>Action</th>

                    </tr>
                    <?php 
                    $no = 1;
                    if(mysqli_num_rows($testimoni) > 0){
                        while($row = mysqli_fetch_assoc($testimoni)){ 
                    ?>
                    <tr>
                        <td class="td-text"><?= $no++; ?></td>
                        <td class="td-text"><?= $row['nama']; ?></td>
                        <td class="td-text"><?= $row['status']; ?></td>
                        <td class="td-text"><?= $row['isi']; ?></td>
                        <td class="td-text"><?= $row['tanggal']; ?></td>
                        <td class="td-text">

                            <a href="../../pages/admin/edit_testimoni.php?id=<?php echo $row['id'] ?>" class="btn-edit">Edit</a>
                            
                            <a href="../../pages/admin/hapus_testimoni.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="btn-hapus">Hapus</a>

                        </td>
                    </tr>
                    <?php   
                        }
                    } ?>
                    </table>
                </div>
            </section>
            <div class="tombol-tambah">
                <a href="../../pages/admin/tambah_testimoni1.php"><button class="tambah"><p>Tambah Testimoni</p></button></a>                   
            </div>


        </main>
</body>
</html>

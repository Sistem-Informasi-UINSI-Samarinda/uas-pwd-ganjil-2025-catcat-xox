<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include '../../config/koneksi.php';

$ambilfasilitas = "SELECT * FROM fasilitas ORDER BY id_fasilitas DESC";
$fasilitas = mysqli_query($conn, $ambilfasilitas);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Berkah</title>
    <link rel="stylesheet" href="../../assets/css/admin_dashboard.css">
    <link rel="stylesheet" href="../../assets/css/admin_fasilitas.css">
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
                <div class="table-responsive">
                <div class="card">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Nama Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>

                        <?php 
                        $no = 1;
                        if(mysqli_num_rows($fasilitas) > 0){
                            while($row = mysqli_fetch_assoc($fasilitas)){ 
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_fasilitas']; ?></td>
                            <td><?= substr($row['deskripsi'], 0, 60); ?>...</td>
                            <td>
                            <img src="../../assets/images/fasilitas/<?= $row['gambar']; ?>" width="80">
                            </td>
                            <td>
                            <a href="../../pages/admin/edit_fasilitas.php?id=<?= $row['id_fasilitas']; ?>">EDIT</a> |
                            <a href="../../pages/admin/hapus_fasilitas.php?id=<?= $row['id_fasilitas']; ?>" 
                                onclick="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                HAPUS
                            </a>
                            </td>
                        </tr>
                    <?php   
                        }
                    } ?>
                    </table>
                </div>
                </div>


                <div class="btn-container">
                    <a href="tambahfasilitas_admin.php" class="btn-tambah"> + Tambah Fasilitas </a>
                </div>

            </section>


        </main>
</body>
</html>

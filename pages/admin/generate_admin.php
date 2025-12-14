<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

include '../../config/koneksi.php';
$tes = "SELECT * FROM admin";
$kategori = mysqli_query($conn, $tes);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kos Nyaman</title>
    <link rel="stylesheet" href="../../assets/css/admin_dashboard.css">
    <link rel="stylesheet" href="../../assets/css/admin_generate.css">
    <script src="../../assets/js/admin_form.js"></script>
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
                <li><a href="../../pages/admin/logout_admin.php" class="menu-link" >Logout</a></li>
            </ul>
        </aside>
    
    <div class="main-content">
        
        <!-- generate admin -->
        <div class="container">
            <h2>Admin Registration</h2>

            <form action="" method="POST" enctype="multipart/form-data">
                
                <label for="username">Username</label> 
                <input type="text" name="username" id="username" placeholder="Masukan username" required>

                <label for="password">Password</label>
                <div class="password-klik">
                    <input type="password" name="password" id="password" placeholder="Masukan password" required>
                    <span class="icon-mata"
                        onmousedown="tampilkan_password()"
                        onmouseup="sembunyikan_password()"
                        onmouseleave="sembunyikan_password()"> 👁 </span>          
                </div>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukan Email" required>

                <div class="tombol_submit">
                    <button type="submit" name="daftar">Daftar</button>
                </div>
                
            </form>
        </div>

        <?php 
            if(isset($_POST['daftar'])){
                $admin_username = $_POST['username'];
                $admin_password = password_hash ($_POST ['password'], PASSWORD_DEFAULT);
                $admin_email = $_POST['email'];

                $query = "
                    INSERT INTO admin (username, password, email )
                    VALUES ('$admin_username', '$admin_password', '$admin_email')
                    ";

                if(mysqli_query($conn, $query)){
                    echo "<script>
                        alert('pendaftaran berhasil');
                    </script>";
                }
                else{
                    echo "<script>
                        alert('pendaftaran gagal!!');
                    </script>";
                }
            }
        ?> 
    </div>
    
        
             
</body>
</html>

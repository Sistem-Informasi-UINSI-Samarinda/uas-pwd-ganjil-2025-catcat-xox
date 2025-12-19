<?php 
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../pages/admin/login_admin.php");
    exit();
}

include '../../config/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM fasilitas WHERE id_fasilitas = '$id'";

    // jika berhasil hapus
    if(mysqli_query($conn, $query)){
        header("Location: ../../pages/admin/fasilitas_admin.php");
        exit();
    }
    // jika gagal hapus
    else{
        header("Location: ../../pages/admin/fasilitas_admin.php");
        exit();
    }
} else{
    // Jika id fasilitas tidak ditemukan
    header("Location: fasilitas.php");
    exit();
}
?>

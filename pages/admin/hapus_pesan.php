<?php 
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../pages/admin/login_admin.php");
    exit();
}

include '../../config/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM saran_masukan WHERE id = '$id'";

    // jika berhasil hapus
    if(mysqli_query($conn, $query)){
        header("Location: ../../pages/admin/pesan_admin.php");
        exit();
    }
    // jika gagal hapus
    else{
        header("Location:  ../../pages/admin/pesan_admin.php");
        exit();
    }
} else{
    // Jika id kategori tidak ditemukan
    header("Location:  ../../pages/admin/pesan_admin.php");
        exit();
}

?>
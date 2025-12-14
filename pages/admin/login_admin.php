<?php 
session_start();
include '../../config/koneksi.php';
?>

<?php include '../../includes/meta.php'; ?>
<?php include '../../includes/header.php'; ?>
<link rel="stylesheet" href="../../assets/css/admin_login.css">
<link rel="stylesheet" href="../../assets/css/user_header-footer.css">
<script src="../../assets/js/admin_form.js"></script>

 <?php
    if(isset($_POST['login'])){
        $input = $_POST['username'];
        $password = $_POST['password'];

        if(filter_var($input, FILTER_VALIDATE_EMAIL)){
            $query= "SELECT * FROM admin WHERE email ='$input'";
        }else{
             $query= "SELECT * FROM admin WHERE username ='$input'";
        }
        
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])){
                $_SESSION['admin'] = $row['username'];
                $_SESSION['email'] = $row['email'];

                header("location: dashboard_admin.php");
                exit();
            }
            else {
                "<div class='login-gagal'>Password salah!</div>";
            }
        }
        else{
            echo "<div class='login-gagal'>Username atau email tidak ditemukan!</div>";
        }
    }
?>

    <div class="container">
        <div class="login-menu">
            <h2>Login Admin</h2>
            <p class="judul">Masukkan username & password anda</p>

            <form method="post">

                <div class="input-data">
                    <label><p>Username</p></label>
                    <input type="text" name="username" placeholder="Masukkan username...">
                
                    <label><p>Password</p></label>
                    <input type="password" name="password" placeholder="Masukkan password...">
                </div>

                <button class="tombol-login" name="login">Masuk</button>

            </form>

        </div>
    </div>

<?php include '../../includes/footer.php'; ?>
<?php include '../../includes/meta.php'; ?>
    <link rel="stylesheet" href="../../assets/css/user_contact.css">  
<?php include '../../includes/header.php'; ?>

<?php
include '../../config/koneksi.php';
$tes = "SELECT * FROM saran_masukan";
$kategori = mysqli_query($conn, $tes);
?>

<!-- isi - mulai  -->


<section class="contact-hal3">

    <div class="informasi-contact">
        <div class="head">
            <h1>Hubungi Kami</h1>
            <h3>kami senang mendengar dari anda! silahkan hubungi kami untuk pertanyaan seputar kamar kos, ketersediaan, atau kerja sama.</h3> 
        </div>

            <ul>
                <li class="informasi-grid">
                    <i class="fa-solid fa-location-dot" id="icon-contact"></i>
                    <p class="teks-maju-contact">Alamat : <br> Mawar No. 45, Kota Saranjana</p>
                </li>
                <li class="informasi-grid">
                    <i class="fa-solid fa-phone" id="icon-contact"></i>
                    <p>Nomor Telepon / WhatsApp : <br> 0812-3345-4453</p>
                </li>
                <li class="informasi-grid">
                    <i class="fa-solid fa-envelope" id="icon-contact"></i>
                    <p>Email : <br> Kosberkah22@gmail.com</p>
                </li>
                <li class="informasi-grid">
                    <i class="fa-solid fa-clock" id="icon-contact"></i>
                    <p>Jam Operasional : <br>08.00 - 21.00 WITA</p>
                </li>
            </ul>
        </div>

        <div class="grid-contact" >
            <div class="grid-form">
                <h2 class="judul-iframe">Saran & Masukan</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder=" Nama " class="isi-form" name="nama" required ><br>

                    <input type="text" placeholder=" Email " class="isi-form" name="email" required ><br>

                    <input type="text" placeholder=" Nomor HP "class="isi-form" name= "hp" required ><br>

                    <textarea name="pesan" placeholder="masukan teks...." rows="10" class="isi-form" required ></textarea>

                    <button type="submit" class="button" name="kirim">Kirim</button>
                </form>
            </div>

            <div class="grid-iframe">
                <h2 class="judul-iframe">Maps Location</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7979.266786919389!2d117.13142694626528!3d-0.551648920839452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1761489932314!5m2!1sid!2sid" class="iframe"></iframe>
            </div>
        </div>

        <div class="medsos-contact">
            <h2>Ikuti Kami di :</h2>
            <div class="icon-medsos">
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram" id="icon-medsos"></i></a>
                <a href="https://web.facebook.com/"><i class="fa-brands fa-facebook" id="icon-medsos"></i></a>
                <a href="https://web.whatsapp.com/"><i class="fa-brands fa-whatsapp" id="icon-medsos"></i></a>
                
                
            </div>  
        </div> <br>

    </div>

    <div id="notif_saran" class="notif_saran"></div>

</section>

<!-- isi - selesai  -->

<script src="../../assets/js/admin_form.js"></script>

<?php 

    if(isset($_POST['kirim'])){
        $nama = $_POST['nama'];
        $email = $_POST ['email'];
        $hp = $_POST['hp'];
        $pesan = $_POST['pesan'];

        $query = "
            INSERT INTO saran_masukan (nama, email, hp, pesan )
            VALUES ('$nama', '$email', '$hp', '$pesan')
            ";

        if(mysqli_query($conn, $query)){
            echo "<script> showNotif();
            </script>";
        }
        else{
            echo "<script>
                alert('pendaftaran gagal!!');
            </script>";
        }
    }
    
?>

<?php include '../../includes/footer.php'; ?>


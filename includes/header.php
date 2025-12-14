</head> 
<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- header dan navigasi - mulai -->
<body>
    <header>

        <div class="logo">

            <img src="../../assets/images/ikon_kos.png" alt="ikon_kos" class="ikon_kos">
            <div class="namakos"><h3>KOS BERKAH</h3></div>
           
        </div>

        <!-- <nav>
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="hamburger"  > <i class="fa-solid fa-bars"> </i> </label>
            <ul>
                <li><a href="../../index.php" class="nav-link active">Home</a></li>
                <li><a href="../../pages/users/Facilities.php" class="nav-link">Fasilitas</a></li>
                <li><a href="../../pages/users/Contact.php" class="nav-link">Contact</a></li>
                <li><a href="../../pages/users/About.php" class="nav-link">About</a></li>
                <li><a href="../../pages/admin/login_admin.php" class="nav-link">Admin</a></li>
            </ul>
        </nav> -->

        <nav>
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="hamburger">
                <i class="fa-solid fa-bars"></i>
            </label>

            <ul>
                <li>
                    <a href="../../index.php"
                    class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?>">
                    Home
                    </a>
                </li>

                <li>
                    <a href="../../pages/users/Facilities.php"
                    class="nav-link <?= ($current_page == 'Facilities.php') ? 'active' : '' ?>">
                    Fasilitas
                    </a>
                </li>

                <li>
                    <a href="../../pages/users/Contact.php"
                    class="nav-link <?= ($current_page == 'Contact.php') ? 'active' : '' ?>">
                    Contact
                    </a>
                </li>

                <li>
                    <a href="../../pages/users/About.php"
                    class="nav-link <?= ($current_page == 'About.php') ? 'active' : '' ?>">
                    About
                    </a>
                </li>

                <li>
                    <a href="../../pages/admin/login_admin.php"
                    class="nav-link <?= ($current_page == 'login_admin.php') ? 'active' : '' ?>">
                    Admin
                    </a>
                </li>
            </ul>
        </nav>

        
    </header>

<!-- header dan navigasi - selesai -->
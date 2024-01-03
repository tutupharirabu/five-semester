<?php
    session_start();
    if($_SESSION['nama_lengkap']=='') {

        header("location: login.php");

    }
?>

Selamat Datang Users! <?php echo $_SESSION['nama_lengkap']?>

<a href="logout.php"> Logout </a>
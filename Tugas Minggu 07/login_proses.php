<?php

    include "koneksi.php";
    $connection = mysqli_connect($server, $username, $password, $database);

    $username   = $_POST['username'];
    $password   = md5($_POST['password']);

    $user = mysqli_query($connection, "select * from users where username = '$username' AND password = '$password'");
    $check = mysqli_num_rows($user);

    if($check > 0) {

        session_start();
        $row = mysqli_fetch_array($user);
        $_SESSION['nama_lengkap'] = $row['nama_lengkap'];

        if ($password == md5('Admin')) {
            header("location: welcome_admin.php");
        } else {
            header("location: welcome_users.php");
        }

    } else {

        header("location: login.php");

    }
?>
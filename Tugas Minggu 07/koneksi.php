<?php

    $server     = 'localhost';
    $username   = 'root';
    $password   = '';
    $database   = 'db_tugas';

    $connection = mysqli_connect($server, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully";
    }
?>

<?php
    $host   = "localhost";
    $user   = "root";
    $pass    = "";
    $dbName = "pabw";
    $koneksi = mysqli_connect($host, $user, $pass, $dbName);

    if (mysqli_connect_errno()) {
        echo "Gagal melakukan koneksi ke database: ".mysqli_connect_error();
    }
?>
<?php 
    include "koneksi.php";
    session_start();

    if (!$_SESSION['isLoggedIn']) {
        header("location: index.php");
        exit();
    } 

    $nama_penulis = $_POST['nama_penulis'];
    $negara = $_POST['negara'];


    $dbh = $koneksi->prepare("INSERT INTO penulis(nama_penulis, negara) VALUES (?,?)");

    $dbh->execute([$nama_penulis,$negara]);

    header("location: homepage.php");
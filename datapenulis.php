<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header("location: login.php");
    exit();
}
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penulis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="bg-primary text-white py-3">
        <!-- Navbar dengan warna biru -->
        <div class="container">
            <h1 class="text-center">Data Penulis</h1>
        </div>
    </header>
    <div class="container mt-5">
        <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">Data berhasil disimpan!</div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penulis</th>
                    <th>Negara</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $koneksi->query("SELECT * FROM penulis");
                $no = 1;
                while ($penulis = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                    <th scope="row"><?php echo $no ?></th>
                    <td><?php echo $penulis['nama_penulis'] ?></td>
                    <td><?php echo $penulis['negara'] ?></td>
                   
                </tr>
                <?php

                $no++;
             }
                 ?>
            </tbody>
        </table>
        <a href="inputpenulis.php" class="btn btn-primary">Tambah Penulis</a>
        <a href="homepage.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>

</html>
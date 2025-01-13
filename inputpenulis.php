<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Penulis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="bg-primary text-white py-3">
        <!-- Navbar dengan warna biru -->
        <div class="container">
            <h1 class="text-center">Input Penulis</h1>
        </div>
    </header>
    <div class="container mt-5">
        <form action="proses_penulis.php" method="POST">
            <div class="mb-3">
                <label for="nama_penulis" class="form-label">Nama Penulis</label>
                <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" required>
            </div>
            <div class="mb-3">
                <label for="negara" class="form-label">Negara</label>
                <input type="text" class="form-control" id="negara" name="negara" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="homepage.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>
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
    <title>Homepage</title>

    <!-- CDN BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CDN JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <nav class="d-flex gap-3">
                <a href="homepage.php" class="text-white text-decoration-none">Beranda</a>
                <a href="inputbuku.php" class="text-white text-decoration-none">Input Buku</a>
                <a href="inputpenulis.php" class="text-white text-decoration-none">Input Penulis</a>
                <a href="datapenulis.php" class="text-white text-decoration-none">Data Penulis</a>
            </nav>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-light">Logout</a>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row">
            <table class="table table-bordered" border="1">
                <thead>
                    <tr class="table-success">
                        <th scope="col">No</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Nama Penulis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $query = $koneksi->query("
                            SELECT buku.id AS id, buku.judul AS judul, buku.tahun AS tahun, penulis.nama_penulis AS penulis 
                            FROM buku 
                            INNER JOIN penulis ON buku.id_penulis = penulis.id_penulis 
                            WHERE buku.isdel = 0
                        ");
                    } catch (PDOException $e) {
                        die("Terjadi kesalahan: " . $e->getMessage());
                    }

                    $no = 1;
                    while ($bukus = $query->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $no ?></th>
                        <td><?php echo htmlspecialchars($bukus['judul']) ?></td>
                        <td><?php echo htmlspecialchars($bukus['tahun']) ?></td>
                        <td><?php echo htmlspecialchars($bukus['penulis']) ?></td>
                        <td>
                            <a class="btn btn-primary" href="edit.php?id=<?php echo $bukus['id'] ?>">Edit</a>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $bukus['id'] ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_penulis = $_POST['nama_penulis'] ?? '';
    $negara = $_POST['negara'] ?? '';

    // Validasi data
    if (empty($nama_penulis) || empty($negara)) {
        die("Nama penulis dan negara harus diisi!");
    }

    // Simpan ke database
    try {
        $stmt = $koneksi->prepare("INSERT INTO penulis (nama_penulis, negara) VALUES (:nama_penulis, :negara)");
        $stmt->execute([
            ':nama_penulis' => $nama_penulis,
            ':negara' => $negara
        ]);
        header("Location: datapenulis.php?success=1");
        exit();
    } catch (PDOException $e) {
        die("Gagal menyimpan data: " . $e->getMessage());
    }
} else {
    header("Location: inputpenulis.php");
    exit();
}
?>
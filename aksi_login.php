<?php
    include "koneksi.php";

    // Pastikan inputan aman dari SQL Injection
    $mail = isset($_POST['email']) ? trim($_POST['email']) : '';
    $pass = isset($_POST['password']) ? trim($_POST['password']) : '';

    try {
        // Siapkan query menggunakan prepared statement untuk keamanan
        $stmt = $koneksi->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $mail, PDO::PARAM_STR);
        $stmt->execute();

        // Cek apakah ada user dengan email yang diberikan
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifikasi password
            if ($pass === $user['password']) { // Menggunakan string comparison karena password di database belum di-hash
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['userid'] = $user['id'];
                $_SESSION['isLoggedIn'] = true;

                // Redirect ke homepage
                header("Location: homepage.php");
                exit;
            } else {
                echo "Password salah. Silakan cek kembali.";
            }
        } else {
            echo "Email tidak ditemukan.";
        }
    } catch (PDOException $e) {
        // Menangkap error database untuk debugging
        die("Terjadi kesalahan: " . $e->getMessage());
    }
?>
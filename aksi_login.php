<?php
include "koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];

$dbh = $koneksi->query("select * from users where email = '" . $email . "'");

if ($dbh->rowcount() == 1) {
    $users = $dbh->fetch(PDO::FETCH_ASSOC);

    if (password_verify($password, $users['password'])) {
        session_start();
        $_SESSION['username'] = $users['username'];
        $_SESSION['userid'] = $users['id'];
        $_SESSION['isLoggedIn'] = true;
        header("location: homepage.php");

        echo "<script>alert('selamat datang ".$users['username']."');</script>";
    }
    else{
        echo "<script>alert('password salah ".$users['username']."');</script>";
    }
}

?>
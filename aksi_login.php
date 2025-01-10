<?php
    include "koneksi.php";

    $mail = $_POST['email'];
    $pass = $_POST['password'];

    $dbh = $koneksi->query("select * from user where email = '".$mail."'");

        if($dbh->rowcount()==1)
        {
            $user = $dbh->fetch(PDO::FETCH_ASSOC);

            if(password_verify($pass,$user['password']))
            {
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['userid'] = $user['id'];
                $_SESSION['isLoggedIn']=true;
                header("location: homepage.php");
            }
            else
            {
                echo "Cek email dan Password"; 
            }
        }
        else
         {
            echo "User tidak ditemukan";
        }
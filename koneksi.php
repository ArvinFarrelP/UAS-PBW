<?php

try{
    $koneksi = new PDO("mysql:host=localhost;
    dbname=",'root','');
}
catch(PDOException $e){
    echo "Koneksi gagal", $e->getMessage();
}


?>
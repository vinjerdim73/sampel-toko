<?php

require "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
$jumlah_data = mysqli_num_rows($query);

if ($jumlah_data == 1) {
    $data = mysqli_fetch_array($query);

    $password_benar = password_verify($password, $data["password"]);
    if ($password_benar) {
        session_start();
        $_SESSION["username"] = $data["username"];
        $_SESSION["level"] = $data["level"];
        header("location: home.php");
    } else {
        echo "Username atau password tidak valid";
    }
} else {
    echo "Username tidak ditemukan";
}

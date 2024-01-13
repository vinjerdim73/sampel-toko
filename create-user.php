<?php

require "koneksi.php";

// username, password, dan level diambil dari new-user.php
$username = $_POST["username"];
// khusus password di-encrypt
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$level = $_POST["level"];

$sql = "INSERT INTO user (username, password, level) VALUES ('$username', '$password', '$level')";
mysqli_query($koneksi, $sql);

// cek adakah error ketika menjalankan SQL
if (mysqli_error($koneksi)) {
    // jika ada error tampilkan
    echo mysqli_error($koneksi);
} else {
    // jika tidak ada error, pindah ke user.php
    header("location: user.php");
}

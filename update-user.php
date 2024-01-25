<?php

require "koneksi.php";

session_start();

if ($_POST["id"] == $_SESSION["id"]) {
    echo "Tidak bisa edit user yang sedang aktif";
    exit;
}

// id, username, password, dan level diambil dari read-user.php
$id = $_POST["id"];
$username = $_POST["username"];
$level = $_POST["level"];

// password diisi dulu dengan password sebelumnya
$password = $_POST["old_password"];

// hapus (trim) karakter spasi dari password baru
$new_password = trim($_POST["password"]);
if (strlen($new_password) > 0) {
    // jika password baru tidak kosong, password di-encrypt
    //lalu menimpa password sebelumnya
    $password = password_hash($new_password, PASSWORD_DEFAULT);
}

$sql = "UPDATE user SET username = '$username', password = '$password', level = '$level' WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: user.php");
}

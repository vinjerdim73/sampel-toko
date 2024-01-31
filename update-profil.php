<?php

require "koneksi.php";

// id, new_password, confirm_password diambil dari profil.php
$id = $_POST["id"];
// hapus (trim) karakter spasi dari password baru
$new_password = trim($_POST["new_password"]);
$confirm_password = trim($_POST["confirm_password"]);

// bandingkan (strcmp) new password dan konfirmasinya
if (strcmp($new_password, $confirm_password) != 0) {
    echo "Password baru dan konfirmasinya tidak sama";
    exit;
}

$password = password_hash($new_password, PASSWORD_DEFAULT);

$sql = "UPDATE user SET password = '$password' WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: home.php");
}

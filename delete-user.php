<?php

require "koneksi.php";

// id diambil dari tombol Hapus yang ditekan di user.php
$id = $_POST["id"];

$sql = "DELETE FROM user WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: user.php");
}

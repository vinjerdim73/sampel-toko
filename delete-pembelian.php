<?php

require "koneksi.php";

session_start();

if ($_SESSION["level"] != "admin") {
    // hanya admin yang bisa menghapus pembelian
    echo "Anda tidak dapat menghapus data ini";
    exit;
}

// id diambil dari tombol Hapus yang ditekan di pembelian.php
$id = $_POST["id"];

$sql = "DELETE FROM pembelian WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: pembelian.php");
}

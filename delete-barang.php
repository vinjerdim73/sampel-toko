<?php

require "koneksi.php";

session_start();

if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "logistik") {
    // jika di sesi ini levelnya bukan admin atau bukan logistik, akses ditolak
    echo "Anda tidak dapat menghapus barang";
    exit;
}

// id diambil dari tombol Hapus yang ditekan di barang.php
$id = $_POST["id"];

$sql = "DELETE FROM barang WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: barang.php");
}

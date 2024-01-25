<?php

require "koneksi.php";

// nama, kategori, stok, harga_jual, harga_beli diambil dari new-barang.php
$nama = $_POST["nama"];
$kategori = $_POST["kategori"];
$stok = $_POST["stok"];
$harga_beli = $_POST["harga_beli"];
$harga_jual = $_POST["harga_jual"];

$sql = "INSERT INTO barang (nama, kategori, stok, harga_jual, harga_beli) VALUES ('$nama', '$kategori', '$stok', '$harga_jual', '$harga_beli')";
mysqli_query($koneksi, $sql);

// cek adakah error ketika menjalankan SQL
if (mysqli_error($koneksi)) {
    // jika ada error tampilkan
    echo mysqli_error($koneksi);
} else {
    // jika tidak ada error, kembali ke barang.php
    header("location: barang.php");
}

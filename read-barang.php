<!DOCTYPE html>
<html>

<head>
    <title>Read Barang</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    // halaman ini boleh diakses oleh semua level

    require "koneksi.php";

    // id diambil dari tombol Lihat yang ditekan di barang.php
    $id = $_GET["id"];

    // cari barang yang memiliki id tersebut
    $sql = "SELECT * FROM barang WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    // ambil data barang
    $barang = mysqli_fetch_array($query);
    ?>

    <div>
        <form action="update-barang.php" method="POST">
            <h1>Lihat Barang</h1>

            <!-- id barang disembunyikan untuk keperluan update -->
            <input type="hidden" name="id" value="<?= $id ?>">

            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?= $barang["nama"] ?>"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori">
                            <option value="makanan" <?= $barang["kategori"] == "makanan" ? "selected" : "" ?>>makanan</option>
                            <option value="minuman" <?= $barang["kategori"] == "minuman" ? "selected" : "" ?>>minuman</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok" value="<?= $barang["stok"] ?>"></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="number" name="harga_beli" value="<?= $barang["harga_beli"] ?>"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="number" name="harga_jual" value="<?= $barang["harga_jual"] ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">RESET</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
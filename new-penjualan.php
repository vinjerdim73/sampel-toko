<!DOCTYPE html>
<html>

<head>
    <title>New Penjualan</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "keuangan") {
        // jika di sesi ini levelnya bukan admin atau bukan keuangan, akses ditolak
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }
    ?>

    <?php
    require "koneksi.php";

    // ambil semua data barang untuk ditampilkan sebagai pilihan
    $sql = "SELECT * FROM barang";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <!-- atribut penjualan dikirim ke create-penjualan.php -->
        <form action="create-penjualan.php" method="POST">
            <h1>Tambah Penjualan</h1>
            <table>
                <tr>
                    <td>Barang</td>
                    <td>
                        <select name="id_barang">
                            <?php while ($barang = mysqli_fetch_array($query)) : ?>
                                <option value='<?= $barang["id"] ?>'>
                                    <?= $barang["nama"] ?>, harga: <?= $barang["harga_jual"] ?>, stok: <?= $barang["stok"] ?>
                                </option>
                            <?php endwhile ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td><input type="number" min="0" name="jumlah"></td>
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
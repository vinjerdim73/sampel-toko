<!DOCTYPE html>
<html>

<head>
    <title>Read Pembelian</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    // halaman ini boleh diakses oleh semua level

    require "koneksi.php";

    // id diambil dari tombol Lihat yang ditekan di pembelian.php
    $id = $_GET["id"];

    // cari pembelian yang memiliki id tersebut
    $sql = "SELECT pembelian.id, barang.nama as nama_barang, pembelian.jumlah, pembelian.total_harga, user.username, pembelian.created_at FROM barang JOIN pembelian on barang.id = pembelian.id_barang JOIN user ON user.id = pembelian.id_staff WHERE pembelian.id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $pembelian = mysqli_fetch_array($query);
    ?>

    <div>
        <h1>Lihat Pembelian</h1>
        <table>
            <tr>
                <td>Nama barang</td>
                <td><input readonly type="text" value="<?= $pembelian["nama_barang"] ?>"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input readonly type="text" value="<?= $pembelian["jumlah"] ?>"></td>
            </tr>
            <tr>
                <td>Total harga</td>
                <td><input readonly type="text" value="<?= $pembelian["total_harga"] ?>"></td>
            </tr>
            <tr>
                <td>Diinput oleh</td>
                <td><input readonly type="text" value="<?= $pembelian["username"] ?>"></td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td><input readonly type="text" value="<?= $pembelian["created_at"] ?>"></td>
            </tr>
        </table>
    </div>
</body>

</html>
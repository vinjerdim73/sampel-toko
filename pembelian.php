<!DOCTYPE html>
<html>

<head>
    <title>Pembelian</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    // halaman ini boleh diakses oleh semua level

    require "koneksi.php";

    // cari semua pembelian dari database
    $sql = "SELECT pembelian.id, barang.nama as nama_barang, pembelian.jumlah, pembelian.total_harga, user.username, pembelian.created_at FROM barang JOIN pembelian on barang.id = pembelian.id_barang JOIN user ON user.id = pembelian.id_staff ORDER BY pembelian.created_at DESC";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data Pembelian</h1>
        <form action="new-pembelian.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Diinput oleh</th>
                <th>Waktu</th>
                <th colspan="2">Aksi</th>
            </tr>
            <!-- ambil (fetch) data pembelian satu per satu, lalu tampilkan -->
            <?php $i = 1; ?>
            <?php while ($pembelian = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $pembelian["nama_barang"] ?></td>
                    <td><?= $pembelian["jumlah"] ?></td>
                    <td><?= $pembelian["total_harga"] ?></td>
                    <td><?= $pembelian["username"] ?></td>
                    <td><?= $pembelian["created_at"] ?></td>
                    <td>
                        <form action="read-pembelian.php" method="GET">
                            <input type="hidden" name="id" value='<?= $pembelian["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-pembelian.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $pembelian["id"] ?>'>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endwhile ?>
        </table>
    </div>
    <script>
        // tampilkan konfirmasi sebelum hapus
        function konfirmasi(form) {
            formData = new FormData(form);
            id = formData.get("id");
            return confirm(`Hapus pembelian '${id}'?`);
        }
    </script>
</body>

</html>
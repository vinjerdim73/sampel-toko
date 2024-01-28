<!DOCTYPE html>
<html>

<head>
    <title>Penjualan</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    // halaman ini boleh diakses oleh semua level

    require "koneksi.php";

    // cari semua penjualan dari database
    $sql = "SELECT penjualan.id, barang.nama as nama_barang, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at FROM barang JOIN penjualan on barang.id = penjualan.id_barang JOIN user ON user.id = penjualan.id_staff ORDER BY penjualan.created_at DESC";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data Penjualan</h1>
        <form action="new-penjualan.php" method="GET">
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
            <!-- ambil (fetch) data penjualan satu per satu, lalu tampilkan -->
            <?php $i = 1; ?>
            <?php while ($penjualan = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $penjualan["nama_barang"] ?></td>
                    <td><?= $penjualan["jumlah"] ?></td>
                    <td><?= $penjualan["total_harga"] ?></td>
                    <td><?= $penjualan["username"] ?></td>
                    <td><?= $penjualan["created_at"] ?></td>
                    <td>
                        <form action="read-penjualan.php" method="GET">
                            <input type="hidden" name="id" value='<?= $penjualan["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-penjualan.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $penjualan["id"] ?>'>
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
            return confirm(`Hapus penjualan '${id}'?`);
        }
    </script>
</body>

</html>
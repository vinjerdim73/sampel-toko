<nav>
    <ul>
        <?php if ($_SESSION["level"] == "admin") : ?>
            <li>MASTER
                <ul>
                    <li><a href="user.php">User</a></li>
                    <li><a href="barang.php">Barang</a></li>
                </ul>
            </li>
        <?php endif ?>
        <li>TRANSAKSI
            <ul>
                <li><a href="penjualan.php">Penjualan</a></li>
                <li><a href="pembelian.php">Pembelian</a></li>
            </ul>
        </li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
</nav>
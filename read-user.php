<!DOCTYPE html>
<html>

<head>
    <title>Read User</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "admin") {
        // jika di sesi ini levelnya bukan admin, akses ditolak
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }

    require "koneksi.php";

    // id diambil dari tombol Lihat yang ditekan di user.php
    $id = $_GET["id"];

    // cari user yang memiliki id tersebut
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    // ambil data user
    $user = mysqli_fetch_array($query);
    ?>

    <div>
        <form action="update-user.php" method="POST">
            <h1>Lihat User</h1>

            <!-- id dan password lama user disembunyikan untuk keperluan update -->
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="old_password" value="<?= $user["password"] ?>">

            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?= $user["username"] ?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <select name="level">
                            <option value="admin" <?= $user["level"] == "admin" ? "selected" : "" ?>>admin</option>
                            <option value="keuangan" <?= $user["level"] == "keuangan" ? "selected" : "" ?>>keuangan</option>
                            <option value="logistik" <?= $user["level"] == "logistik" ? "selected" : "" ?>>logistik</option>
                        </select>
                    </td>
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
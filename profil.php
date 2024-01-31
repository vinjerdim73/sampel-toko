<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php

    require "koneksi.php";

    // id diambil dari sesi login
    $id = $_SESSION["id"];

    // cari user yang memiliki id tersebut
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    // ambil data user
    $user = mysqli_fetch_array($query);
    ?>

    <div>
        <form action="update-profil.php" method="POST">
            <h1>Profil</h1>

            <!-- id user disembunyikan untuk keperluan update -->
            <input type="hidden" name="id" value="<?= $id ?>">

            <table>
                <tr>
                    <td>Username</td>
                    <td><input readonly type="text" name="username" value="<?= $user["username"] ?>"></td>
                </tr>
                <tr>
                    <td>Password Baru</td>
                    <td><input required type="password" name="new_password"></td>
                </tr>
                <tr>
                    <td>Ulangi Password Baru</td>
                    <td><input required type="password" name="confirm_password"></td>
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
<?php
    session_start();

    if (!array_key_exists("username", $_SESSION)) {
        // jika di sesi ini tidak ada username yang aktif
        // proses ke logout
        header("location:logout.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <?php
        include "menu.php";
    ?>
</body>
</html>
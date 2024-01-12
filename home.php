<?php
    session_start();
    if (!$_SESSION["username"]) {
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
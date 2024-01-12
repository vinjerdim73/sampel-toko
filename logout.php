<?php

session_start();

// sesi diakhiri
session_destroy();

// pindah ke halaman login
header("location: login.php");

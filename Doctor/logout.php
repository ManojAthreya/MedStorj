<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:dlogin.php');
}

session_destroy();
header('location:dlogin.php');
?>

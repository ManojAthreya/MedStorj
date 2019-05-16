<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:rlogin.php');
}

session_destroy();
header('location:rlogin.php');
?>

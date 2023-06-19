<?php
ob_start();
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ../view/login.php");
    exit();
}
ob_end_flush();


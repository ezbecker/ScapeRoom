<?php
session_start();
if (isset($_SESSION["email"])) {
    session_destroy();
    session_unset();
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}

<?php
@session_start();
if (isset($_SESSION["email"])) {
    session_destroy();
    session_unset();
    header("Location: ../view/login.php?");
    exit();
} else {
    header("Location: ../view/login.php");
    exit();
}

<?php
if (!isset($_SESSION["email"])) {
    header("Location: ../view/login.php");
    exit();
}?>
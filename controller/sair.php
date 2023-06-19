<?php
session_start();
if (isset($_SESSION["email"])) {
    session_destroy();
    session_unset();

    exit();
} else {

    exit();
}

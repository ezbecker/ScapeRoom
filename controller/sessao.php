<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['pagina'] = $_POST['pagina'];
    $_SESSION['idPuzzle'] = $_POST['idPuzzle'];
}

<?php
session_start();
require_once "../model/pegarIdUsuario.php";
$tempo = $_GET['tempo'];
$idPartida = $_GET['idPartida'];

$query = "UPDATE partida SET tempo = '$tempo' WHERE idPartida = $idPartida";
mysqli_query($conectado, $query);

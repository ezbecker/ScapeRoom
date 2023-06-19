<?php
@session_start();
require_once "../model/pegarIdUsuario.php";
$tempo = $_POST['tempo'];
$idPartida = $_POST['idPartida'];

$query = "UPDATE partida SET tempo = '$tempo' WHERE idPartida = $idPartida";
mysqli_query($conectado, $query);

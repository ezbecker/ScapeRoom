<?php
require_once "conexao.php";

$idPartida = $_POST['idPartida'];

$query = "UPDATE partida SET terminou = 1 WHERE idPartida = $idPartida";
mysqli_query($conectado, $query);

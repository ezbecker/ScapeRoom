<?php
require_once "conexao.php";

$idPartida = $_POST['idPartida'];
$inventario = $_POST['inventario'];
$inventario += 1;
$query = "UPDATE partida SET inventario = $inventario WHERE idPartida = $idPartida";
mysqli_query($conectado, $query);

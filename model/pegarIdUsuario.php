<?php
require_once "conexao.php";

$email = $_SESSION["email"];

$query = "SELECT * FROM usuario WHERE email = '$email'";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $idUsuario = $row["idUsuario"];
    $nome = $row["nome"];
}

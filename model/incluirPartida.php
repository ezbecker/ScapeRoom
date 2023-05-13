<?php
require_once "../model/conexao.php";
session_start();

$email = $_SESSION["email"];

$query = "SELECT idUsuario FROM usuario WHERE email = '$email'";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $idUsuario = $row["idUsuario"];
    $tempo = '00:40:00';
    $terminou = 0;

    $stmt = $conectado->prepare("INSERT INTO partida (idUsuario, tempo, terminou) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $idUsuario, $tempo, $terminou);

    try {
        $stmt->execute();
    } catch (Exception $e) {
        die('Erro ao iniciar partida ' . $e->getMessage());
    }
} else {
    echo "Usuário não encontrado.";
}

mysqli_close($conectado);

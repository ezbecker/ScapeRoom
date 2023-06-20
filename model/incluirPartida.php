<?php
require_once "../model/conexao.php";
//session_start();
$email = 'larissapretto009w@gmail.com';
$query = "SELECT * FROM usuario WHERE email = '$email'";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $idUsuario = $row["idUsuario"];
    $nome = $row["nome"];
}

if (mysqli_num_rows($result) === 1) {
    $tempo = '00:40:00';
    $inv = 0;
    $terminou = 0;

    $stmt = $conectado->prepare("INSERT INTO partida (idUsuario, tempo, inventario, terminou) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $idUsuario, $tempo, $inv, $terminou);

    try {
        $stmt->execute();
    } catch (Exception $e) {
        die('Erro ao iniciar partida ' . $e->getMessage());
    }
}

mysqli_close($conectado);

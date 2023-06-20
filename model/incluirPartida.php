<?php
//session_start();
require_once "../model/pegarIdUsuario.php";

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

<?php
require_once "../model/pegarIdUsuario.php";

if (mysqli_num_rows($result) === 1) {
    $tempo = '00:40:00';
    $terminou = 0;

    $stmt = $conectado->prepare("INSERT INTO partida (idUsuario, tempo, terminou) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $idUsuario, $tempo, $terminou);

    try {
        $stmt->execute();
    } catch (Exception $e) {
        die('Erro ao iniciar partida ' . $e->getMessage());
    }
}

mysqli_close($conectado);

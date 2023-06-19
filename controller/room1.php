<?php
require_once "../model/incluirPartida.php";
?>

<body onload="redirecionarPagina(paginaSelecionada, idPuzzleSelecionado)">
    <script src="../js/trocarCenario.js"></script>
</body>

<script>
    var puzzle = [
        "1"
    ];
    var index = Math.floor(Math.random() * puzzle.length);
    var paginaSelecionada = 3;
    var idPuzzleSelecionado = puzzle[index];
</script>
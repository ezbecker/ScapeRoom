<?php
require_once "../model/insert_new_game.php";
?>

<body onload="redirecionarPagina(paginaSelecionada, idPuzzleSelecionado)">
    <script src="../js/trocarCenario.js"></script>
</body>

<script>
    var puzzle = [
        "1", "20", "21", "22", "23", "24", "25"
    ];
    var index = Math.floor(Math.random() * puzzle.length);
    var paginaSelecionada = 3;
    var idPuzzleSelecionado = puzzle[index];
</script>
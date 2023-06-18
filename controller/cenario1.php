<?php
require_once "../model/incluirPartida.php";
?>

<body onload="sortearPagina()">

</body>

<script>
    var puzzle = [
        "2"
    ];
</script>

<script>
    function sortearPagina() {
        var index = Math.floor(Math.random() * puzzle.length);
        var paginaSelecionada = 10
        var idPuzzleSelecionado = puzzle[index];

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../controller/sessao.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("pagina=" + paginaSelecionada + "&idPuzzle=" + idPuzzleSelecionado);

        window.location.href = "../view/game.php";
    }
</script>
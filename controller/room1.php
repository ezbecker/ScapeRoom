<?php
require_once "../model/incluirPartida.php";
?>

<body onload="sortearPagina()">

</body>

<script>
    var puzzle = [
        "1"
    ];
</script>

<script>
    function sortearPagina() {
        var index = Math.floor(Math.random() * puzzle.length);
        var paginaSelecionada = 3
        var idPuzzleSelecionado = puzzle[index]; // Coloque o valor correto do idPuzzle aqui

        // Requisição AJAX para definir os valores da página e do idPuzzle na sessão
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../controller/sessao.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("pagina=" + paginaSelecionada + "&idPuzzle=" + idPuzzleSelecionado);

        // Redirecionamento para a página do jogo
        window.location.href = "../view/game.php";
    }
</script>
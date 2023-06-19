<body onload="redirecionarPagina(paginaSelecionada, idPuzzleSelecionado)">
    <script src="../js/trocarCenario.js"></script>
</body>

<script>
    var puzzle = [
        "2"
    ];
    var index = Math.floor(Math.random() * puzzle.length);
    var paginaSelecionada = 10;
    var idPuzzleSelecionado = puzzle[index];
</script>
<body onload="redirecionarPagina(paginaSelecionada, idPuzzleSelecionado)">
    <script src="../js/trocarCenario.js"></script>
</body>

<script>
    var puzzle = [
        "3"
    ];
    var index = Math.floor(Math.random() * puzzle.length);
    var paginaSelecionada = 24;
    var idPuzzleSelecionado = puzzle[index];
</script>
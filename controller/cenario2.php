<body onload="redirecionarPagina(paginaSelecionada, idPuzzleSelecionado)">
    <script src="../js/trocarCenario.js"></script>
</body>

<script>
    var puzzle = [
        "3"
        // , "4", "5", "6", "7", "8", "9", "10", "11", "12", "13"
    ];
    var index = Math.floor(Math.random() * puzzle.length);
    var paginaSelecionada = 24;
    var idPuzzleSelecionado = puzzle[index];
</script>
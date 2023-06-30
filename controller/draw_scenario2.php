<body onload="redirecionarPagina(paginaSelecionada, idPuzzleSelecionado)">
    <script src="../js/trocarCenario.js"></script>
</body>

<script>
    var puzzle = [
        "2", //"14", "15", "16", "17", "18", "19"
    ];
    var index = Math.floor(Math.random() * puzzle.length);
    var paginaSelecionada = 10;
    var idPuzzleSelecionado = puzzle[index];
</script>
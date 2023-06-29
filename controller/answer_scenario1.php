<head>
    <?php
    include('../model/conexao.php');

    $respUser = $_POST['respUser'];
    $idPuzzle = $_POST['idPuzzle'];

    $query = ("SELECT * FROM puzzle WHERE idPuzzle = '$idPuzzle'");
    $registro = mysqli_query($conectado, $query);
    while ($registros = mysqli_fetch_array($registro)) {
        $respCorreta = $registros["resposta"];
    }
    if ($respUser == $respCorreta)
        $pagina = 9;
    else
        $pagina = 4;
    ?>
</head>

<body onload="redirecionarPagina(pagina, idPuzzle)">
    <script src="../js/trocarCenario.js"></script>
</body>
<script>
    var pagina = <?php echo $pagina; ?>;
    var idPuzzle = <?php echo $idPuzzle; ?>;
</script>
<head>
    <?php
    session_start();
    include('../model/conexao.php');

    $respUser = $_POST['respUser'];
    $idPuzzle = $_POST['idPuzzle'];
    $paginaArmario = $_POST['paginaArmario'];

    $query = ("SELECT * FROM puzzle natural join cenario2 WHERE idPuzzle = $idPuzzle and paginaPac = $paginaArmario");
    $registro = mysqli_query($conectado, $query);
    while ($registros = mysqli_fetch_array($registro)) {
        $respCorreta = $registros["resposta"];
        $respCorreta2 = $registros["resposta2"];
        $pacienteCodigo = $registros["pacienteCodigo"];
    }
    if ($respUser == $respCorreta && $respUser == $pacienteCodigo)
        $pagina = 49;
    else if ($respUser == $respCorreta2 && $respUser == $pacienteCodigo)
        $pagina = 50;
    else
        $pagina = $_SESSION['pagina'];;
    ?>
</head>

<body onload="redirecionarPagina(pagina, idPuzzle)">
    <script src="../js/trocarCenario.js"></script>
</body>
<script>
    var pagina = <?php echo $pagina; ?>;
    var idPuzzle = <?php echo $idPuzzle; ?>;
</script>
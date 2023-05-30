<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once "../controller/userAutenticado.php";

    $pagina = $_GET['pagina'];
    $idPuzzle = $_GET['idPuzzle'];
    require_once "../model/pegarIdUsuario.php";

    $query = "SELECT * FROM partida WHERE idUsuario = $idUsuario ORDER BY idPartida DESC LIMIT 1";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $tempo = $row["tempo"];
    $idPartida = $row["idPartida"];
    $totalSegundos = array_reduce(explode(':', $tempo), function ($total, $tempo) {
        return $total * 60 + $tempo;
    }, 0);
    ?>

    <link rel="stylesheet" href="css/game.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/areasClicaveis.css">
    <link rel="stylesheet" href="css/frame.css">
</head>

<body>
    
        <div class="data">
            <div class="playing">
                <h1>Jogando</h1>
                <p><?php echo $nome; ?></p>
        </div>

        <?php
        if ($pagina != 1) {
        ?>
            <div class="goal">
                <h1>Objetivo atual</h1>
                <?php
                if ($pagina > 1 && $pagina <= 9)
                    echo '<p>Saia do quarto</p>';
                else if ($pagina >= 10 && $pagina < 22)
                    echo '<p>Descubra o código do elevador</p>';
                ?>
            </div>

            <div class="time">
                <h1>Tempo total restante</h1>
            <?php
            echo '<p id="cronometro"></p>';
        }
            ?>
            </div>
        </div>

        <script>
            var tempoRestante = <?php echo $totalSegundos; ?>;
        </script>

        <div class="iframe-container">
            <?php
            if ($pagina == 1) {
                echo '<img src="../scenarios/menu.gif">';
                echo '<div id="areaClicavel1" onclick="redirecionar1()"></div>';
                echo '<div id="areaClicavel2" onclick="redirecionar2()"></div>';
                echo '<div id="areaClicavel3" onclick="redirecionar3()"></div>';
            } else if ($pagina == 2) {
            }
            require_once "../view/initialRoom.php";
            require_once "../view/cenario1.php";
            ?>

        <style>
            .iframe-container {
                width: 960px;
                height: 540px;
                display: block;
                margin: 0 auto; 
            }
            
            img {
                width: 960px;
                height: 540px;
                border-radius: 16px;
            }
        </style>

</body>

</html>
<script>
    var idPuzzle = <?php echo $idPuzzle; ?>;
    var idPartida = <?php echo $idPartida; ?>;
</script>
<script src="../js/cronometro.js"></script>
<script src="../js/redirecionarPags.js"></script>
<script>
    // menu
    // inicialRoom
    // aplicarEstilos("areaClicavelLivro", "2.90em", "1.11em", "50px", "19.65em");
    // aplicarEstilos("areaClicavelQuadro", "2.90em", "5.11em", "37.84em", "10.65em");
    // aplicarEstilos("areaClicavelPuzzle1", "2.92em", "5.13em", "14.84em", "10.63em");
    // aplicarEstilos("areaClicavelPrancheta1", "2.90em", "5em", "26.84em", "20.65em");
    // corredor
    // aplicarEstilos("room1", "2.90em", "5em", "26.84em", "20.65em");
    // aplicarEstilos("room2", "2.90em", "5em", "20.84em", "40.65em");
    // aplicarEstilos("room3", "2.90em", "5em", "50.84em", "10.65em");
    // aplicarEstilos("room4", "2.90em", "5em", "50.84em", "40.65em");
    // cenario1 - room1
    // aplicarEstilos("areaClicavelPrancheta2", "2.90em", "5em", "26.84em", "20.65em");
    // aplicarEstilos("lixo", "2.90em", "5em", "20.84em", "35.65em");
    // cenario1 - room2
    // aplicarEstilos("areaClicavelPrancheta3", "2.90em", "5em", "26.84em", "35.65em");
    // aplicarEstilos("areaClicavelPapel1", "2.90em", "5em", "26.84em", "20.65em");
    // cenario1 - room3
    // aplicarEstilos("areaClicavelPrancheta4", "2.90em", "5em", "26.84em", "35.65em");
    // cenario1 - room4
    // aplicarEstilos("gaveta", "2.90em", "5em", "26.84em", "35.65em");
    // aplicarEstilos("areaClicavelPrancheta5", "2.90em", "5em", "26.84em", "35.65em");
    // aplicarEstilos("areaClicavelPapel2", "2.90em", "5em", "26.84em", "20.65em");
</script>
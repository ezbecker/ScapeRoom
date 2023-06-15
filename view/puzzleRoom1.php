<?php
include('../model/conexao.php');

$idPuzzle = $_GET['idPuzzle'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <?php
    require_once "../controller/userAutenticado.php";

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
    <script>
        window.onbeforeunload = function() {
            salvarTempo();
        };
    </script>
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

        <div class="goal">
            <h1>Objetivo atual</h1>
            <p>Saia do quarto</p>
        </div>

        <div class="time">
            <h1>Tempo total restante</h1>
            <?php
            echo '<p id="cronometro"></p>'
            ?>
        </div>
    </div>

    <script>
        var tempoRestante = <?php echo $totalSegundos; ?>;
    </script>


    <div class="iframe-container">
        <img src="../scenarios/inicialRoom/input.png">
        <div class="container-fluid">
            <form action="../controller/resposta.php" method="POST">
                <div class="nomeTextField">
                    <input type="text" name="respUser" class="form-control" placeholder="Resposta" required>
                </div>
                <input type="hidden" name="idPuzzle" id="idPuzzle" value="<?php echo $idPuzzle ?>">
                <button type="submit" class="enviar">Enviar</button>
            </form>
        </div>
        <?php
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(4);"></div>';
        ?>
    </div>
</body>

</html>
<script>
    var idPuzzle = <?php echo $idPuzzle; ?>;
    var idPartida = <?php echo $idPartida; ?>;
</script>
<script src="../js/atualizarConteudo.js"></script>
<script src="../js/cronometro.js"></script>
<script src="../js/redirecionarPags.js"></script>
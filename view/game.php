<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Execução do jogo RadioEscape">
    <meta name="keywords" content="scaperoom, radiologia, saúde, jogo, radioescape, radio escape,">
    <link rel="icon" href="../assets/icon.png">
    <title>RadioEscape | Jogando</title>
    <!-- css -->
    <link rel="stylesheet" href="css/game.css">
    <link rel="stylesheet" href="css/ranking.css">
    <link rel="stylesheet" href="css/default-positions.css">
    <link rel="stylesheet" href="css/tutorial-scenario.css">
    <link rel="stylesheet" href="css/first-scenario.css">
    <link rel="stylesheet" href="css/puzzleLixo.css">
    <link rel="stylesheet" href="css/second-scenario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Reem+Kufi&display=swap" rel="stylesheet">
    <!-- audios -->
    <audio id="chuvaJogo" src="../assets/audios/chuvaJogo.mp3"></audio>
    <audio id="chuvaInicio" src="../assets/audios/chuvaInicio.mp3"></audio>
    <audio id="portaAbre" src="../assets/audios/portaAbre.mp3"></audio>
    <audio id="portaFecha" src="../assets/audios/portaFecha.mp3"></audio>
    <audio id="pcLigando" src="../assets/audios/pcLigando.mp3"></audio>
    <audio id="armarioAberto" src="../assets/audios/armarioAberto.mp3"></audio>
    <audio id="win" src="../assets/audios/win.mp3"></audio>
    <audio id="gameOver" src="../assets/audios/gameOver.mp3"></audio>
    <audio id="mouseClick" src="../assets/audios/mouseClick.mp3"></audio>
    <audio id="book" src="../assets/audios/book.mp3"></audio>
    <audio id="postit" src="../assets/audios/postit.mp3"></audio>
</head>

<body>
    <?php
    require_once "../model/conexao.php";

    if (isset($_SESSION['pagina']) && isset($_SESSION['idPuzzle']) && isset($_SESSION['email'])) {
        $pagina = $_SESSION['pagina'];
        $idPuzzle = $_SESSION['idPuzzle'];
        $email = $_SESSION['email'];
    }
    $query = "SELECT * FROM usuario WHERE email = '$email'";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $idUsuario = $row["idUsuario"];
        $nome = $row["nome"];
    }
    if ($pagina != 1 && $pagina != 333 && $pagina != 2) {
        $query = "SELECT * FROM partida WHERE idUsuario = '$idUsuario' ORDER BY idPartida DESC LIMIT 1";
        $stmt = mysqli_prepare($conectado, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $tempo = $row["tempo"];
        $idPartida = $row["idPartida"];
        $inventario = $row["inventario"];
        $totalSegundos = array_reduce(explode(':', $tempo), function ($total, $tempo) {
            return $total * 60 + $tempo;
        }, 0);
    }
    ?>
    <div class="current-game-data">
        <div class="now-playing">
            <h1>Jogando</h1>
            <p><?php echo $nome; ?></p>
        </div>

        <?php
        if ($pagina != 1 && $pagina != 51 && $pagina != 333 && $pagina != 2 && $pagina != 52) {
        ?>
            <script>
                window.onbeforeunload = function() {
                    salvarTempo();
                };
                window.onload = function() {
                    reproduzirAudio('chuvaJogo', true);
                    attachDragEvents();
                };
                var tempoRestante = <?php echo $totalSegundos; ?>;
                var idPartida = <?php echo $idPartida; ?>;
                var inventario = <?php echo $inventario; ?>;
            </script>
            <div class="current-goal">
                <h1>Objetivo atual</h1>
                <?php
                if ($pagina >= 0 && $pagina <= 9)
                    echo '<p>Saia do quarto</p>';
                else if ($pagina >= 10 && $pagina <= 23)
                    echo '<p>Descubra o código do elevador</p>';
                else if ($pagina >= 24 && $pagina <= 50)
                    echo '<p>Consiga acesso às escadas</p>';
                ?>
            </div>

            <div class="remaining-time">
                <h1>Tempo total restante</h1>
            <?php
            echo '<p id="cronometro"></p>';
        }
            ?>
            </div>
    </div>

    <div class="game-area" id="content">
        <?php
        require_once "../controller/render_object.php";

        require_once "../view/menu.php";
        require_once "../view/scenario1.php";
        require_once "../view/scenario2.php";
        require_once "../view/scenario3.php";
        require_once "../view/end_game.php";
        ?>
        <div class="locked-message" id="mensagem"></div>

        <script>
            var pagina = <?php echo $pagina; ?>;
            var idPuzzle = <?php echo $idPuzzle; ?>;
        </script>
    </div>
    <script src="../js/redirecionarPags.js"></script>
    <script src="../js/atualizarConteudo.js"></script>
    <script src="../js/cronometro.js"></script>
</body>

</html>
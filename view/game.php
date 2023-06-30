<?php
session_start();
require_once "../model/conexao.php";
require_once "../model/game_select_user.php";

if (isset($_SESSION['pagina']) && isset($_SESSION['idPuzzle']) && isset($_SESSION['email'])) {
    $pagina = $_SESSION['pagina'];
    $idPuzzle = $_SESSION['idPuzzle'];
    $email = $_SESSION['email'];
}

$user = search_user($conectado, $email);

if ($pagina != 1 && $pagina != 333 && $pagina != 2) {
    $game = search_game($conectado, $user['idUsuario']);
    $inventory = $game['inventario'];
    $idPartida = $game['idPartida'];
    $totalTime = array_reduce(explode(':', $game['tempo']), function ($total, $time) {
        return $total * 60 + $time;
    }, 0);
}
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
    <link rel="stylesheet" href="css/puzzleTeclado.css">
    <link rel="stylesheet" href="css/second-scenario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Reem+Kufi&display=swap" rel="stylesheet">
    <!-- audios -->
    <?php
    $audios = [
        'chuvaJogo', 'chuvaInicio', 'portaAbre', 'portaFecha', 'pcLigando',
        'armarioAberto', 'win', 'gameOver', 'mouseClick', 'book', 'postit',
        'teclado', 'tecladoCorreto', 'tecladoErrado'
    ];
    foreach ($audios as $audio) {
        echo '<audio id="' . $audio . '" src="../assets/audios/' . $audio . '.mp3"></audio>' . PHP_EOL;
    }
    ?>
</head>

<body>
    <div class="current-game-data">
        <div class="now-playing">
            <h1>Jogando</h1>
            <p><?php echo $user['nome']; ?></p>
        </div>

        <?php
        if (playing($pagina)) {
        ?>
            <script>
                window.onbeforeunload = function() {
                    salvarTempo();
                };
                window.onload = function() {
                    reproduzirAudio('chuvaJogo', true);
                    attachDragEvents();
                    initializeKeyboard();
                };
                var tempoRestante = <?php echo $totalTime; ?>;
                var idPartida = <?php echo $idPartida; ?>;
                var inventario = <?php echo $inventory; ?>;
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
    <script src="../js/keyboard_scenario2.js"></script>
    <script src="../js/redirecionarPags.js"></script>
    <script src="../js/atualizarConteudo.js"></script>
    <script src="../js/cronometro.js"></script>
</body>

</html>
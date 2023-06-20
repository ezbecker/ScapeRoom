<?php
session_start();
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
?>
$semItem = 0;

<head>
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

        <?php
        if ($pagina != 1) {
        ?>
            <div class="goal">
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

            <div class="time">
                <h1>Tempo total restante</h1>
            <?php
            echo '<p id="cronometro"></p>';
        }
            ?>
            </div>
            <script>
                var tempoRestante = <?php echo $totalSegundos; ?>;
            </script>
    </div>

    <div class="iframe-container" id="content">
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
        require_once "../view/cenario2.php";
        ?>
        <script>
            var idPuzzle = <?php echo $idPuzzle; ?>;
            var idPartida = <?php echo $idPartida; ?>;
            var inventario = <?php echo $inventario; ?>;
        </script>
    </div>
    <div id="mensagem"></div>

    <script src="../js/redirecionarPags.js"></script>
    <script src="../js/atualizarConteudo.js"></script>
    <script src="../js/cronometro.js"></script>
</body>
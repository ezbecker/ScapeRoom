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

    require_once "../view/initialRoom.php";

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
            <?php
            if ($pagina > 1 && $pagina < 8)
                echo '<p>Larry Thompson</p>';
            ?>
        </div>

        <div class="goal">
            <h1>Objetivo atual</h1>
            <?php
            if ($pagina > 1 && $pagina < 8)
                echo '<p>Saia do quarto</p>';
            ?>
        </div>

        <div class="time">
            <h1>Tempo total restante</h1>
            <?php
            if ($pagina != 1)
                echo '<p id="cronometro"></p>';
            ?>
        </div>
    </div>

    <script>
        var tempoRestante = <?php echo $totalSegundos; ?>;
    </script>

    <div class="iframe-container">
        <?php
        if ($pagina == 1) {
            echo '<div id="areaClicavel1" onclick="redirecionar1()"></div>';
            echo '<div id="areaClicavel2" onclick="redirecionar2()"></div>';
            echo '<div id="areaClicavel3" onclick="redirecionar3()"></div>';
        } else if ($pagina == 3) {
            echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(4)"></div>';
            echo '<div id="areaClicavelLivro" class="area-clicavel" onclick="salvarTempo(); redirecionarPagina(6)"></div>';
        } else if ($pagina == 4) {
            echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(3)"></div>';
            echo '<div id="areaClicavelPerg1" class="area-clicavel" onclick="salvarTempo(); redirecionarPerg1()"></div>';
            echo '<div id="areaClicavelLivro"></div>';
        } else if ($pagina == 6 ||  $pagina == 7 ||  $pagina == 8) {
            echo '<div class="question-overlay">';
            echo '<p class="question-text">' . $pergunta . '</p>';
            echo '</div>';
            echo '<p class="alternativa-text1">' . $alternativa1 . '</p>';
            echo '<p class="alternativa-text2">' . $alternativa2 . '</p>';
            echo '<p class="alternativa-text3">' . $alternativa3 . '</p>';
            echo '<p class="alternativa-text4">' . $alternativa4 . '</p>';
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(3)"></div>';
            if ($pagina == 6)
                echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(7)"></div>';

            if ($pagina == 7) {
                echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(8)"></div>';
                echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(6)"></div>';
            }
            if ($pagina == 8)
                echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(7)"></div>';
        } else if ($pagina == 9) {
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarSetaSairRoom1()"></div>';
        } else if ($pagina == 10) {
            echo '<div id="corredor1" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
            echo '<div id="" onclick="salvarTempo(); redirecionarPagina(13)"></div>';
            echo '<div id="" onclick="salvarTempo(); redirecionarPagina(16)"></div>';
            echo '<div id="" onclick="salvarTempo(); redirecionarPagina(20)"></div>';
        } else if ($pagina == 11) {
            echo '<div id="areaClicavelPrancheta1" class="area-clicavel" onclick="salvarTempo(); redirecionarPagina(12)"></div>';
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        } else if ($pagina == 12) {
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
        } else if ($pagina == 13) {
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        }
        ?>
        <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTETBQ80UEiEwQBofbB8Ue0OdJmr8Wvdj4Fu8R8BNs3h02Yn6vCZiY0bXHOlcYMy7QamO7V1Gq2qeh8/embed?start=false&loop=false&delayms=3000&&rm=minimal&pagina=<?php echo $pagina; ?>" frameborder="0"></iframe>

    </div>

</body>
<script>
    var idPuzzle = <?php echo $idPuzzle; ?>;
    var idPartida = <?php echo $idPartida; ?>;
</script>
<script src="../js/cronometro.js"></script>
<script src="../js/redirecionarPags.js"></script>
<script>
    definirPosicao("areaClicavelLivro", "2.90em", "1.11em", "34.84em", "19.65em");
    definirPosicao("areaClicavelPerg1", "2.90em", "5.11em", "14.84em", "10.65em");
    definirPosicao("areaClicavelPrancheta1", "2.90em", "5em", "26.84em", "20.65em");
</script>
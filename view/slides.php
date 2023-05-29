<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    require_once "../controller/userAutenticado.php";

    $slide = $_GET['slide'];
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

    if ($idPuzzle != 0) {
        $query = "SELECT * FROM puzzle natural join questao WHERE idPuzzle = $idPuzzle and slide = $slide ";
        $stmt = mysqli_prepare($conectado, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $pergunta = $row['pergunta'];
            $alternativa1 = $row['alternativa1'];
            $alternativa2 = $row['alternativa2'];
            $alternativa3 = $row['alternativa3'];
            $alternativa4 = $row['alternativa4'];
        }
    }
    mysqli_close($conectado);
    ?>
    <link rel="stylesheet" href="css/slides.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/areasClicaveis.css">
    <link rel="stylesheet" href="css/frame.css">
</head>

<body>
    
    <div class="data">    
        <div class="playing">
            <h1>Jogando</h1>
            <?php
            if ($slide > 1 && $slide < 8)
                echo '<p>Larry Thompson</p>';
            ?>
        </div>

        <div class="goal">
            <h1>Objetivo atual</h1>
            <?php
            if ($slide > 1 && $slide < 8)
                echo '<p>Saia do quarto</p>';
            ?>
        </div>

        <div class="time">
            <h1>Tempo total restante</h1>
            <?php
            if ($slide != 1)
                echo '<p id="cronometro"></p>';
            ?>
        </div>
    </div>

    <script>
        var tempoRestante = <?php echo $totalSegundos; ?>;
    </script>

    <div class="iframe-container">
        <?php
        if ($slide == 1) {
            echo '<div id="areaClicavel1" onclick="redirecionar1()"></div>';
            echo '<div id="areaClicavel2" onclick="redirecionar2()"></div>';
            echo '<div id="areaClicavel3" onclick="redirecionar3()"></div>';
        } else if ($slide == 3) {
            echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarSlide(4)"></div>';
            echo '<div id="areaClicavelLivro" class="area-clicavel" onclick="salvarTempo(); redirecionarSlide(6)"></div>';
        } else if ($slide == 4) {
            echo '<div id="areaClicavelPerg1" class="area-clicavel" onclick="salvarTempo(); redirecionarPerg1()"></div>';
            echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarSlide(3)"></div>';
        } else if ($slide == 6 ||  $slide == 7 ||  $slide == 8) {
            echo '<div class="question-overlay">';
            echo '<p class="question-text">' . $pergunta . '</p>';
            echo '</div>';
            echo '<p class="alternativa-text1">' . $alternativa1 . '</p>';
            echo '<p class="alternativa-text2">' . $alternativa2 . '</p>';
            echo '<p class="alternativa-text3">' . $alternativa3 . '</p>';
            echo '<p class="alternativa-text4">' . $alternativa4 . '</p>';
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarSlide(3)"></div>';
            if ($slide == 6)
                echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarSlide(7)"></div>';
            if ($slide == 7) {
                echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarSlide(8)"></div>';
                echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarSlide(6)"></div>';
            }
            if ($slide == 8)
                echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarSlide(7)"></div>';
        } else if ($slide == 9) {
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarSetaSairRoom1()"></div>';
        } else if ($slide == 10) {
            echo '<div id="corredor1" onclick="salvarTempo(); redirecionarSlide(11)"></div>';
            echo '<div id="" onclick="salvarTempo(); redirecionarSlide(13)"></div>';
            echo '<div id="" onclick="salvarTempo(); redirecionarSlide(16)"></div>';
            echo '<div id="" onclick="salvarTempo(); redirecionarSlide(20)"></div>';
        } else if ($slide == 11) {
            echo '<div id="areaClicavelPrancheta1" class="area-clicavel" onclick="salvarTempo(); redirecionarSlide(12)"></div>';
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarSlide(10)"></div>';
        } else if ($slide == 12) {
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarSlide(11)"></div>';
        } else if ($slide == 13) {
            echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarSlide(10)"></div>';
        }
        ?>
        <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTETBQ80UEiEwQBofbB8Ue0OdJmr8Wvdj4Fu8R8BNs3h02Yn6vCZiY0bXHOlcYMy7QamO7V1Gq2qeh8/embed?start=false&loop=false&delayms=3000&&rm=minimal&slide=<?php echo $slide; ?>" frameborder="0"></iframe>

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
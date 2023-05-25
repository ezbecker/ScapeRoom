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
        }
    }
    mysqli_close($conectado);
    ?>

    <link rel="stylesheet" href="css/areasClicaveis.css">
    <link rel="stylesheet" href="css/frame.css">
</head>

<body>
    <?php
    if ($slide != 1)
        echo '<p id="cronometro"></p>';
    ?>
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
            echo '<div id="areaClicavelSeta" onclick="redirecionarSeta()"></div>';
        } else if ($slide == 4) {
            echo '<div id="areaClicavelPerg1" onclick="redirecionarPerg1()"></div>';
        } else if ($slide == 6 ||  $slide == 7 ||  $slide == 8) {
            echo '<div class="question-overlay">';
            echo '<p class="question-text">' . $pergunta . '</p>';
            echo '</div>';
        } else if ($slide == 9) {
            echo '<div id="areaClicavelSetaSairRoom1" onclick="redirecionarSetaSairRoom1()"></div>';
        }
        ?>
        <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTETBQ80UEiEwQBofbB8Ue0OdJmr8Wvdj4Fu8R8BNs3h02Yn6vCZiY0bXHOlcYMy7QamO7V1Gq2qeh8/embed?start=false&loop=false&delayms=3000&&rm=minimal&slide=<?php echo $slide; ?>" frameborder="0"></iframe>

    </div>

</body>
<script>
    var idPuzzle = <?php echo $idPuzzle; ?>;
</script>
<script src="../js/cronometro.js"></script>
<script src="../js/redirecionarPags.js"></script>
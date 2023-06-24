<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Execução do cenário 1 do jogo RadioEscape">
    <meta name="keywords" content="scaperoom, radiologia, saúde, jogo, radioescape, radio escape,">
    <link rel="icon" href="../assets/icon.png">
    <title>RadioEscape | Jogando</title>
    <link rel="stylesheet" href="game.css">
    <link rel="stylesheet" href="default-positions.css">
    <link rel="stylesheet" href="first-scenario.css">
    <link rel="stylesheet" href="css/puzzleLixo.css">
</head>

<body>
    <?php
    $query = "SELECT * FROM puzzle natural join cenario1 WHERE idPuzzle = $idPuzzle and pagina = $pagina ";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $nome = $row['nome'];
        $idade = $row['idade'];
        $sintomas = $row['sintomas'];
        $tomografia = $row['tomografia'];
    }

    if ($pagina == 10) {
        echo '<img src="../scenarios/scenario1/corridor/corridor1.png">';
        echo '<button class="keyboard-position" onclick="salvarTempo(); redirecionarTeclado();"></button>';
        echo '<button class="room1" onclick="salvarTempo(); reproduzirAudio(\'portaAbre\', false); redirecionarPagina(11,' . $idPuzzle . ')"></button>';
        echo '<button class="room2" onclick="salvarTempo(); reproduzirAudio(\'portaAbre\', false); redirecionarPagina(13,' . $idPuzzle . ')"></button>';
        echo '<button class="room3" onclick="salvarTempo(); reproduzirAudio(\'portaAbre\', false); redirecionarPagina(16,' . $idPuzzle . ')"></button>';
        echo '<button class="room4" onclick="salvarTempo(); reproduzirAudio(\'portaAbre\', false); redirecionarPagina(18,' . $idPuzzle . ')"></button>';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'portaAbre\', false);  redirecionarPagina(9,' . $idPuzzle . ')"></button>';
    } else if ($pagina == 11) { // room1
        echo '<img src="../scenarios/scenario1/roomOne/roomOne1.gif">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'portaFecha\', false); redirecionarPagina(10,' . $idPuzzle . ')"></button>';
        echo '<button class="room1-clipboard" onclick="salvarTempo(); redirecionarPagina(12,' . $idPuzzle . ')"></button>';
        echo '<button class="room1-trash" onclick="salvarTempo(); redirecionarPagina(23,' . $idPuzzle . ')"></button>';
    } else if ($pagina == 12) { // Prancheta
        echo '<img src="../scenarios/scenario1/roomOne/Room1Clipboard.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(11,' . $idPuzzle . ')"></button>';
        echo '<div class="question-overlay">';
        echo '<p class="clipboard-name">' . $nome . '</p>';
        echo '<p class="clipboard-age">' . $idade . '</p>';
        echo '<p class="clipboard-symptoms">' . $sintomas . '</p>';
        echo '<p class="clipboard-diagnosis">' . $tomografia . '</p>';
        echo '</div>';
    } else if ($pagina == 13) { // room2
        echo '<img src="../scenarios/scenario1/roomTwo/roomTwo1.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'portaFecha\', false); redirecionarPagina(10,' . $idPuzzle . ')"></button>';
        echo '<button class="room2-clipboard" onclick="salvarTempo(); redirecionarPagina(14,' . $idPuzzle . ')"></button>';
        echo '<button class="room2-paper" onclick="salvarTempo(); redirecionarPagina(15,' . $idPuzzle . ')"></button>';
    } else if ($pagina == 14) { // Prancheta
        echo '<img src="../scenarios/scenario1/roomTwo/Room2Clipboard.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(13,' . $idPuzzle . ')"></button>';
        echo '<div class="question-overlay">';
        echo '<p class="clipboard-name">' . $nome . '</p>';
        echo '<p class="clipboard-age">' . $idade . '</p>';
        echo '<p class="clipboard-symptoms">' . $sintomas . '</p>';
        echo '<p class="clipboard-diagnosis">' . $tomografia . '</p>';
        echo '</div>';
    } else if ($pagina == 15) {
        echo '<img src="../scenarios/scenario1/roomTwo/roomTwo3.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(13,' . $idPuzzle . ')"></button>';
    } else if ($pagina == 16) { // room3
        echo '<img src="../scenarios/scenario1/roomThree/roomThree1.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'portaFecha\', false); redirecionarPagina(10,' . $idPuzzle . ')"></button>';
        echo '<button class="room3-clipboard" onclick="salvarTempo(); redirecionarPagina(17,' . $idPuzzle . ')"></button>';
    } else if ($pagina == 17) {  // Prancheta
        echo '<img src="../scenarios/scenario1/roomThree/Room3Clipboard.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(16,' . $idPuzzle . ')"></button>';
        echo '<div class="question-overlay">';
        echo '<p class="clipboard-name">' . $nome . '</p>';
        echo '<p class="clipboard-age">' . $idade . '</p>';
        echo '<p class="clipboard-symptoms">' . $sintomas . '</p>';
        echo '<p class="clipboard-diagnosis">' . $tomografia . '</p>';
        echo '</div>';
    } else if ($pagina == 18) { // room4
        echo '<img src="../scenarios/scenario1/roomFour/roomFour1.gif">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'portaFecha\', false); redirecionarPagina(10,' . $idPuzzle . ')"></button>';
        echo '<button class="room4-drawer" onclick="salvarTempo(); redirecionarPagina(19,' . $idPuzzle . ')"></div>';
    } else if ($pagina == 19) {
        echo '<img src="../scenarios/scenario1/roomFour/roomFour2.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(18,' . $idPuzzle . ')"></button>';
        echo '<button class="room4-clipboard" onclick="salvarTempo(); redirecionarPagina(20,' . $idPuzzle . ')"></button>';
        echo '<button class="room4-paper" onclick="salvarTempo(); redirecionarPagina(21,' . $idPuzzle . ')"></div>';
    } else if ($pagina == 20) { // Prancheta
        echo '<img src="../scenarios/scenario1/roomFour/Room4Clipboard.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(19,' . $idPuzzle . ')"></button>';
        echo '<div class="question-overlay">';
        echo '<p class="cliboard-name">' . $nome . '</p>';
        echo '<p class="clipboard-age">' . $idade . '</p>';
        echo '<p class="clipboard-symptoms">' . $sintomas . '</p>';
        echo '<p class="clipboard-diagnosis">' . $tomografia . '</p>';
        echo '</div>';
    } else if ($pagina == 21) {
        echo '<img src="../scenarios/scenario1/roomFour/roomFour4.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(19,' . $idPuzzle . ')"></button>';
    } else if ($pagina == 22) {
        echo '<img src="../scenarios/scenario1/corridor/corridor2.png">';
        echo '<button class="scenario1-exit" onclick="salvarTempo(); redirecionarSetaSairCenario1();"></div>';
    } else if ($pagina == 23) {
    ?>
        <img class="image" src="../assets/bilhete.png" width="305" height="104" />
        <img class="image" src="../assets/papel1.png" width="150" height="150" />
        <img class="image" src="../assets/papel3.png" width="150" height="150" />
        <img class="image" src="../assets/papel2.png" width="150" height="150" />
        <img class="image" src="../assets/papel1.png" width="150" height="150" />
        <img class="image" src="../assets/papel2.png" width="150" height="150" />
        <img class="image" src="../assets/papel3.png" width="150" height="150" />
    <?php
        echo '<img src="../scenarios/scenario1/roomOne/Room1Trash.png">';
        echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(11,' . $idPuzzle . ')"></button>';
    }
    ?>

</body>

</html>
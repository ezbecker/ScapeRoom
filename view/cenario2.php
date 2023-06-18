<?php

$query = "SELECT * FROM puzzle natural join cenario2 WHERE idPuzzle = $idPuzzle and paginaPac = $pagina";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $pacienteNome = $row['pacienteNome'];
    $pacienteCodigo = $row['pacienteCodigo'];
}

$query = "SELECT * FROM puzzle natural join cenario2 WHERE idPuzzle = $idPuzzle and paginaExame = $pagina";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result2 = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result2) === 1) {
    $row = mysqli_fetch_assoc($result2);
    $exame = $row['exame'];
    $pacienteCodigo = $row['pacienteCodigo'];
}


if ($pagina == 24) {
    echo '<img src="../scenarios/scenario2/corredor.png">';
    echo '<div id="areaClicavelPostit" onclick="salvarTempo(); redirecionarPagina(25);"></div>';
    echo '<div id="areaClicavelLab1" onclick="salvarTempo(); redirecionarPagina(26);"></div>';
    echo '<div id="areaClicavelSala" onclick="salvarTempo(); redirecionarPagina(33);"></div>';
    echo '<div id="areaClicavelLab2" onclick="salvarTempo(); redirecionarPagina(40);"></div>';
} else if ($pagina == 25) {
    echo '<img src="../scenarios/scenario2/postit.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24)"></div>';
} else if ($pagina == 26) { //lab1
    echo '<img src="../scenarios/scenario2/lab1.png">';
    echo '<div id="areaClicavellab1-pc" onclick="salvarTempo(); redirecionarPagina(27);"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24)"></div>';
} else if ($pagina == 27) { //lab1-pc
    echo '<img src="../scenarios/scenario2/lab1-pc.png">';
    echo '<div id="areaClicavelExame" onclick="salvarTempo(); redirecionarPagina(28);"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(26)"></div>';
} else if ($pagina == 28 || $pagina == 29 || $pagina == 30 || $pagina == 31 || $pagina == 32) { //exame
    echo '<img src="../scenarios/scenario2/lab1-pc.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(26)"></div>';
    echo '<div class="question-overlay">';
    echo '<p class="question-text">' . $exame . " --- " . $pacienteCodigo . '</p>';
    echo '</div>';
    if ($pagina == 28)
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(29);"></div>';
    else if ($pagina == 29) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(28);"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(30);"></div>';
    } else if ($pagina == 30) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(29);"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(31);"></div>';
    } else if ($pagina == 31) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(30);"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(32);"></div>';
    } else if ($pagina == 32)
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(31);"></div>';
} else if ($pagina == 33) { //sala
    echo '<img src="../scenarios/scenario2/sala.png">';
    echo '<div id="areaClicavelSala-pc" onclick="salvarTempo(); redirecionarPagina(34);"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24)"></div>';
} else if ($pagina == 34) { //sala-pc
    echo '<img src="../scenarios/scenario2/sala-pc.png">';
    echo '<div id="areaClicavelPaciente" onclick="salvarTempo(); redirecionarPagina(35);"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(33)"></div>';
} else if ($pagina == 35 || $pagina == 36 || $pagina == 37 || $pagina == 38 || $pagina == 39) { //paciente
    echo '<img src="../scenarios/scenario2/sala-pc.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(33)"></div>';
    echo '<div class="question-overlay">';
    echo '<p class="question-text">' . $pacienteNome . " --- " . $pacienteCodigo . '</p>';
    echo '</div>';
    if ($pagina == 35)
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(36);"></div>';
    else if ($pagina == 36) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(35);"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(37);"></div>';
    } else if ($pagina == 37) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(36);"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(38);"></div>';
    } else if ($pagina == 38) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(37);"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(39);"></div>';
    } else if ($pagina == 39)
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(38);"></div>';
} else if ($pagina == 40) { //lab2
    echo '<img src="../scenarios/scenario2/lab2.gif">';
    echo '<div id="areaClicavelCaderno" onclick="salvarTempo(); redirecionarPagina(41);"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24)"></div>';
} else if ($pagina == 41) { //lab2-caderno
    echo '<img src="../scenarios/scenario2/lab2-caderno.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(40)"></div>';
}

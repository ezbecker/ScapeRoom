<?php

$query = "SELECT * FROM puzzle natural join initialroom WHERE idPuzzle = $idPuzzle and pagina = $pagina ";
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

if ($pagina == 3) {
    echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(4)"></div>';
    echo '<div id="areaClicavelLivro" onclick="salvarTempo(); redirecionarPagina(6)"></div>';
    echo '<div id="areaClicavelQuadro" onclick="salvarTempo(); redirecionarPagina(5)"></div>';
    echo '<img src="../scenarios/inicialRoom/inicialRoom1.gif">';
} else if ($pagina == 4) {
    echo '<img src="../scenarios/inicialRoom/inicialRoom4.png">';
    echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(3)"></div>';
    echo '<div id="areaClicavelSetaDireitaaaaaaa" onclick="salvarTempo(); redirecionarPerg1()"></div>';
} else if ($pagina == 5) {
    echo '<img src="../scenarios/inicialRoom/inicialRoom2.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(3)"></div>';
} else if ($pagina == 6 ||  $pagina == 7 ||  $pagina == 8) {
    echo '<div class="question-overlay">';
    echo '<p class="question-text">' . $pergunta . '</p>';
    echo '</div>';
    echo '<p class="alternativa-text1">' . $alternativa1 . '</p>';
    echo '<p class="alternativa-text2">' . $alternativa2 . '</p>';
    echo '<p class="alternativa-text3">' . $alternativa3 . '</p>';
    echo '<p class="alternativa-text4">' . $alternativa4 . '</p>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(3)"></div>';
    echo '<img src="../scenarios/inicialRoom/inicialRoom3.png">';
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
    echo '<img src="../scenarios/inicialRoom/inicialRoom5.png">';
}

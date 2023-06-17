<?php

if ($pagina == 24) {
    echo '<img src="../scenarios/scenario2/corredor.png">';
    echo '<div id="areaClicavelPostit" onclick="salvarTempo(); redirecionarPagina(25);"></div>';
    echo '<div id="areaClicavelLab1" onclick="salvarTempo(); redirecionarPagina(26);"></div>';
    echo '<div id="areaClicavelSala" onclick="salvarTempo(); redirecionarPagina(29);"></div>';
    echo '<div id="areaClicavelLab2" onclick="salvarTempo(); redirecionarPagina(32);"></div>';
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
} else if ($pagina == 28) { //exame
    echo '<img src="../scenarios/scenario2/lab1-pc1.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(26)"></div>';
} else if ($pagina == 29) { //sala
    echo '<img src="../scenarios/scenario2/sala.png">';
    echo '<div id="areaClicavelSala-pc" onclick="salvarTempo(); redirecionarPagina(30);"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24)"></div>';
} else if ($pagina == 30) { //sala-pc
    echo '<img src="../scenarios/scenario2/sala-pc.png">';
    echo '<div id="areaClicavelPaciente" onclick="salvarTempo(); redirecionarPagina(31);"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(29)"></div>';
} else if ($pagina == 31) { //paciente
    echo '<img src="../scenarios/scenario2/sala-pc.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(29)"></div>';
} else if ($pagina == 32) { //lab2
    echo '<img src="../scenarios/scenario2/lab2.gif">';
    echo '<div id="areaClicavelCaderno" onclick="salvarTempo(); redirecionarPagina(33);"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24)"></div>';
} else if ($pagina == 33) { //lab2-caderno
    echo '<img src="../scenarios/scenario2/lab2-caderno.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(32)"></div>';
}

<?php

if ($pagina == 24) {
    echo '<img src="../scenarios/scenario2/corredor.png">';
    echo '<div id="laboratorio" onclick="salvarTempo(); redirecionarPagina(25);"></div>';
} else if ($pagina == 25) {
    echo '<img src="../scenarios/scenario2/laboratorio.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24)"></div>';
}

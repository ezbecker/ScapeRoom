<?php
if ($pagina == 10) {
    echo '<div id="corredor1" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
    echo '<div id="" onclick="salvarTempo(); redirecionarPagina(13)"></div>';
    echo '<div id="" onclick="salvarTempo(); redirecionarPagina(16)"></div>';
    echo '<div id="" onclick="salvarTempo(); redirecionarPagina(20)"></div>';
    echo '<img src="../scenarios/scenario1/corridor/corridor1.png">';
} else if ($pagina == 11) {
    echo '<div id="areaClicavelPrancheta1" class="area-clicavel" onclick="salvarTempo(); redirecionarPagina(12)"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
    echo '<img src="../scenarios/scenario1/roomOne/roomOne1.gif">';
} else if ($pagina == 12) {
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
} else if ($pagina == 13) {
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
}

<?php

if ($pagina == 24) {
    echo '<img src="../scenarios/scenario2/corredor.png">';
    if ($inventario == 0)
        echo '<div id="areaClicavelLivro" onclick="salvarTempo(); redirecionarPagina(6);"></div>';
}

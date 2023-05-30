<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    if ($pagina == 10) {
        echo '<img src="../scenarios/scenario1/corridor/corridor1.png">';
        echo '<div id="room1" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
        echo '<div id="room2" onclick="salvarTempo(); redirecionarPagina(13)"></div>';
        echo '<div id="room3" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
        echo '<div id="room4" onclick="salvarTempo(); redirecionarPagina(11)"></div>';

        echo '<div id="" onclick="salvarTempo(); redirecionarPagina(13)"></div>';
        echo '<div id="" onclick="salvarTempo(); redirecionarPagina(16)"></div>';
        echo '<div id="" onclick="salvarTempo(); redirecionarPagina(20)"></div>';
    } else if ($pagina == 11) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        echo '<div id="areaClicavelPrancheta2" onclick="salvarTempo(); redirecionarPagina(12)"></div>';
        echo '<div id="lixo" onclick="salvarTempo(); redirecionarLixo()"></div>';
        echo '<img src="../scenarios/scenario1/roomOne/roomOne1.gif">';
    } else if ($pagina == 12) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
        echo '<img src="../scenarios/scenario1/roomOne/roomOne2.png">';
    } else if ($pagina == 13) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(14)"></div>';
        echo '<img src="../scenarios/scenario1/roomTwo/roomTwo1.png">';
    }
    ?>
</head>
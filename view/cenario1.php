<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    if ($pagina == 10) {
        echo '<img src="../scenarios/scenario1/corridor/corridor1.png">';
        echo '<div id="room1" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
        echo '<div id="room2" onclick="salvarTempo(); redirecionarPagina(13)"></div>';
        echo '<div id="room3" onclick="salvarTempo(); redirecionarPagina(16)"></div>';
        echo '<div id="room4" onclick="salvarTempo(); redirecionarPagina(18)"></div>';
    } else if ($pagina == 11) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        echo '<div id="areaClicavelPrancheta2" onclick="salvarTempo(); redirecionarPagina(12)"></div>';
        echo '<div id="lixo" onclick="salvarTempo(); redirecionarLixo()"></div>';
        echo '<img src="../scenarios/scenario1/roomOne/roomOne1.gif">';
    } else if ($pagina == 12) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
        echo '<img src="../scenarios/scenario1/roomOne/roomOne2.png">';
    } else if ($pagina == 13) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        echo '<div id="areaClicavelPrancheta3" onclick="salvarTempo(); redirecionarPagina(14)"></div>';
        echo '<div id="areaClicavelPapel1" onclick="salvarTempo(); redirecionarPagina(15)"></div>';
        echo '<img src="../scenarios/scenario1/roomTwo/roomTwo1.png">';
    } else if ($pagina == 14) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(13)"></div>';
        echo '<img src="../scenarios/scenario1/roomTwo/roomTwo2.png">';
    } else if ($pagina == 15) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(13)"></div>';
        echo '<img src="../scenarios/scenario1/roomTwo/roomTwo3.png">';
    } else if ($pagina == 16) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        echo '<div id="areaClicavelPrancheta4" onclick="salvarTempo(); redirecionarPagina(17)"></div>';
        echo '<img src="../scenarios/scenario1/roomThree/roomThree1.png">';
    } else if ($pagina == 17) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(16)"></div>';
        echo '<img src="../scenarios/scenario1/roomThree/roomThree2.png">';
    } else if ($pagina == 18) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        echo '<div id="gaveta" onclick="salvarTempo(); redirecionarPagina(19)"></div>';
        echo '<img src="../scenarios/scenario1/roomFour/roomFour1.gif">';
    } else if ($pagina == 19) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(18)"></div>';
        echo '<div id="areaClicavelPrancheta5" onclick="salvarTempo(); redirecionarPagina(20)"></div>';
        echo '<div id="areaClicavelPapel2" onclick="salvarTempo(); redirecionarPagina(21)"></div>';
        echo '<img src="../scenarios/scenario1/roomFour/roomFour2.png">';
    } else if ($pagina == 20) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(19)"></div>';
        echo '<img src="../scenarios/scenario1/roomFour/roomFour3.png">';
    } else if ($pagina == 21) {
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(19)"></div>';
        echo '<img src="../scenarios/scenario1/roomFour/roomFour4.png">';
    }
    ?>
</head>
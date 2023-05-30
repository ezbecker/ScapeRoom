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
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(9)"></div>';
    } else if ($pagina == 11) { //  room1
        echo '<img src="../scenarios/scenario1/roomOne/roomOne1.gif">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        echo '<div id="areaClicavelPrancheta2" onclick="salvarTempo(); redirecionarPagina(12)"></div>';
        echo '<div id="lixo" onclick="salvarTempo(); redirecionarLixo()"></div>';
    } else if ($pagina == 12) {
        echo '<img src="../scenarios/scenario1/roomOne/roomOne2.png">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(11)"></div>';
    } else if ($pagina == 13) { //  room2
        echo '<img src="../scenarios/scenario1/roomTwo/roomTwo1.png">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        echo '<div id="areaClicavelPrancheta3" onclick="salvarTempo(); redirecionarPagina(14)"></div>';
        echo '<div id="areaClicavelPapel1" onclick="salvarTempo(); redirecionarPagina(15)"></div>';
    } else if ($pagina == 14) {
        echo '<img src="../scenarios/scenario1/roomTwo/roomTwo2.png">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(13)"></div>';
    } else if ($pagina == 15) {
        echo '<img src="../scenarios/scenario1/roomTwo/roomTwo3.png">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(13)"></div>';
    } else if ($pagina == 16) { //  room3
        echo '<img src="../scenarios/scenario1/roomThree/roomThree1.png">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        echo '<div id="areaClicavelPrancheta4" onclick="salvarTempo(); redirecionarPagina(17)"></div>';
    } else if ($pagina == 17) {
        echo '<img src="../scenarios/scenario1/roomThree/roomThree2.png">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(16)"></div>';
    } else if ($pagina == 18) { //  room4
        echo '<img src="../scenarios/scenario1/roomFour/roomFour1.gif">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
        echo '<div id="gaveta" onclick="salvarTempo(); redirecionarPagina(19)"></div>';
    } else if ($pagina == 19) {
        echo '<img src="../scenarios/scenario1/roomFour/roomFour2.png">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(18)"></div>';
        echo '<div id="areaClicavelPrancheta5" onclick="salvarTempo(); redirecionarPagina(20)"></div>';
        echo '<div id="areaClicavelPapel2" onclick="salvarTempo(); redirecionarPagina(21)"></div>';
    } else if ($pagina == 20) {
        echo '<img src="../scenarios/scenario1/roomFour/roomFour3.png">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(19)"></div>';
    } else if ($pagina == 21) {
        echo '<img src="../scenarios/scenario1/roomFour/roomFour4.png">';
        echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(19)"></div>';
    }
    ?>
</head>
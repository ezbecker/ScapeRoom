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
    echo '<img src="../scenarios/inicialRoom/inicialRoom1.gif">';
    echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(4,' . $idPuzzle . ');"></button>';
    echo '<button class="book-position" onclick="salvarTempo(); redirecionarPagina(6,' . $idPuzzle . ');"></button>';
    echo '<button class="board-position" onclick="salvarTempo(); redirecionarPagina(5,' . $idPuzzle . ');"></button>';
} else if ($pagina == 4) {
    echo '<img src="../scenarios/inicialRoom/inicialRoom4.png">';
    echo '<button class="terminal-position" onclick="salvarTempo(); redirecionarPagina(0,' . $idPuzzle . ')"></button>';
    echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(3,' . $idPuzzle . ');"></button>';
} else if ($pagina == 5) {
    echo '<img src="../scenarios/inicialRoom/inicialRoom2.png">';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(3,' . $idPuzzle . ');"></button>';
    $query = "SELECT * FROM puzzle natural join initialroom WHERE idPuzzle = $idPuzzle";
    $result = mysqli_query($conectado, $query);
    $cont = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($cont < 6) {
            echo '<p class="option-1">' . $row['alternativa1'] . $row['cid1'] . '</p>';
            echo '<p class="option-2">' . $row['alternativa2'] . $row['cid2'] . '</p>';
            echo '<p class="option-3">' . $row['alternativa3'] . $row['cid3'] . '</p>';
            echo '<p class="option-4">' . $row['alternativa4'] . $row['cid4'] . '</p>';
        } else {
            echo '<p class="option-1">' . $row['alternativa1'] . $row['cid1'] . '</p>';
            echo '<p class="option-2">' . $row['alternativa2'] . $row['cid2'] . '</p>';
            echo '<p class="option-3">' . $row['alternativa3'] . $row['cid3'] . '</p>';
            echo '<p class="option-4">' . $row['alternativa4'] . $row['cid4'] . '</p>';
        }
        $cont++;
    }
} else if ($pagina == 6 ||  $pagina == 7 ||  $pagina == 8) {
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(3,' . $idPuzzle . ');"></button>';
    if ($pagina == 6) {
        echo '<button class="right-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'book\', false); redirecionarPagina(7,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/inicialRoom/inicialRoom-book-1.png">';
    }
    if ($pagina == 7) {
        echo '<button class="right-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'book\', false); redirecionarPagina(8,' . $idPuzzle . ');"></button>';
        echo '<button class="left-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'book\', false); redirecionarPagina(6,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/inicialRoom/inicialRoom-book-2.png">';
    }
    if ($pagina == 8) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'book\', false); redirecionarPagina(7,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/inicialRoom/inicialRoom-book-3.png">';
    }
    echo '<p class="question">' . $pergunta . '</p>';
    echo '<div class="options">';
    echo '<p class="option-1">' . $alternativa1 . '</p>';
    echo '<p class="option-2">' . $alternativa2 . '</p>';
    echo '<p class="option-3">' . $alternativa3 . '</p>';
    echo '<p class="option-4">' . $alternativa4 . '</p>';
    echo '</div>';
} else if ($pagina == 9) {
    echo '<img src="../scenarios/inicialRoom/inicialRoom5.png">';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarSetaSairRoom1();"></button>';
} else if ($pagina == 0) {
?>
    <img src="../scenarios/inicialRoom/input.png">
    <div class="initial-terminal-input">
        <form action="../controller/respPuzzleRoom1.php" method="POST">
            <input type="text" name="respUser" class="form-control" placeholder="Resposta" required>
            <input type="hidden" name="idPuzzle" id="idPuzzle" value="<?php echo $idPuzzle ?>">
            <button type="submit" class="enviar">Enviar</button>
        </form>
    </div>
<?php
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(4,' . $idPuzzle . ');"></div>';
}

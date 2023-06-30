<?php

require_once '../model/scenario1_select_question.php';

switch ($pagina) {
    case 3:
        renderImage("../scenarios/inicialRoom/inicialRoom1.gif");
        renderButton("left-arrow-position", "salvarTempo(); redirecionarPagina(4,$idPuzzle);");
        renderButton("book-position", "salvarTempo(); redirecionarPagina(6,$idPuzzle);");
        renderButton("board-position", "salvarTempo(); redirecionarPagina(5,$idPuzzle);");
        break;
    case 4:
        renderImage("../scenarios/inicialRoom/inicialRoom4.png");
        renderButton("terminal-position", "salvarTempo(); redirecionarPagina(0,$idPuzzle);");
        renderButton("right-arrow-position", "salvarTempo(); redirecionarPagina(3,$idPuzzle);");
        break;
    case 5:
        renderImage("../scenarios/inicialRoom/inicialRoom2.png");
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(3,$idPuzzle);");
        $clipboards = searchClipboards($conectado, $idPuzzle);
        exibirClipboards($clipboards);
        break;
    case 6:
    case 7:
    case 8:
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(3,$idPuzzle);");
        if ($pagina == 6) {
            $question = 1;
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('book', false); redirecionarPagina(7,$idPuzzle);");
            renderImage("../scenarios/inicialRoom/inicialRoom-book-1.png");
        } else if ($pagina == 7) {
            $question = 2;
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('book', false); redirecionarPagina(8,$idPuzzle);");
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('book', false); redirecionarPagina(6,$idPuzzle);");
            renderImage("../scenarios/inicialRoom/inicialRoom-book-2.png");
        } else if ($pagina == 8) {
            $question = 3;
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('book', false); redirecionarPagina(7,$idPuzzle);");
            renderImage("../scenarios/inicialRoom/inicialRoom-book-3.png");
        }
        $puzzle = searchQuestion($conectado, $idPuzzle, $pagina);
        echo '<p class="question">' . "<strong>" . $question . ") </strong> " . $puzzle['pergunta'] . '</p>';
        echo '<div class="options">';
        echo '<p class="option-1"><strong>a)</strong> ' . $puzzle['alternativa1'] . '</p>';
        echo '<p class="option-2"><strong>b)</strong> ' . $puzzle['alternativa2'] . '</p>';
        echo '<p class="option-3"><strong>c)</strong> ' . $puzzle['alternativa3'] . '</p>';
        echo '<p class="option-4"><strong>d)</strong> ' . $puzzle['alternativa4'] . '</p>';
        echo '</div>';
        break;
    case 9:
        renderImage("../scenarios/inicialRoom/inicialRoom5.png");
        renderButton("down-arrow-position", "salvarTempo(); redirecionarSetaSairRoom1();");
        break;
    case 0:
        renderImage("../scenarios/inicialRoom/input.png");
        echo '<div class="initial-terminal-input">';
        echo '<form action="../controller/answer_scenario1.php" method="POST">';
        echo '<input type="text" name="respUser" class="form-control" placeholder="Resposta" required>';
        echo '<input type="hidden" name="idPuzzle" id="idPuzzle" value="' . $idPuzzle . '">';
        echo '<button type="submit" class="enviar">Enviar</button>';
        echo '</form>';
        echo '</div>';
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(4,$idPuzzle);");
        break;
}

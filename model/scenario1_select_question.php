<?php

function searchQuestion($conectado, $idPuzzle, $pagina)
{
    $query = "SELECT pergunta, alternativa1, alternativa2, alternativa3, alternativa4  FROM puzzle NATURAL JOIN initialroom WHERE idPuzzle = ? AND pagina = ?";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_bind_param($stmt, "ii", $idPuzzle, $pagina);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    return null;
}

function searchClipboards($conectado, $idPuzzle)
{
    $query = "SELECT alternativa1, alternativa2, alternativa3, alternativa4, cid1, cid2, cid3, cid4 FROM puzzle natural join initialroom WHERE idPuzzle = ?";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_bind_param($stmt, "i", $idPuzzle);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $clipboards = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $clipboards[] = $row;
    }
    return $clipboards;
}

function exibirClipboards($clipboards)
{
    $cont = 1;
    foreach ($clipboards as $i => $clipboard) {
        if ($cont == 1 or $cont == 3) {
            if ($cont == 1) {
                echo '<div class="clipboard-1">';
                echo '<p >' . $clipboard['alternativa1'] . " " . "<strong>" . $clipboard['cid1'] . "</strong>" . '</p>';
                echo '<p>' . $clipboard['alternativa2'] . " " . "<strong>" . $clipboard['cid2'] . "</strong>" . '</p>';
                echo '<p >' . $clipboard['alternativa3'] . " " . "<strong>" . $clipboard['cid3'] . "</strong>" . '</p>';
                echo '<p>' . $clipboard['alternativa4'] . " " . "<strong>" . $clipboard['cid4'] . "</strong>" . '</p>';
            } else {
                echo '<p >' . $clipboard['alternativa1'] . " " . "<strong>" . $clipboard['cid1'] . "</strong>" . '</p>';
                echo '<p>' . $clipboard['alternativa2'] . " " . "<strong>" . $clipboard['cid2'] . "</strong>" . '</p>';
                echo '</div>';
            }
        } else if ($cont == 2) {
            echo '<div class="clipboard-2">';
            echo '<p >' . $clipboard['alternativa1'] . " " . "<strong>" . $clipboard['cid1'] . "</strong>" . '</p>';
            echo '<p>' . $clipboard['alternativa2'] . " " . "<strong>" . $clipboard['cid2'] . "</strong>" . '</p>';
            echo '<p >' . $clipboard['alternativa3'] . " " . "<strong>" . $clipboard['cid3'] . "</strong>" . '</p>';
            echo '<p>' . $clipboard['alternativa4'] . " " . "<strong>" . $clipboard['cid4'] . "</strong>" . '</p>';
        }
        if ($cont == 3) {
            echo '<p >' . $clipboard['alternativa3'] . " " . "<strong>" . $clipboard['cid3'] . "</strong>" . '</p>';
            echo '<p>' . $clipboard['alternativa4'] . " " . "<strong>" . $clipboard['cid4'] . "</strong>" . '</p>';
            echo '</div>';
        }
        $cont++;
    }
}

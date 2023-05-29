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

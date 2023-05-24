<?php
include('../model/conexao.php');

$respUser = $_POST['respUser'];
$idPuzzle = $_POST['idPuzzle'];

$query = ("SELECT * FROM puzzle WHERE idPuzzle = '$idPuzzle'");
$registro = mysqli_query($conectado, $query);
while ($registros = mysqli_fetch_array($registro)) {
    $respCorreta = $registros["resposta"];
    $link = $registros["link"];
    $linkErro = $registros["linkErro"];
}
echo $link;
if ($respUser == $respCorreta)
    header('Location: ' . $link);
else
    header('Location: ' . $linkErro);

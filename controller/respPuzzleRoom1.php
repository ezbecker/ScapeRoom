<?php
include('../model/conexao.php');

$respUser = $_POST['respUser'];
$idPuzzle = $_POST['idPuzzle'];

$query = ("SELECT * FROM puzzle WHERE idPuzzle = '$idPuzzle'");
$registro = mysqli_query($conectado, $query);
while ($registros = mysqli_fetch_array($registro)) {
    $respCorreta = $registros["resposta"];
}
if ($respUser == $respCorreta)
    $pagina = 9;
else
    $pagina = 4;
?>
<script>
    var pagina =<?php echo $pagina; ?>;
    var idPuzzle =<?php echo $idPuzzle; ?>;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/sessao.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("pagina=" + pagina + "&idPuzzle=" + idPuzzle);

    window.location.href = "../view/game.php";
</script>
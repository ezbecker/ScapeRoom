<?php
include('../model/conexao.php');

$idPergunta = $_GET['idPergunta'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>

<body>
    <div class="container-fluid">
        <form action="../controller/resposta.php" method="POST">
            <div class="nomeTextField">
                <input type="text" name="respUser" class="form-control" placeholder="Resposta" required>
            </div>
            <input type="hidden" name="idPergunta" id="idPergunta" value="<?php echo $idPergunta ?>">
            <button type="submit" class="enviar">enviar</button>
        </form>
    </div>
</body>

</html>
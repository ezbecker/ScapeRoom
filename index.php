<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RadioEscape | Login</title>
  <link rel="icon" href="assets/icon.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="view/css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="image">
      <img src="assets/hospitalLogo.png" alt="Imagem de segurança">
    </div>
    <div class="form">
      <p class="title">Entrar</p>
      <p class="subtitle">Digite as suas informações</p>
      <div class="container-fluid">
        <form name="frmUsuario" action="controller/autenticar.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="emailTextField">
            <input name="email" type="email" class="form-control" placeholder="E-mail" required>
          </div>

          <div class="passwordTextField">
            <input name="senha" type="password" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Senha" required minlength="8" maxlength="15" required>
          </div>

          <button type="submit" class="entrar">Entrar</button>
        </form>
      </div>

      <p class="helpText">Se você é novo aqui, crie uma conta!</p>
      <a href="view/cadastroUser.php" class="criar">Criar uma conta</a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
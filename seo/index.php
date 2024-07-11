<?php

# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
?>
<!doctype html>
<html lang="pt-br">

<head>
  <!-- Title -->
  <title>BLOOMIN | Painel Administrativo</title>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta name="revisit-after" content="20 days">
  <meta name="robots" content="index,nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <!-- CDN -->
<?php include 'inc/inc.cdn.php';?>
  <!-- CSS -->
  <!-- <link rel="stylesheet" href="styles/css/forms.css?v=<?=filemtime('styles/css/forms.css')?>"> -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Loader -->
<?php include 'inc/inc.loader.php';?>
<!-- Content -->
<main>
  <!-- Login-->
  <div class="container align-self-center">
    <div class="row p-4">
      <div class="card col-md-4 mx-auto">
        <form action="login" method="post">
          <div class="px-4 pb-4"><img src="https://www.bloomin.com.br/projetos/rodape/rodape-site-color.png" class="img-fluid" style="height:100px;width:auto;"></div>
          <div class="form-group">
            <label>Usuário:</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="form-group">
            <label>Senha:</label>
            <input type="password" class="form-control" name="password">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login<i class="fas fa-sign-in-alt fa-fw ml-2"></i></button>
        </form>
        <hr class="mt-4">
        <div class="text-center"><a href="recuperar-senha">Esqueceu sua senha?</a></div>
      </div>
    </div>
  </div>
  
</main>
<!-- CDN -->
<?php include 'inc/inc.js.php';?>
<!-- JavaScript -->
<script src="js/fcn.login.js"></script>
<script src="js/std.scripts.js"></script>
</body>
</html>
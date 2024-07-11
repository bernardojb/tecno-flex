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
  <meta name="author" content="Kauê Porte">
  <meta name="revisit-after" content="20 days">
  <meta name="robots" content="index,nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <!-- CDN -->
<?php include 'inc/inc.cdn.php';?>
  <!-- CSS -->
  <link rel="stylesheet" href="styles/css/forms.css?v=<?=filemtime('styles/css/forms.css')?>">
</head>
<body>
<!-- Loader -->
<?php include 'inc/inc.loader.php';?>
<!-- Content -->
<main>
  <!-- Login-->
  <div class="container align-self-center">
    <div class="row p-4">
      <div class="card p-4 mx-auto">
        <form action="resetar" method="post">
          <div class="px-4 pb-4"><img src="img/logo.svg" class="img-fluid" style="height:100px;width:auto;" alt="ACTBR" title="ACTBR"></div>
          <div class="form-group">
            <label>Digite seu e-mail cadastrado:</label>
            <input type="text" class="form-control" name="email">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Recuperar<i class="fas fa-sign-in-alt fa-fw ml-2"></i></button>
        </form>
        <hr class="mt-4">
        <div class="text-center"><a href="login-form">Voltar</a></div>
      </div>
    </div>
  </div>
</main>
<!-- CDN -->
<?php include 'inc/inc.js.php';?>
<!-- JavaScript -->
<script src="js/std.scripts.js"></script>
</body>
</html>
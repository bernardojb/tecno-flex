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
      <div class="card p-4 mx-auto text-center">
        <div class="px-4 pb-4"><img src="img/logo.svg" class="img-fluid" style="height:100px;width:auto;"></div>
        <p><strong>Ops! Algo deu errado!</strong></p>
        <p>Por favor, retorne para a HOME e tente novamente.</p>
        <hr class="mt-4">
        <div class="text-center"><a href="dashboard">Home</a></div>
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
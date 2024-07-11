<?php

# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
# --------------------------------------------------
# Page protection
# --------------------------------------------------
require_once 'lib/class.check.php';
# --------------------------------------------------
# Includes
# --------------------------------------------------
require_once 'lib/cfg.global.php';
# --------------------------------------------------
# SQL
# --------------------------------------------------
$sql        = "SELECT * FROM logs WHERE log_user_id = ? ORDER BY log_time DESC LIMIT 5";
$arrayParam = array($_SESSION['user_id']);
$data_log   = $crud_log->getSQLGeneric($sql, $arrayParam, true);
?>
<!doctype html>
<html lang="pt-br">

<head>
  <!-- Title -->
  <title>BLOOMIN | Perfil</title>
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
<?php include 'inc/inc.css.php';?>
</head>
<body>
<!-- Loader -->
<?php include 'inc/inc.loader.php';?>
<!-- Content -->
<main>
  <!-- Navbar -->
<?php include 'inc/inc.header.php';?>
  <!-- Breadcrumb -->
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">Perfil</li>
    </ol>
  </nav>
  <!-- Header -->
  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-title">Perfil</h1>
        </div>
      </div>
    </div>
  </header>
  <!-- Page Content -->
  <section>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Informações</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-2 border-right d-flex align-items-center justify-content-center">
                  <ul class="list-unstyled direct">
                    <li class="mb-2">
                      <span class="fa-stack fa-3x">
                        <i class="fas fa-user fa-stack-1x"></i>
                        <i class="far fa-circle fa-stack-2x"></i>
                      </span>
                    </li>
                    <li class="mb-2"><b>ID:</b> #<?=$_SESSION['user_id']?></li>
                    <li class="mb-2"><b>Nome:</b> <?=$_SESSION['user_name']?></li>
                    <li class="mb-2"><b>Username:</b> <?=$_SESSION['user_username']?></li>
                    <li class="mb-2"><b>Papel:</b> <?=$_SESSION['user_role']?></li>
                  </ul>
                </div>
                <div class="col-lg-3 border-right d-flex align-items-center justify-content-center">
                  <form action="senha" method="post">
                    <div class="form-group">
                      <label>Senha atual:</label>
                      <input type="password" class="form-control" name="curr_password" data-eye>
                    </div>
                    <div class="form-group">
                      <label>Nova senha:</label>
                      <input type="password" class="form-control" name="new_password" data-eye>
                    </div>
                    <div class="form-group">
                      <label>Confirme a nova senha:</label>
                      <input type="password" class="form-control" name="conf_password" data-eye>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Modificar senha<i class="fas fa-edit fa-fw ml-2"></i></button>
                  </form>
                </div>
                <div class="col-lg-7 d-flex align-items-center justify-content-center">
                  <div class="table-responsive">
                    <table data-toggle="table" data-classes="table table-striped table-hover text-center">
                      <thead>
                        <tr>
                          <th data-sortable="true">Tipo</th>
                          <th data-sortable="true">IP</th>
                          <th data-sortable="true">Data e horário</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($data_log as $log_info):?>
                        <tr>
                          <td><?=$log_info->log_type?></td>
                          <td><?=$log_info->log_ip?></td>
                          <td><?=$log_info->log_time?></td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- Footer -->
<?php include 'inc/inc.footer.php';?>
<!-- CDN -->
<?php include 'inc/inc.js.php';?>
<!-- JavaScript -->
<script src="js/fcn.login.js"></script>
<script src="js/std.scripts.js"></script>
</body>
</html>
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
require_once 'lib/std.functions.php';
# --------------------------------------------------
# SQL
# --------------------------------------------------
$sql         = "SELECT * FROM categories ORDER BY cat_title ASC";
$arrayParam  = array();
$data_cat    = $crud_cat->getSQLGeneric($sql, $arrayParam, true);
# --------------------------------------------------
$sql         = "SELECT * FROM subcategories ORDER BY subcat_title ASC";
$arrayParam  = array();
$data_subcat = $crud_subcat->getSQLGeneric($sql, $arrayParam, true);
# --------------------------------------------------
$sql         = "SELECT * FROM products ORDER BY prod_title ASC";
$arrayParam  = array();
$data_prod   = $crud_prod->getSQLGeneric($sql, $arrayParam, true);
# --------------------------------------------------
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
      <li class="breadcrumb-item active">Resumo</li>
    </ol>
  </nav>
  <!-- Header -->
  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-title">Resumo</h1>
        </div>
      </div>
    </div>
  </header>
  <!-- Page Content -->
  <section>
    <div class="container-fluid">
        <?php
            if($itemcategoria){
        ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Mostrando as 05 primeiras <span>      <?=$nomeitemcategoria?></span> - <strong><?=count($data_cat)?></strong> cadastradas</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table data-toggle="table" data-classes="table table-striped table-hover text-center" data-search="true">
                  <thead>
                    <tr>
                      <th data-sortable="true">#ID da Categoria</th>
                      <th data-sortable="true">Título</th>
                      <th data-sortable="true">Prioridade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach(array_slice($data_cat, 0, 5) as $cat_info): ?>
                    <tr>
                      <td><?=$cat_info->cat_id?></td>
                      <td><?=$cat_info->cat_title?></td>
                      <td><?=$cat_info->cat_priority?></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <a href="visualizar?mode=cat" class="btn btn-primary"><i class="fas fa-eye fa-fw mr-2"></i>Ver tudo</a>
            </div>
          </div>
        </div>
      </div>
      <?php
        } //Fechamento if itemcategoria.
        if($itemsubcategoria){
      ?>
      <hr class="card-spacer">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Mostrando as 05 primeiras <span><?=$nomeitemsubcategoria?></span> - <strong><?=count($data_subcat)?></strong> cadastradas</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table data-toggle="table" data-classes="table table-striped table-hover text-center" data-search="true">
                  <thead>
                    <tr>
                      <th data-sortable="true">#ID da Subcategoria</th>
                      <th data-sortable="true">#ID da Categoria</th>
                      <th data-sortable="true">Título</th>
                      <th data-sortable="true">Prioridade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach(array_slice($data_subcat, 0, 5) as $subcat_info): ?>
                    <tr>
                      <td><?=$subcat_info->subcat_id?></td>
                      <td><?=$subcat_info->cat_id?></td>
                      <td><?=$subcat_info->subcat_title?></td>
                      <td><?=$subcat_info->subcat_priority?></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <a href="visualizar?mode=subcat" class="btn btn-primary"><i class="fas fa-eye fa-fw mr-2"></i>Ver tudo</a>
            </div>
          </div>
        </div>
      </div>
      <?php
        }// fechamento if itemsubcategoria
        if($itemproduto){
      ?>
      <hr class="card-spacer">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Mostrando os 05 primeiros <span><?=$nomeitemproduto?></span> - <strong><?=count($data_prod)?></strong> cadastrados</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table data-toggle="table" data-classes="table table-striped table-hover text-center" data-search="true">
                  <thead>
                    <tr>
                      <th data-sortable="true">#ID do Produto</th>
                      <th data-sortable="true">#ID da Subcategoria</th>
                      <th data-sortable="true">Título</th>
                      <th data-sortable="true">Código</th>
                      <th data-sortable="true">Prioridade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach(array_slice($data_prod, 0, 5) as $prod_info): ?>
                    <tr>
                      <td><?=$prod_info->prod_id?></td>
                      <td><?=$prod_info->subcat_id?></td>
                      <td><?=$prod_info->prod_title?></td>
                      <td><?=$prod_info->prod_code?></td>
                      <td><?=$prod_info->prod_priority?></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <a href="visualizar?mode=prod" class="btn btn-primary"><i class="fas fa-eye fa-fw mr-2"></i>Ver tudo</a>
            </div>
          </div>
        </div>
      </div>
    <?php
        }//fechamento if itemprodutos
    ?>
    </div>
  </section>
</main>
<!-- Footer -->
<?php include 'inc/inc.footer.php';?>
<!-- CDN -->
<?php include 'inc/inc.js.php';?>
<!-- JavaScript -->
<script src="js/std.scripts.js"></script>
</body>
</html>
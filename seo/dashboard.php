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
$sql         = "SELECT * FROM seo ORDER BY id ASC";
$arrayParam  = array();
$data_cat    = $crud_cat->getSQLGeneric($sql, $arrayParam, true);

# --------------------------------------------------
//print_r($data_cat);
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
  <?php include 'inc/inc.css.php';?>
</head>

<body>
<main class="wrapper">
<?php include 'inc/inc.header.php';?>
  <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Resumo</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">

              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <!-- <h4 class="card-title ">Simple Table</h4> -->
                  <p class="card-category">Mostrando as 05 primeiras
                  <span>páginas</span> - <strong><?=count($data_cat)?></strong> cadastradas</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead class=" text-primary">
                      <tr>
                        <th data-sortable="true">#ID da Página</th>
                        <th data-sortable="true">Título</th>
                        <!-- <th data-sortable="true">Prioridade</th> -->
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach(array_slice($data_cat, 0, 5) as $cat_info): ?>
                      <tr>
                        <td><?=$cat_info->id?></td>
                        <td><?=$cat_info->pag_title?></td>
                        <!-- <td><?=$cat_info->cat_priority?></td> -->
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
      <footer class="footer">

      </footer>
    </div>
</main>
  <!-- Loader -->
  <?php include 'inc/inc.loader.php';?>
  <!-- Content -->
  <main style="display:none">
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
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header py-3">
                <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Mostrando as 05 primeiras
                  <span>páginas</span> - <strong><?=count($data_cat)?></strong> cadastradas</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table data-toggle="table" data-classes="table table-striped table-hover text-center"
                    data-search="true">
                    <thead>
                      <tr>
                        <th data-sortable="true">#ID da Página</th>
                        <th data-sortable="true">Título</th>
                        <!-- <th data-sortable="true">Prioridade</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach(array_slice($data_cat, 0, 5) as $cat_info): ?>
                      <tr>
                        <td><?=$cat_info->id?></td>
                        <td><?=$cat_info->pag_title?></td>
                        <!-- <td><?=$cat_info->cat_priority?></td> -->
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
        <hr class="card-spacer">
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
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
# Variables
# --------------------------------------------------
$mode = $_GET['mode'];
# --------------------------------------------------
# Allowed modes
# --------------------------------------------------
$allowedModes = array('cat','subcat','prod');
# --------------------------------------------------
if(!in_array($mode, $allowedModes))
{
  echo '<script type="text/javascript">';
  echo 'alert("Parâmetros incorretos");';
  echo 'window.history.back();';
  echo '</script>';
  exit;
}
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
<!-- Loader -->
<?php include 'inc/inc.loader.php';?>
<!-- Content -->
<main class="wrapper">
<?php include 'inc/inc.header.php';?>
  <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
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
          <!-- Page Content -->
<?php
  switch($mode)
  {
    # --------------------------------------------------
    case "cat":
    # --------------------------------------------------
  ?>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="material-icons">add</i> Criando nova <strong>Categoria</strong></h5>
            </div>
            <div class="card-body">
              <form action="adicionar" method="POST">
                <input type="hidden" name="mode" value="cat">
                <div class="form-row">
                  <div class="form-group col-lg-4">
                    <label>TÍTULO da nova Categoria</label>
                    <input type="text" class="form-control" name="cat_title">
                  </div>
                  <div class="form-group col-lg-4">
                    <label for="">URL amigável</label>
                    <input type="text" class="form-control" name="cat_url" value="">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>PRIORIDADE</label>
                    <input type="number" class="form-control" name="cat_priority" min="1" max="9999" value="9999">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Confirma essas informações?');"><i class="material-icons">add</i> Criar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
    break;
    # --------------------------------------------------
    case "subcat":
    # --------------------------------------------------
      $sql        = "SELECT * FROM categories";
      $arrayParam = array();
      $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, true);
  ?>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="material-icons">add</i> Criando nova <strong>Subcategoria</strong></h5>
            </div>
            <div class="card-body">
              <form action="adicionar" method="POST">
                <input type="hidden" name="mode" value="subcat">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label class="d-block">CATEGORIA da Subcategoria</label>
                    <select class="custom-select d-block" name="cat_id">
                    <?php foreach($data_cat as $cat_info):?>
                      <option value="<?=$cat_info->cat_id?>">#<?=$cat_info->cat_id?> - <?=$cat_info->cat_title?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>PRIORIDADE</label>
                    <input type="number" class="form-control" name="subcat_priority" min="1" max="9999" value="9999">
                  </div>
                </div>
                  <div class="form-row">
                <div class="form-group col-lg-6">
                  <label>TÍTULO da Subcategoria</label>
                  <input type="text" class="form-control" name="subcat_title">
                </div>
                  <div class="form-group col-lg-6">
                    <label for="">URL amigável</label>
                    <input type="text" class="form-control" name="subcat_url" value="">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Confirma essas informações?');"><i class="material-icons">add</i> Criar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php 
    break; 
    # --------------------------------------------------
    case "prod":
    # --------------------------------------------------
      $sql        = "SELECT * FROM categories";
      $arrayParam = array();
      $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, true);
  ?>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="material-icons">add</i> Criando nova <strong>Página</strong></h5>
            </div>
            <div class="card-body">
              <form action="adicionar" method="POST">
                <input type="hidden" name="mode" value="prod">
                <div class="form-row">

                </div>

                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="">TÍTULO da Página</label>
                    <input type="text" class="form-control" name="pag_title" value="">
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="">URL amigável</label>
                    <input type="text" class="form-control" name="pag_url" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" rows="10" maxlength="150" name="pag_description" value="Escreva sua mensagem"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Texto - Primeira Parte</label>
                  <textarea class="form-control summernote" rows="10" name="pag_content1" value="Escreva sua mensagem"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Texto - Segunda Parte</label>
                  <textarea class="form-control summernote" rows="10" name="pag_content2" value="Escreva sua mensagem"></textarea>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="">TÍTULO do CTA</label>
                    <input type="text" class="form-control" name="pag_cta_txt" value="">
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="">Link do CTA</label>
                    <input type="text" class="form-control" name="pag_cta_link" value="">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Confirma essas informações?');"><i class="material-icons">add</i> Criar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
  break;
}
?>
          </div>
        </div>
      </div>
</main>
<!-- Footer -->
<?php include 'inc/inc.footer.php';?>
<!-- CDN -->
<?php include 'inc/inc.js.php';?>
<!-- JavaScript -->
<script src="js/fcn.combobox.js"></script>
<script src="js/std.scripts.js"></script>
</body>
</html>
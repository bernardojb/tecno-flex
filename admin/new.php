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
<main>
  <!-- Navbar -->
<?php include 'inc/inc.header.php';?>
  <!-- Breadcrumb -->
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">Adicionar</li>
    </ol>
  </nav>
  <!-- Header -->
  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-title">Adicionar</h1>
        </div>
      </div>
    </div>
  </header>
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
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Criando nova <strong>Categoria</strong></h5>
            </div>
            <div class="card-body">
              <form action="adicionar" method="POST">
                <input type="hidden" name="mode" value="cat">
                <div class="form-row">
                  <div class="form-group col-lg-7">
                    <label>TÍTULO da nova Categoria</label>
                    <input type="text" class="form-control" name="cat_title">
                  </div>
                  <div class="form-group col-lg-5">
                    <label>PRIORIDADE</label>
                    <input type="number" class="form-control" name="cat_priority" min="1" max="9999" value="9999">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Confirma essas informações?');"><i class="fas fa-plus-circle mr-2"></i>Criar</button>
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
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Criando nova <strong>Subcategoria</strong></h5>
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
                  <div class="form-group col-lg-12">
                    <label for="">TÍTULO da Subcategoria   <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item">Coloque o nome da Subcategoria,<br> não se preocupe com espaços<br> ou caracteres especiais</a>
                      </div> </label>
                  <input type="text" class="form-control" name="subcat_title">
                  </div>
                  <!-- <div class="form-group col-lg-6">
                    <label for="">URL amigável da Subcategoria  
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item">Para evitar um codigo enorme no final da url do site<br> coloque o nome da Subcategoria ou algo que remete ao mesmo.<br> No entanto, ao cadastrar os produtos se atente para não<br> colocar nomes iguais, acarretando em problemas na exibição.<br> Não use caracteres especiais, troque o espaço por "-"<br> e retire a acentuação.  </a>
                          </div>
                    </label>
                    <input type="text" class="form-control" name="subcat_url" value="">
                  </div> -->
                </div>             
            <button type="submit" class="btn btn-primary" onclick="return confirm('Confirma essas informações?');"><i class="fas fa-plus-circle mr-2"></i>Criar</button>
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
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Criando novo <strong><?=$nomeitemproduto?></strong></h5>
            </div>
            <div class="card-body">
              <form action="adicionar" method="POST">
                <input type="hidden" name="mode" value="prod">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label class="d-block">CATEGORIA do <?=$nomeitemproduto?></label>
                    <select class="custom-select d-block" name="cat_id" id="cat_id">
                      <option value="">Selecione a <?=$nomeitemcategoria?></option>
                      <?php foreach($data_cat as $cat_info):?>
                      <option value="<?=$cat_info->cat_id?>">#<?=$cat_info->cat_id?> - <?=$cat_info->cat_title?></option>
                      <?php endforeach;?>
                    </select>
                  </div>

                  <div class="form-group col-lg-6">
                    <label class="d-block">Exibir no site?  </label>
                    <select class="custom-select d-block" name="exibir" id="exibir">
                      <option value="1">Sim</option>
                      <option value="0">Não</option>
                
                    </select>
                  </div>

                  <?php
                  if($itemsubcategoria){
                  ?>
                  <div class="form-group col-lg-6">
                    <label class="d-block"><?=$nomeitemsubcategoria?> do <?=$nomeitemproduto?></label>
                    <select class="custom-select d-block" name="subcat_id" id="subcat_id">
                      <option value="">Selecione <?=$nomeitemcategoria?> primeiro</option>
                    </select>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-12">
                    <label for="">TÍTULO do <?=$nomeitemproduto?>   
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item">Coloque o nome do <?=$nomeitemproduto?>,<br></a>
                      </div> </label>
                    <input type="text" class="form-control" name="prod_title" value="" required>
                  </div>                
                </div>
                <div class="form-group">
                  <label for="">DESCRIÇÃO do Produto</label>
                  <textarea class="form-control summernote"  id="summernote" name="prod_desc" value="Escreva sua mensagem"></textarea>
                </div>               
                <button type="submit" class="btn btn-primary" onclick="return confirm('Confirma essas informações?');"><i class="fas fa-plus-circle mr-2"></i>Criar</button>
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
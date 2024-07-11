<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

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
$allowedModes = array('cat','subcat','prod','fav');
# --------------------------------------------------
if(!in_array($mode, $allowedModes))
{
  echo '<script type="text/javascript">'; 
  echo 'alert("Parâmetros incorretos");'; 
  echo 'window.location.href="dashboard";';
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
      <li class="breadcrumb-item active">Visualizar</li>
    </ol>
  </nav>
  <!-- Header -->
  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-title">Visualizar</h1>
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
      $sql        = "SELECT * FROM categories ORDER BY cat_title ASC";
      $arrayParam = array();
      $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, true);
  ?>
  <section style="margin-top:-30px;">
    <div class="container-fluid">
      <div class="row py-2">
        <div class="col-lg-12 text-right">
          <a href="novo?mode=cat" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Adicionar</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>[<?=count($data_cat)?>] <?=$nomeitemcategoria?> cadastradas</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table data-toggle="table" data-classes="table table-striped table-hover text-center" data-search="true">
                  <thead>
                    <tr>
                      <th data-sortable="true">#ID da Categoria</th>
                      <th data-sortable="true">Título</th>
                      <th data-sortable="true">Prioridade</th>
                      <th data-sortable="true">Gerenciar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data_cat as $cat_info):?>
                    <tr>
                      <td><?=$cat_info->cat_id?></td>
                      <td><?=$cat_info->cat_title?></td>
                      <td><?=$cat_info->cat_priority?></td>
                      <td>
                        <?php
                        if($editarcategoria){
                        ?>
                            <a href="editar?mode=cat&item=cat&cat=<?=$cat_info->cat_id?>" class="btn btn-secondary"><i class="fas fa-edit mr-2"></i>Editar</a>
                        <?php
                            }//fim editar categoria
                        if($imagemcategoria){
                        ?>
                            <a href="editar?mode=cat&item=img&cat=<?=$cat_info->cat_id?>" class="btn btn-success"><i class="fas fa-edit mr-2"></i>Imagem</a>
                        <?php
                            }//fim editar iamgem
                        if($pdfcategoria){
                        ?>  
                            <a href="editar?mode=cat&item=pdf&cat=<?=$cat_info->cat_id?>" class="btn btn-info"><i class="fas fa-edit mr-2"></i>PDF</a>
                        <?php
                            }//fim pdf categoria
                        if($excluircategoria){
                        ?>
                        <a href="deletar?mode=cat&cat=<?=$cat_info->cat_id?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa categoria? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt mr-2"></i>Excluir</a>
                        <?php
                            }//fim excluir categoria

                        ?>
                      </td>
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
  </section>
  <?php
  break;
  # --------------------------------------------------
  case "subcat":
  # --------------------------------------------------
    $sql         = "SELECT * FROM subcategories ORDER BY subcat_title ASC";
    $arrayParam  = array();
    $data_subcat = $crud_subcat->getSQLGeneric($sql, $arrayParam, true);
  ?>
  <section style="margin-top:-30px;">
    <div class="container-fluid">
      <div class="row py-2">
        <div class="col-lg-12 text-right">
          <a href="novo?mode=subcat" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Adicionar</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>[<?=count($data_subcat)?>] subcategorias cadastradas</h5>
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
                      <th data-sortable="true">Gerenciar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data_subcat as $subcat_info):?>
                    <tr>
                      <td><?=$subcat_info->subcat_id?></td>
                      <td><?=$subcat_info->cat_id?></td>
                      <td><?=$subcat_info->subcat_title?></td>
                      <td><?=$subcat_info->subcat_priority?></td>
                      <td>
                        <?php
                            if($editarsubcategoria){
                        ?>
                        <a href="editar?mode=subcat&item=subcat&subcat=<?=$subcat_info->subcat_id?>" class="btn btn-secondary"><i class="fas fa-edit mr-2"></i>Editar</a>
                        <?php
                            }//Fim editar subcategoria
                            if($imagemsubcategoria){
                        ?>
                       <a href="editar?mode=subcat&item=img&subcat=<?=$subcat_info->subcat_id?>" class="btn btn-success"><i class="fas fa-edit mr-2"></i>Imagem</a>
                       <?php
                            }//fim imagem subcategoria
                            if($pdfsubcategoria){
                       ?> 
                       <a href="editar?mode=subcat&item=pdf&subcat=<?=$subcat_info->subcat_id?>" class="btn btn-info"><i class="fas fa-edit mr-2"></i>PDF</a>
                        <?php
                            }//fim imagem subcategoria
                            if($excluirsubcategoria){
                        ?>
                        <a href="deletar?mode=subcat&subcat=<?=$subcat_info->subcat_id?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa categoria? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt mr-2"></i>Excluir</a>
                        <?php
                            }
                        ?>
                      </td>
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
  </section>
  <?php
  break;
  # --------------------------------------------------
  case "prod":
  # --------------------------------------------------
    $sql        = "SELECT * FROM products ORDER BY prod_title ASC";
    $arrayParam = array();
    $data_prod  = $crud_prod->getSQLGeneric($sql, $arrayParam, true);
  ?>
  <section style="margin-top:-30px;">
    <div class="container-fluid">
      <div class="row py-2">
        <div class="col-lg-12 text-right">
          <a href="novo?mode=prod" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Adicionar</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>[<?=count($data_prod)?>] post cadastrados</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table data-toggle="table" data-classes="table table-striped table-hover text-center" data-search="true">
                  <thead>
                    <tr>
                      <th data-sortable="true">#ID do Post</th>
                      <th data-sortable="true">#ID da Subcategoria</th>
                      <th data-sortable="true">Título</th>
                      
                      <th data-sortable="true">Gerenciar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data_prod as $prod_info):?>
                    <tr>
                      <td><?=$prod_info->prod_id?></td>
                      <td><?=$prod_info->subcat_id?></td>
                      <td><?=$prod_info->prod_title?></td>
                      <td>
                      <!-- <form class="btn " action="app/add.php" method="POST">
                            <input type="hidden" name="mode" value="fav">
                            <input type="hidden" name="prod_id" value="<?=$prod_info->prod_id?>">
                            <button class="btn btn-warning" type="submit"><i class="fas fa-star mr-2"></i>Destaque</button>
                       </form> -->
                       <?php
                        if($editarproduto ){
                       ?>
                       <a href="editar?mode=prod&item=prod&prod=<?=$prod_info->prod_id?>" class="btn btn-secondary"><i class="fas fa-edit mr-2"></i>Editar</a>
                       <?php
                        }//fim editar produto
                        if($pdfproduto ){
                       ?>
                        <a href="editar?mode=prod&item=pdf&prod=<?=$prod_info->prod_id?>" class="btn btn-info"><i class="fas fa-edit mr-2"></i>PDF</a>
                        <?php
                        }//fim pdf pdf
                        if($imagemproduto ){
                       ?>
                       <a href="editar?mode=prod&item=img&prod=<?=$prod_info->prod_id?>" class="btn btn-success"><i class="fas fa-edit mr-2"></i>Imagem</a>
                       <?php
                        }//fim imagem pdf
                        if($excluirproduto ){
                       ?>

                       <a href="deletar?mode=prod&prod=<?=$prod_info->prod_id?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa categoria? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt mr-2"></i>Excluir</a>

                       <?php
                        }//fim excluir produto
                       ?>


                      </td>
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
  </section>
  <?php
  break;
  # --------------------------------------------------
  case "fav":
  # --------------------------------------------------
    $sql        = "SELECT * FROM favoritos ORDER BY fav_prioridade ASC";
    $arrayParam = array();
    $data_fav  = $crud_fav->getSQLGeneric($sql, $arrayParam, true);
  ?>
  <section style="margin-top:-30px;">
    <div class="container-fluid">
      <div class="row py-2">
        <div class="col-lg-12 text-right">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>[<?=count($data_fav)?>] Categorias em Destaque</h5>
            </div>
            <div class="card-body">
                <?php
                $total = count($data_fav);
                if($total > 20){?>
                    <div class="alert alert-info text-center" style="background-color:#B22222!important; color:white!important;">
        <b><h1><strong>ATENÇÃO!</strong></h1></b>
        <h2>Você possui <strong>mais de 20</strong> produtos cadastrados, apenas <strong>os 20 primeiros</strong> serão exibidos</h2>
      </div>
                <?}else{?>
                <div class="alert alert-info text-center">
        <b><h1><strong>ATENÇÃO!</strong></h1></b>
        <h2>Apenas os <strong>20 primeiros </strong> produtos cadastrados serão exibidos.</h2>
      </div>
                
                
                <?}?>
              <div class="table-responsive">
                <table data-toggle="table" data-classes="table table-striped table-hover text-center" data-search="true">
                  <thead>
                    <tr>
                      <th data-sortable="true">Prioridade</th>
                      <th data-sortable="true">#ID do Produto</th>
                      <th data-sortable="true">Título</th>
                      <th data-sortable="true">Gerenciar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $i = 1;
                         foreach($data_fav as $fav_info):

                      $sql        = "SELECT * FROM products WHERE prod_id = ?";
                      $arrayParam = array($fav_info->prod_id);
                      $data_prod  = $crud_prod->getSQLGeneric($sql, $arrayParam, false);   

                      if($i > 20){
                      $cor = 'red';
                      }else{
                      $cor = 'black';
                      }
                      ?>
                    <tr>
                        <td><p style="color: <?= $cor ?>!important;"><?=$fav_info->fav_prioridade?></p></td>
                        <td><p style="color: <?= $cor ?>!important;"><?=$data_prod->prod_id?></p></td>
                        <td><p style="color: <?= $cor ?>!important;"><?=$data_prod->prod_title?></p></td>
                      <td>
                          <a href="editar?mode=destaque&destaque=<?=$fav_info->fav_id?>" class="btn btn-primary  ml-2"><i class="fas fa-sort-numeric-up"></i> Prioridade</a>
                        <a href="deletar?mode=fav&fav=<?=$fav_info->fav_id?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa categoria? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt mr-2"></i>Excluir</a>
                      </td>
                    </tr>
                    <?php  
                        $i++;
                        endforeach;?>
                  </tbody>
                </table>
              </div>
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
<script src="js/std.scripts.js"></script>
</body>
</html>
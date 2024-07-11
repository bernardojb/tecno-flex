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

<main class="wrapper">
<?php include 'inc/inc.header.php';?>
  <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Gerenciar Páginas</a>
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
          <?php 
          if($_GET['s'] == 's'){
            echo '<div class="msg alert alert-success" style=" position: absolute; top: 15px; margin: 0 auto; z-index: 999999;">Alteração realizada com Sucesso!</div>';
          };
          ?>
 
              <!-- Page Content -->
                <?php
                switch($mode):
                
                  # --------------------------------------------------
                  case "cat":
                  # --------------------------------------------------
                    $sql        = "SELECT * FROM seo ORDER BY cat_title ASC";
                    $arrayParam = array();
                    $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, true);
                ?>
                <div class="col-md-12 text-right">
                    <a href="novo?mode=cat" class="btn btn-success float-right"><i class="material-icons">add</i> Adicionar</a>
                  </div>
                <div class="col-md-12">
                  
                  <div class="card">
                    
                      <div class="card-header card-header-primary">
                        <!-- <h4 class="card-title ">Simple Table</h4> -->
                        <p class="card-category">Mostrando <strong>[<?=count($data_cat)?>] categorias cadastradas</p>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead class=" text-primary">
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
                                  <a href="editar?mode=cat&cat=<?=$cat_info->cat_id?>" class="btn btn-secondary"><i class="fas fa-edit mr-2"></i>Editar</a>
                                  <a href="deletar?mode=cat&cat=<?=$cat_info->cat_id?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa categoria? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt mr-2"></i>Excluir</a>
                                </td>
                              </tr>
                              <?php endforeach;?>
                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>
                </div>

                <?php
                break;
                # --------------------------------------------------
                case "subcat":
                # --------------------------------------------------
                  $sql         = "SELECT * FROM subcategories ORDER BY subcat_title ASC";
                  $arrayParam  = array();
                  $data_subcat = $crud_subcat->getSQLGeneric($sql, $arrayParam, true);
                ?>

                  <div class="col-md-12 text-right">
                    <a href="novo?mode=subcat" class="btn btn-success float-right"><i class="material-icons">add</i> Adicionar</a>
                  </div>
                <div class="col-md-12">
                  
                  <div class="card">
                    
                      <div class="card-header card-header-primary">
                        <!-- <h4 class="card-title ">Simple Table</h4> -->
                        <p class="card-category">Mostrando <strong>[<?=count($data_subcat)?>] categorias cadastradas</p>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead class=" text-primary">
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
                                  <a href="editar?mode=subcat&subcat=<?=$subcat_info->subcat_id?>" class="btn btn-secondary"><i class="fas fa-edit mr-2"></i>Editar</a>
                                  <a href="deletar?mode=subcat&subcat=<?=$subcat_info->subcat_id?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa categoria? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt mr-2"></i>Excluir</a>
                                </td>
                              </tr>
                              <?php endforeach;?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                </div>
                

                <?php
                break;
                # --------------------------------------------------
                case "prod":
                # --------------------------------------------------
                  $sql        = "SELECT * FROM seo ORDER BY id ASC";
                  $arrayParam = array();
                  $data_prod  = $crud_prod->getSQLGeneric($sql, $arrayParam, true);
                  
                ?>
                <div class="col-md-12">
                  <a href="novo?mode=prod" class="btn btn-success float-right btn-add" alt="Adicionar" style="z-index:99999"><i class="material-icons">add</i></a>
                </div>
                <div class="col-md-12">
                  
                  <div class="card">
                    
                      <div class="card-header card-header-primary">
                        <!-- <h4 class="card-title ">Simple Table</h4> -->
                        <p class="card-category float-left">Mostrando <strong>[<?=count($data_prod)?>] páginas cadastradas</p>
                        
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead class=" text-primary">
                              <tr>
                                <th data-sortable="true">#ID da Página</th>
                                <th data-sortable="true">Título</th>
                                <th data-sortable="true">Gerenciar</th>
                              </tr>
                            </thead>  
                            <tbody>
                            <?php foreach($data_prod as $prod_info):?>
                            <tr>
                              <td><?=$prod_info->id?></td>
                              <!-- <td><?=$prod_info->subcat_id?></td> -->
                              <td><?=$prod_info->pag_title?></td>
                              <!-- <td><?=$prod_info->prod_code?></td>
                              <td><?=$prod_info->prod_priority?></td> -->
                              <td>
                                <a href="editar?mode=prod&prod=<?=$prod_info->id?>" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                <a href="deletar?mode=prod&prod=<?=$prod_info->id?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa categoria? Essa ação NÃO pode ser desfeita.');"><i class="material-icons">delete</i></a>
                                <?php
                                  if(!$prod_info->ativo){?>
                                    <a href="ativar?mode=prod&id=<?=$prod_info->id?>" class="btn btn-success" ><i class="material-icons"></i>Ativar</a>
                                  <?php
                                  }else{
                                  ?>

                                    <a href="desativar?mode=prod&id=<?=$prod_info->id?>" class="btn " ><i class="fas fa-trash-alt mr-2"></i>Desativar</a>


                                 <?php

                                  }
                                ?>
                                
                                
                              </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                          </table>
                          <a href="ativar?mode=prodAll" class="btn btn-success" ><i class="material-icons"></i>Ativar Todos</a>
                          <a href="desativar?mode=prodAll" class="btn" ><i class="material-icons"></i>Desativar Todos</a>
              


                        </div>
                      </div>
                    </div>
                </div>



                        <?php endswitch;?>

          </div>
        </div>
      </div>
  </div>
</main>
<!-- Loader -->
<?php include 'inc/inc.loader.php';?>
<!-- Content -->

<!-- Footer -->
<?php include 'inc/inc.footer.php';?>
<!-- CDN -->
<?php include 'inc/inc.js.php';?>
<!-- JavaScript -->
<script src="js/std.scripts.js"></script>
<script>
  function getUrlVars() {
      var vars = {};
      var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
          vars[key] = value;
      });
      return vars;
  }
  var s = getUrlVars()['s'];
  var verificaUrl = function verificaUrl(){
    if(s == 's'){
      $( '.msg' ).fadeTo( "slow", 0 );
      console.log('foi');
    }
    
  }
  setTimeout(verificaUrl, 2000);
msg
  // var explode = function(){
  //   alert("Boom!");
  // };
  // setTimeout(explode, 2000);
</script>
</body>
</html>
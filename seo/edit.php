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
$mode     = $_GET['mode'];
$cat      = $_GET['cat'];
$subcat   = $_GET['subcat'];
$prod     = $_GET['prod'];
$item     = $_GET['item'];
# --------------------------------------------------
# Allowed modes
# --------------------------------------------------
$allowedModes = array('cat','subcat','prod');
$allowedItems = array('img');
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
              <!-- Page Content -->
              <?php
  switch($mode)
  {
    # --------------------------------------------------
    case "cat":
    # --------------------------------------------------
      if($cat == '')
      {
        echo '<script type="text/javascript">';
        echo 'alert("Parâmetros incorretos");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
      # ----------
      $sql        = "SELECT * FROM categories WHERE cat_id = ?";
      $arrayParam = array($cat);
      $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, false);
      # ----------
      if($data_cat == false)
      {
        echo '<script type="text/javascript">';
        echo 'alert("Consulta vazia!");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
  ?>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
              <i class="material-icons">edit</i> Editando a categoria <strong><?=$data_cat->cat_title?></strong> - #<?=$data_cat->cat_id?>
            </div>
            <div class="card-body">
              <form action="atualizar" method="POST">
                <input type="hidden" name="mode" value="cat">
                <input type="hidden" name="cat_id" value="<?=$data_cat->cat_id?>">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label>ID da Categoria</label>
                    <input type="text" class="form-control" value="#<?=$data_cat->cat_id?>" disabled>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>PRIORIDADE</label>
                    <input type="number" class="form-control" name="cat_priority"  min="1" max="9999" value="<?=$data_cat->cat_priority?>">
                  </div>
                </div>
                <div class="form-group">
                  <label>TÍTULO da Categoria</label>
                  <input type="text" class="form-control" name="cat_title" value="<?=$data_cat->cat_title?>">
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Deseja atualizar essas informações?');"><i class="far fa-check-circle mr-2"></i>Salvar</button>
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
      if($subcat == '')
      {
        echo '<script type="text/javascript">';
        echo 'alert("Parâmetros incorretos");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
      # ----------
      $sql         = "SELECT * FROM subcategories WHERE subcat_id = ?";
      $arrayParam  = array($subcat);
      $data_subcat = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);
      # ----------
      $sql         = "SELECT * FROM categories";
      $arrayParam  = array();
      $data_cat    = $crud_cat->getSQLGeneric($sql, $arrayParam, true);
      # ----------
      if($data_subcat == false)
      {
        echo '<script type="text/javascript">';
        echo 'alert("Consulta vazia!");';
        echo 'window.history.back();;';
        echo '</script>';
        exit;
      }
  ?>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
            <i class="material-icons">edit</i> Editando a subcategoria <strong><?=$data_subcat->subcat_title?></strong> - #<?=$data_subcat->subcat_id?>
            </div>
            <div class="card-body">
              <form action="atualizar" method="POST">
                <input type="hidden" name="mode" value="subcat">
                <input type="hidden" name="subcat_id" value="<?=$data_subcat->subcat_id?>">
                <div class="form-row">
                  <div class="form-group col-lg-4">
                    <label>ID da Categoria</label>
                    <select class="custom-select" name="cat_id">
                    <?php foreach($data_cat as $cat_info):?>
                      <option value="<?=$cat_info->cat_id?>"<?=($data_subcat->cat_id == $cat_info->cat_id) ? ' selected' : ''?>>#<?=$cat_info->cat_id?> - <?=$cat_info->cat_title?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>ID da Subcategoria</label>
                    <input type="text" class="form-control" value="#<?=$data_subcat->subcat_id?>" disabled>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>PRIORIDADE</label>
                    <input type="number" class="form-control" name="subcat_priority"  min="1" max="9999" value="<?=$data_subcat->subcat_priority?>">
                  </div>
                </div>
                <div class="form-group">
                  <label>TÍTULO da Subcategoria</label>
                  <input type="text" class="form-control" name="subcat_title" value="<?=$data_subcat->subcat_title?>">
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Deseja atualizar essas informações?');"><i class="far fa-check-circle mr-2"></i>Salvar</button>
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
      if($prod == '')
      {
        echo '<script type="text/javascript">';
        echo 'alert("Parâmetros incorretos");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
      # ----------
      $sql         = "SELECT * FROM seo WHERE id = ?";
      $arrayParam  = array($prod);
      $data_prod   = $crud_prod->getSQLGeneric($sql, $arrayParam, false);

      $sql2         = "SELECT pag_img1, pag_img2, pag_cta_img FROM seo WHERE id = ?";
      $arrayParam2  = array($prod);
      $data_img  = $crud_prod->getSQLGeneric($sql2, $arrayParam2, false);
      # ----------
      print_r($data_prod2);
      if($data_prod == false)
      {
        echo '<script type="text/javascript">'; 
        echo 'alert("Consulta vazia!");'; 
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
  ?>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header py-3">
            <i class="material-icons">edit</i> Editando a página <strong><?=$data_prod->prod_title?></strong> - #<?=$data_prod->id?>
            </div>
            <div class="card-body">
              <form action="atualizar" method="POST">
                <input type="hidden" name="mode" value="prod">
                <input type="hidden" name="id" value="<?=$data_prod->id?>">
                
                <div class="form-group">
                  <label for="">TÍTULO da Página</label>
                  <input type="text" class="form-control" name="pag_title" value="<?=$data_prod->pag_title?>">
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" maxlength="150" rows="10" name="pag_description" value="Escreva sua mensagem"><?=$data_prod->pag_description?></textarea>
                </div>
                <div class="form-group">
                  <label for="">Texto - Primeira Parte</label>
                  <textarea class="form-control summernote" rows="10" name="pag_content1" value="Escreva sua mensagem"><?=$data_prod->pag_content1?></textarea>
                </div>
                <div class="form-group">
                  <label for="">Texto - Segunda Parte</label>
                  <textarea class="form-control summernote" rows="10" name="pag_content2" value="Escreva sua mensagem"><?=$data_prod->pag_content2?></textarea>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="">TÍTULO do CTA</label>
                    <input type="text" class="form-control" name="pag_cta_txt" value="<?=$data_prod->pag_cta_txt?>">
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="">Link do CTA</label>
                    <input type="text" class="form-control" name="pag_cta_link" value="<?=$data_prod->pag_cta_link?>">
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary" onclick="return confirm('Deseja atualizar essas informações?');"><i class="material-icons">save</i> Salvar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <hr class="card-spacer">
      <div class="alert alert-info">
        <b>Sugestão</b><br><br>
        Para melhor exibição de fotos/imagens, de forma que o layout de seu website seja preservado, opte por imagens em modo horizontal/paisagem nos formatos -> quadrado no padrão 1:1 ou retangular nos padrões 4:3 ou 16:9.<br><br>
        Exemplos:<br>
        - 600px de largura por 600px de altura - 1:1<br>
        - 800px de largura por 600px de altura - 4:3<br>
        - 960px de largura por 540px de altura - 16:9<br><br>
        Obs.: fotos/imagens com orientação vertical/retrato podem resultar em distorção do layout
      </div>
      <hr class="card-spacer">
      <div class="row prod-imgs">
        <div class="col-lg-4 col-12">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="material-icons">insert_photo</i>Upload de imagens</h5>
            </div>
            <div class="card-body d-flex align-items-center">
              <form class="w-100" action="upload" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="mode" value="prod">
                <input type="hidden" name="prod_id" value="<?=$data_prod->id?>">
                <div class="form-group">
                  <div class="custom-file">
                    <!-- <label class="custom-file-label">Selecionar nova imagem</label> -->
                    <span>Img - Primeira Parte</span>
                    <input type="file" class="" name="pag_img1[]" multiple><br>
                    <span>Img - Segunda Parte</span>
                    <input type="file" class="" name="pag_img2[]" multiple><br>
                    <span>Img - Call to action</span><br>
                    <input type="file" class="" name="pag_cta_img[]" multiple><br>
                    <small class="form-text text-muted">Até 04 imagens | Formatos: jpg - jpeg - png | Máx. 500Kb por imagem</small>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="material-icons">cloud_upload</i> Upload</button>
              </form>
            </div>
            <div class="card-footer text-center">
              <small>Para reduzir o tamanho de sua imagem, sugerimos a ferramenta: <a href="https://tinyjpg.com/" class="external">TinyJPG</a></small>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 mt-4 mt-lg-0">
          <div class="card">
            <div class="card-header py-3">
              <h5 class="my-0"><i class="material-icons">add_photo_alternate</i> Imagens do Produto</h5>
            </div>
            <div class="card-body text-center">
            <?php
            if(count($data_img) == 0)
            {
              echo '<span class="text-muted">Nenhuma imagem</span>';
            }
            else
            {
            ?>
              <table data-toggle="table" data-classes="table table-striped table-hover text-center" data-search="true">
                <thead>
                  <tr>
                    <th data-sortable="true">Miniatura</th>
                    <th data-sortable="true">Local</th>
                    <!-- <th data-sortable="true">Prioridade</th> -->
                    <th data-sortable="true">Exclusão</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><img src="../img/uploads/products/<?=$data_img->pag_img1?>"></td>
                    <td><p>Primeira Parte</p></td>
                    <td>
                      <a href="deletar?mode=img&item=prod&img=<?=$img_info->img_id?>&prod=<?=$img_info->prod_id?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt fa-fw mr-2"></i>Excluir</a>
                    </td>
                  </tr>
                  <tr>
                    <td><img src="../img/uploads/products/<?=$data_img->pag_img2?>"></td>
                    <td><p>Segunda Parte</p></td>
                   
                    <td>
                      <a href="deletar?mode=img&item=prod&img=<?=$img_info->img_id?>&prod=<?=$img_info->prod_id?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt fa-fw mr-2"></i>Excluir</a>
                    </td>
                  </tr>
                  <tr>
                    <td><img src="../img/uploads/products/<?=$data_img->pag_cta_img?>"></td>
                    <td><p>CTA</p></td>
                    <td>
                      <a href="deletar?mode=img&item=prod&img=<?=$img_info->img_id?>&prod=<?=$img_info->prod_id?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt fa-fw mr-2"></i>Excluir</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              
            <?php
            }
            ?>
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
  </div>
</main>
<!-- Footer -->
<?php include 'inc/inc.footer.php';?>
<!-- CDN -->
<?php include 'inc/inc.js.php';?>
<!-- JavaScript -->
<script src="js/std.scripts.js"></script>
</body>
</html>
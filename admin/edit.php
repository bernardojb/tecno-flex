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
# editar?mode=subcat&item=pdf&subcat=1
# --------------------------------------------------
$mode     = $_GET['mode'];
$cat      = $_GET['cat'];
$subcat   = $_GET['subcat'];
$fav      = $_GET['fav'];
$prod     = $_GET['prod'];
$item     = $_GET['item'];
# --------------------------------------------------
# Allowed modes


# --------------------------------------------------
$allowedModes = array('cat','subcat','prod','fav','destaque');
$allowedItems = array('pdf','img','prod','ban','subcat');
# --------------------------------------------------
if(!in_array($mode, $allowedModes))
{
    echo '<script type="text/javascript">';
    echo 'alert("Parâmetros incorretos aaaaaaaaa");';
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
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </nav>
        <!-- Header -->
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-title">Editar</h1>
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
          switch($item){
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
                                <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Editando a categoria
                                    <strong><?=$data_cat->cat_title?></strong> - #<?=$data_cat->cat_id?></h5>
                            </div>
                            <div class="card-body">
                                <form action="atualizar" method="POST">
                                    <input type="hidden" name="mode" value="cat">
                                    <input type="hidden" name="cat_id" value="<?=$data_cat->cat_id?>">
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label>ID da Categoria</label>
                                            <input type="text" class="form-control" value="#<?=$data_cat->cat_id?>"
                                                disabled>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>PRIORIDADE</label>
                                            <input type="number" class="form-control" name="cat_priority" min="1"
                                                max="9999" value="<?=$data_cat->cat_priority?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>TÍTULO da Categoria</label>
                                        <input type="text" class="form-control" name="cat_title"
                                            value="<?=$data_cat->cat_title?>">
                                    </div>

                                    <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('Deseja atualizar essas informações?');"><i
                                            class="far fa-check-circle mr-2"></i>SalvFar</button>
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
        case "img":
    # --------------------------------------------------
    if($cat == '')
      {
        echo '<script type="text/javascript">';
        echo 'alert("Parâmetros incorretos?");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
      # ----------

      //cat_img 

      $sql        = "SELECT * FROM categories WHERE cat_id = ?";
      $arrayParam = array($cat);
      $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, false);      
      $imgn = $data_cat->cat_img; 
     

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

        <div class="alert alert-info text-center">
            <b>
                <h1>Cadastre a imagem da <?=$nomeitemcategoria?> <?=$data_cat->cat_title?></h1>
            </b><br>
            <h4>Para melhor exibição das imagens, de forma que o layout de seu website seja preservado, sugerimos que
                siga um
                padrão no tamanho das imagens, <strong>600 x 600 px é o indicado.</strong></h4>
        </div>
        <hr class="card-spacer">
        <div class="row prod-imgs">
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h5 class="my-0"><i class="fas fa-fw fa-image mr-2"></i>Upload de imagens</h5>
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <form class="w-100" action="upload" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="mode" value="cat">
                            <input type="hidden" name="cat_id" value="<?=$data_cat->cat_id?>">

                            <div class="form-group">
                                <div class="custom-file">
                                    <label class="custom-file-label">Selecionar nova imagem </label>
                                    <input type="file" class="custom-file-input" name="img_file[]" multiple>
                                    <small class="form-text text-muted">Até 1 imagem | Formatos: jpg - jpeg - png | Máx.
                                        500Kb por
                                        imagem</small>
                                </div>
                            </div>
                            <input type="hidden" name="imgantiga" value="<?=$imgn?>">


                            <button type="submit" class="btn btn-primary"><i
                                    class="far fa-check-circle mr-2"></i>Upload</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Para reduzir o tamanho de sua imagem, sugerimos a ferramenta: <a
                                href="https://tinyjpg.com/" class="external">TinyJPG</a></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-header py-3">
                        <h5 class="my-0"><i class="fas fa-fw fa-image mr-2"></i>Imagem da Categoria</h5>
                    </div>
                    <div class="card-body text-center">
                        <?php
            if(!isset($imgn))
            {
              echo '<span class="text-muted">Nenhuma imagem</span>';
            }
            else
            {
            ?>
                        <table data-toggle="table" data-classes="table table-striped table-hover text-center"
                            data-search="true">
                            <thead>
                                <tr>
                                    <th data-sortable="true">Miniatura</th>
                                    <th data-sortable="true">Exclusão</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                
                    if(!empty($imgn)){
                        echo '<td><img src="'.$pathcatimg .''.$imgn.'"></td>';
                    }else{
                        echo '<td>Nenhuma imagem cadastrada</td>';
                    }
                ?>

                                    <td>
                                        <?php 
                       if(!empty($imgn)){
                        ?>
                                        <a href="deletar?mode=img&item=cat&cat_id=<?=$cat?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i
                                                class="fas fa-trash-alt fa-fw mr-2"></i>Excluir</a>
                                        <?php
                       }
                       ?>
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
        <?
  break;
  case "pdf":
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
                        <div class="alert alert-info">
                            <div class="row">
                                <div class="col-md-12" style="font-size: 19px;"><b>PDF da <?=$nomeitemcategoria?>
                                    </b><br><br>
                                    Os arquivos devem possuir <strong>nomes diferentes</strong> para evitar problemas,
                                    por
                                    exemplo:<br />Dois arquivos com o nome de "Catalogo.pdf".
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="float-left">PDF <?=$nomeitemcategoria?>
                                    <strong><?=$data_cat->prod_title?></strong> -
                                    #<?=$data_cat->cat_id?></h5>
                            </div>
                            <div class="card-body">
                                <form action="upload" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="mode" value="cat_pdf">
                                    <input type="hidden" name="cat_id" value="<?=$data_cat->cat_id?>">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="proj_pdf">Selecionar novo PDF</label>
                                            <input type="file" class="custom-file-input" name="cat_pdf" id="cat_pdf">
                                            <small class="form-text text-muted">Formatos: PDF | Até 5Mb</small>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="far fa-check-circle mr-2"></i>Atualizar</button>
                                    <!--<a href="deletar?mode=pdf&item=pdf&pdf=<?=$data_prod->prod_id?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt mr-2"></i>Excluir</a>-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <table data-toggle="table" data-classes="table table-striped table-hover text-center"
                                    data-search="true">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true">Nome</th>
                                            <th data-sortable="true">Gerenciar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
                        if(!$data_cat->cat_pdf){
                            echo "<td colspan='2'>nenhum pdf cadastrado</td>";
                        }else{
                    ?>
                                            <td><?=$data_cat->cat_pdf?></td>
                                            <td>
                                                <a href="<?=$pathcatpfd.$data_cat->cat_pdf?>" target="_blank"
                                                    class="btn btn-info"><i class="far fa-eye"></i> Visualizar</a>
                                                <a href="deletar?mode=catpdf&item=catpdf&cat_id=<?=$data_cat->cat_id?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir esse Pdf? Essa ação NÃO pode ser desfeita.');"><i
                                                        class="fas fa-trash-alt mr-2"></i>Excluir</a>
                                            </td>
                                            <?php
                        }
                      ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </section>

        <?
  break;

    }break;
    # --------------------------------------------------
    case "subcat":
          switch($item){
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
                                <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Editando a subcategoria
                                    <strong><?=$data_subcat->subcat_title?></strong> - #<?=$data_subcat->subcat_id?>
                                </h5>
                            </div>
                            <div class="card-body">
                                <form action="atualizar" method="POST">
                                    <input type="hidden" name="mode" value="subcat">
                                    <input type="hidden" name="subcat_id" value="<?=$data_subcat->subcat_id?>">
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label>ID da Categoria</label>
                                            <select class="custom-select" name="cat_id">
                                                <?php foreach($data_cat as $cat_info):?>
                                                <option value="<?=$cat_info->cat_id?>"
                                                    <?=($data_subcat->cat_id == $cat_info->cat_id) ? ' selected' : ''?>>
                                                    #<?=$cat_info->cat_id?> -
                                                    <?=$cat_info->cat_title?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>ID da Subcategoria</label>
                                            <input type="text" class="form-control"
                                                value="#<?=$data_subcat->subcat_id?>" disabled>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-lg-12">
                                            <label for="">TÍTULO da Subcategoria <button type="button"
                                                    class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">Info</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item">Coloque o nome da Subcategoria,<br> não se
                                                        preocupe com espaços<br>
                                                        ou caracteres especiais</a>
                                                </div>
                                            </label>
                                            <input type="text" class="form-control" name="subcat_title"
                                                value="<?=$data_subcat->subcat_title?>">
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('Deseja atualizar essas informações?');"><i
                                            class="far fa-check-circle mr-2"></i>Salvar</button>
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
        case "img":
    # --------------------------------------------------
    if($subcat == '')
      {
        echo '<script type="text/javascript">';
        echo 'alert("Parâmetros incorretos?");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
      # ----------
      $sql        = "SELECT * FROM subcategories WHERE subcat_id = ?";
      $arrayParam = array($subcat);
      $data_subcat   = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);
      # ----------
      if($data_subcat == false)
      {
        echo '<script type="text/javascript">';
        echo 'alert("Consulta vazia!");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }

  ?>

        <div class="alert alert-info text-center">
            <b>
                <h1>Cadastrar imagem <?=$nomeitemsubcategoria?> <?=$data_subcat->subcat_title?></h1>
            </b><br>
            <h4>Para melhor exibição das imagens, de forma que o layout de seu website seja preservado, sugerimos que
                siga um
                padrão no tamanho das imagens, <strong>600 x 600 px é o indicado.</strong></h4>
        </div>
        <hr class="card-spacer">
        <div class="row prod-imgs">
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h5 class="my-0"><i class="fas fa-fw fa-image mr-2"></i>Upload de imagens</h5>
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <form class="w-100" action="upload" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mode" value="subcat">
                            <input type="hidden" name="subcat_id" value="<?=$data_subcat->subcat_id?>">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label class="custom-file-label">Selecionar nova imagem</label>
                                    <input type="file" class="custom-file-input" name="img_file[]" multiple>
                                    <small class="form-text text-muted">Até 1 imagem | Formatos: jpg - jpeg - png | Máx.
                                        500Kb por
                                        imagem</small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i
                                    class="far fa-check-circle mr-2"></i>Upload</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Para reduzir o tamanho de sua imagem, sugerimos a ferramenta: <a
                                href="https://tinyjpg.com/" class="external">TinyJPG</a></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-header py-3">
                        <h5 class="my-0"><i class="fas fa-fw fa-image mr-2"></i>Imagem da Categoria</h5>
                    </div>
                    <div class="card-body text-center">
                        <?php
            if($data_subcat->subcat_img == null)
            {
              echo '<span class="text-muted">Nenhuma imagem</span>';
            }
            else
            {
            ?>
                        <table data-toggle="table" data-classes="table table-striped table-hover text-center"
                            data-search="true">
                            <thead>
                                <tr>
                                    <th data-sortable="true">Miniatura</th>
                                    <th data-sortable="true">Exclusão</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="<?=$pathsubcatimg.$data_subcat->subcat_img?>"></td>
                                    <td>
                                        <a href="deletar?mode=img&item=subcat&subcat=<?=$data_subcat->subcat_id?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i
                                                class="fas fa-trash-alt fa-fw mr-2"></i>Excluir</a>
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
        <?
  break;
  case 'pdf':
    #pdf subcat 

    $subcat_id = $_GET['subcat'];

    if($subcat_id == '')
      {
        echo '<script type="text/javascript">';
        echo 'alert("Parâmetros incorretos");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
      # ----------
      $sql        = "SELECT * FROM subcategories WHERE subcat_id = ?";
      $arrayParam = array($subcat_id);
      $data_subcat   = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);
      # ----------
      if($data_subcat == false)
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
                        <div class="alert alert-info">
                            <div class="row">
                                <div class="col-md-12" style="font-size: 19px;"><b>PDF da <?=$nomeitemsubcategoria?>
                                    </b><br><br>
                                    Os arquivos devem possuir <strong>nomes diferentes</strong> para evitar problemas,
                                    por
                                    exemplo:<br />Dois arquivos com o nome de "Catalogo.pdf".
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="float-left">PDF <?=$nomeitemsubcategoria?>
                                    <strong><?=$data_subcat->subcat_title?></strong> -
                                    #<?=$data_subcat->subcat_id?></h5>
                            </div>
                            <div class="card-body">
                                <form action="upload" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="mode" value="subcat_pdf">
                                    <input type="hidden" name="subcat_id" value="<?=$data_subcat->subcat_id?>">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="proj_pdf">Selecionar novo PDF</label>
                                            <input type="file" class="custom-file-input" name="subcat_pdf2"
                                                id="subcat_pdf2">
                                            <small class="form-text text-muted">Formatos: PDF | Até 5Mb</small>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="far fa-check-circle mr-2"></i>Atualizar</button>
                                    <!-- <a href="deletar?mode=pdf&item=pdf&pdf=<?=$data_prod->prod_id?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt mr-2"></i>Excluir</a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <table data-toggle="table" data-classes="table table-striped table-hover text-center"
                                    data-search="true">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true">Nome</th>
                                            <th data-sortable="true">Gerenciar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
                        if(!$data_subcat->subcat_pdf){
                            echo "<td colspan='2'>nenhum pdf cadastrado</td>";
                        }else{
                    ?>
                                            <td><?=$data_subcat->subcat_pdf?></td>
                                            <td>
                                                <a href="<?=$pathsubcatpdf.$data_subcat->subcat_pdf?>" target="_blank"
                                                    class="btn btn-info"><i class="far fa-eye"></i> Visualizar</a>
                                                <a href="deletar?mode=subcatpdf&item=subcatcatpdf&subcat_id=<?=$data_subcat->subcat_id?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir esse Pdf? Essa ação NÃO pode ser desfeita.');"><i
                                                        class="fas fa-trash-alt mr-2"></i>Excluir</a>
                                            </td>
                                            <?php
                        }
                      ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </section>

        <?

  break;
    }break;
     # --------------------------------------------------
    case "fav":
    # --------------------------------------------------
    $cat = $_GET['cat'];      
          
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
                                <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Tornar a Categoria
                                    <strong><?=$data_cat>cat_title?></strong> - #<?=$data_cat->cat_id?> DESTAQUE</h5>
                            </div>
                            <div class="card-body">
                                <form action="adicionar" method="POST">
                                    <input type="hidden" name="mode" value="fav">
                                    <input type="hidden" name="cat_id" value="<?=$data_cat->cat_id?>">
                                    <input type="hidden" name="cat_title" value="<?=$data_cat->cat_title?>">
                                    <input type="hidden" name="cat_url" value="<?=$data_cat->cat_url?>">
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-star"></i>
                                        Tornar
                                        destaque</button>
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
  switch($item)
  {
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
      $sql         = "SELECT * FROM products WHERE prod_id = ?";
      $arrayParam  = array($prod);
      $data_prod   = $crud_prod->getSQLGeneric($sql, $arrayParam, false);
      # ----------
      $sql         = "SELECT * FROM images WHERE prod_id = ?";
      $arrayParam  = array($prod);
      $data_img    = $crud_img->getSQLGeneric($sql, $arrayParam, true);
      # ----------
      $sql         = "SELECT * FROM subcategories";
      $arrayParam  = array();
      $data_subcat = $crud_subcat->getSQLGeneric($sql, $arrayParam, true);

      $sql         = "SELECT * FROM categories";
      $arrayParam  = array();
      $data_cat    = $crud_cat->getSQLGeneric($sql, $arrayParam, true);
      # ----------
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
                                <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Editando o produto
                                    <strong><?=$data_prod->prod_title?></strong> - #<?=$data_prod->prod_id?></h5>
                            </div>
                            <div class="card-body">
                                <form action="atualizar" method="POST">
                                    <input type="hidden" name="mode" value="prod">
                                    <input type="hidden" name="prod_id" value="<?=$data_prod->prod_id?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-1">
                                            <label for="">ID do Produto</label>
                                            <input type="text" class="form-control" value="#<?=$data_prod->prod_id?>"
                                                disabled>
                                        </div>
                                        <?php
                      if($itemsubcategoria){
                    ?>
                                        <div class="form-group col-md-6">
                                            <label for="">ID da Subcategoria</label>
                                            <select class="custom-select" name="subcat_id">
                                                <?php foreach($data_subcat as $subcat_info):?>
                                                <option value="<?=$subcat_info->subcat_id?>"
                                                    <?=($data_prod->subcat_id == $subcat_info->subcat_id) ? 'selected' : ''?>>
                                                    #<?=$subcat_info->subcat_id?> - <?=$subcat_info->subcat_title?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        
                                        <?php
                      }else{
                    ?>
                                        <div class="form-group col-md-6">
                                            <label for="">Categoria</label>
                                            <select class="custom-select" name="subcat_id">
                                            <?php
                                                    if($data_prod->subcat_id == 0 or $data_prod->subcat_id == ""){
                                                ?>
                                                    <option value="0">Sem subcategoria</option>
                                                <?php
                                                    }
                                                ?>
                                                <?php foreach($data_cat as $cat_info):?>                                                

                                                <option value="<?=$cat_info->cat_id?>"
                                                    <?=($data_prod->subcat_id == $cat_info->cat_id) ? 'selected' : ''?>>
                                                    
                                                    
                                                    #<?=$cat_info->cat_id?> - <?=$cat_info->cat_title?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label class="d-block">Exibir no site?  </label>
                                            <select class="custom-select d-block" name="exibir" id="exibir">
                                            <option value="1" <?php if($data_prod->ativo == '1'){echo "selected";}?>>Sim</option>
                                            <option value="0" <?php if($data_prod->ativo == '0'){echo "selected";}?>>Não</option>
                                        
                                            </select>
                                        </div>


                    <?php
                        }
                    ?>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">TÍTULO do Produto </label>
                                            <input type="text" class="form-control" name="prod_title"
                                                value="<?=$data_prod->prod_title?>">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="">DESCRIÇÃO do Produto</label>

                                        <textarea class="form-control summernote" id="summernote" name="prod_desc"
                                            value="Escreva sua mensagem"><?=$data_prod->prod_desc?></textarea>
                                    </div>
                                    <!-- <div class="form-group">
                    <label for="">DESCRIÇÃO do Produto (Espanhol)</label>
                    <textarea class="form-control summernote" id="summernote2" name="prod_desc_esp"
                      value="Escreva sua mensagem"><?=$data_prod->prod_desc_esp?></textarea>
                  </div> -->
                                    <!-- <div class="form-group">
                    <label for="">DESCRIÇÃO do Produto (Inglês)</label>
                    <textarea class="form-control summernote" id="summernote3" name="prod_desc_ing"
                      value="Escreva sua mensagem"><?=$data_prod->prod_desc_ing?></textarea>
                  </div> -->
                                    <!-- <div class="form-group">
                    <label for="">Description da página do produto SEO (150 caracteres)</label>
                    <textarea class="form-control summernote" id="summernote4" name="prod_desc_seo" rows="3" maxlength="150" minlength="120"
                      value="Escreva sua mensagem" required><?=$data_prod->prod_desc_seo?></textarea>
                  </div> -->
                                    <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('Deseja atualizar essas informações?');"><i
                                            class="far fa-check-circle mr-2"></i>Salvar</button>
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
    case "pdf":
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
      $sql        = "SELECT * FROM products WHERE prod_id = ?";
      $arrayParam = array($prod);
      $data_prod   = $crud_prod->getSQLGeneric($sql, $arrayParam, false);
      # ----------
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
                        <div class="alert alert-info">
                            <div class="row">
                                <div class="col-md-12" style="font-size: 19px;"><b>ATENÇÃO</b><br><br>
                                    Os arquivos devem possuir <strong>nomes diferentes</strong> para evitar problemas,
                                    por
                                    exemplo:<br />Dois arquivos com o nome de "Catalogo.pdf".
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="float-left">PDF do <?=$nomeitemproduto?>
                                    <strong><?=$data_prod->prod_title?></strong> -
                                    #<?=$data_prod->prod_id?></h5>
                            </div>
                            <div class="card-body">
                                <form action="upload" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="mode" value="prod_pdf">
                                    <input type="hidden" name="prod_id" value="<?=$data_prod->prod_id?>">
                                    <div class="form-group">
                                        <!-- <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-file-pdf fa-fw"></i></span>
                      </div>
                      <input type="text" class="form-control" value="<?=$data_prod->prod_manual?>" disabled>
                      <div class="input-group-append">
                        <a href="<?=$pathprodpdf.$data_prod->prod_manual?>" target="_blank"
                          class="<?=($data_prod->prod_manual == '')?'disabled':'';?> btn btn-secondary-outline border"><i
                            class="fas fa-eye fa-fw"></i></a>
                      </div>
                    </div> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="proj_pdf">Selecionar novo PDF</label>
                                            <input type="file" class="custom-file-input" name="prod_pdf" id="prod_pdf">
                                            <small class="form-text text-muted">Formatos: PDF | Até 5Mb</small>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="far fa-check-circle mr-2"></i>Atualizar</button>
                                    <!--<a href="deletar?mode=pdf&item=pdf&pdf=<?=$data_prod->prod_id?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt mr-2"></i>Excluir</a>-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <table data-toggle="table" data-classes="table table-striped table-hover text-center"
                                    data-search="true">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true">#ID do Pdf</th>
                                            <th data-sortable="true">Nome</th>
                                            <th data-sortable="true">Gerenciar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                        $sql = "SELECT * FROM pdf WHERE prod_id = ?";
                        $arrayParam = array($data_prod->prod_id);
                        $data_pdf = $crud_prod->getSQLGeneric($sql, $arrayParam, true);
      
                        foreach($data_pdf as $pdf_info):?>
                                        <tr>
                                            <td><?=$pdf_info->pdf_id?></td>
                                            <td><?=$pdf_info->pdf_title?></td>
                                            <td>
                                                <a href="<?=$pathprodpdf.$pdf_info->pdf_title?>" target="_BLANK"
                                                    class="btn btn-info"><i class="fas fa-eye fa-fw"></i> Visualizar
                                                    PDF</a>
                                                <a href="deletar?mode=pdf&pdf=<?=$pdf_info->pdf_id?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir esse Pdf? Essa ação NÃO pode ser desfeita.');"><i
                                                        class="fas fa-trash-alt mr-2"></i>Excluir</a>
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



        </section>

        <?
        break;
    # --------------------------------------------------
        case "img":
    # --------------------------------------------------
    if($prod == '')
      {
        echo '<script type="text/javascript">';
        echo 'alert("Parâmetros incorretos?");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
      # ----------
      $sql        = "SELECT * FROM products WHERE prod_id = ?";
      $arrayParam = array($prod);
      $data_prod   = $crud_prod->getSQLGeneric($sql, $arrayParam, false);
      # ----------
      $sql        = "SELECT * FROM images WHERE prod_id = ?";
      $arrayParam = array($prod);
      $data_img   = $crud_img->getSQLGeneric($sql, $arrayParam, true);
      # ----------
      if($data_prod == false)
      {
        echo '<script type="text/javascript">';
        echo 'alert("Consulta vazia!");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }

  ?>

        <div class="alert alert-info text-center">
            <b>
                <h1>Cadastre a imagem do <?=$nomeitemproduto?></h1>
            </b><br>
            
        </div>
        <hr class="card-spacer">
        <div class="row prod-imgs">
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h5 class="my-0"><i class="fas fa-fw fa-image mr-2"></i>Upload de imagens</h5>
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <form class="w-100" action="upload" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mode" value="prod">
                            <input type="hidden" name="prod_id" value="<?=$data_prod->prod_id?>">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label class="custom-file-label">Selecionar nova imagem</label>
                                    <input type="file" class="custom-file-input" name="img_file[]" multiple>
                                    <small class="form-text text-muted">Até 2 imagens | Formatos: jpg - jpeg - png | Máx.
                                        1mb por imagem</small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i
                                    class="far fa-check-circle mr-2"></i>Upload</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Para reduzir o tamanho de sua imagem, sugerimos a ferramenta: <a
                                href="https://tinyjpg.com/" class="external">TinyJPG</a></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-header py-3">
                        <h5 class="my-0"><i class="fas fa-fw fa-image mr-2"></i>Imagens do Produto</h5>
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
                        <table data-toggle="table" data-classes="table table-striped table-hover text-center"
                            data-search="true">
                            <thead>
                                <tr>
                                    <th data-sortable="true">Miniatura</th>
                                    <th data-sortable="true">Destacar</th>
                                    <th data-sortable="true">Exclusão</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data_img as $img_info):?>
                                <tr>
                                    <td><img src="<?=$pathprodimg.$img_info->img_name?>"></td>
                                    <td>
                                    <?php 
                                        if($img_info->img_priority <> 1){ 
                                    ?>
                                        <a href="destacar?mode=destacar&img=<?=$img_info->img_id?>&prod_id=<?=$img_info->prod_id?>"
                                            class="btn btn-warning btn-sm"><i class="fas fa-star fa-fw mr-2"></i>Destacar</a>
                                    <?php
                                        }else{
                                    ?>
                                        <p>Imagem destacada! </p>
                                    <?php
                                        }
                                    ?>
                                    </td>

                                    <td>
                                        <a href="deletar?mode=img&item=prod&img=<?=$img_info->img_id?>&prod=<?=$img_info->prod_id?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i
                                                class="fas fa-trash-alt fa-fw mr-2"></i>Excluir</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php
            }
            ?>
                    </div>
                </div>
            </div>
        </div>
        <?
  break;
  }
  break;
  # --------------------------------------------------
    case "destaque":
    # --------------------------------------------------
    $fav = $_GET['destaque'];      
          
      if($fav == '')
      {
        echo '<script type="text/javascript">';
        echo 'alert("Parâmetros incorretos");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
      }
      # ----------
      $sql        = "SELECT * FROM favoritos WHERE fav_id = ?";
      $arrayParam = array($fav);
      $data_fav   = $crud_fav->getSQLGeneric($sql, $arrayParam, false);
      # ----------
      $sql        = "SELECT * FROM favoritos ORDER BY fav_prioridade ASC";
      $arrayParam = array();
      $data_fav2  = $crud_fav->getSQLGeneric($sql, $arrayParam, true);
      # ----------
      $sql        = "SELECT * FROM products WHERE prod_id = ?";
      $arrayParam = array($data_fav->prod_id);
      $data_prod  = $crud_prod->getSQLGeneric($sql, $arrayParam, false);
      # ----------
      if($data_fav == false)
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
                                <h4 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i> Editando a prioridade
                                    do destaque -
                                    <strong><?= $data_prod->prod_title?></strong></h4>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4 mt-5">
                                    <form action="atualizar" method="POST">
                                        <input type="hidden" name="mode" value="destaque">
                                        <input type="hidden" name="fav_id" value="<?=$data_fav->fav_id?>">
                                        <div class="form-group ">
                                            <input name="fav_prioridade" type="number" class="form-control" min="0"
                                                max="9999" value="<?= $data_fav->fav_prioridade?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                                class="fas fa-sort-numeric-up"></i> Atualizar</button>
                                    </form>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="text-center">Lista dos destaques</h3>
                                    <table data-toggle="table"
                                        data-classes="table table-striped table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true">Prioridade</th>
                                                <th data-sortable="true">#ID do Produto</th>
                                                <th data-sortable="true">Título</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $i = 1;
                         foreach($data_fav2 as $fav_info):
          
                      $sql        = "SELECT * FROM products WHERE prod_id = ?";
                      $arrayParam = array($fav_info->prod_id);
                      $data_prod2 = $crud_prod->getSQLGeneric($sql, $arrayParam, false);
          
                      if($i > 20){
                      $cor = 'red';
                      }else{
                      $cor = 'black';
                      }
                      ?>
                                            <tr>
                                                <td>
                                                    <p style="color: <?= $cor ?>!important;">
                                                        <?=$fav_info->fav_prioridade?></p>
                                                </td>
                                                <td>
                                                    <p style="color: <?= $cor ?>!important;"><?=$fav_info->fav_id?></p>
                                                </td>
                                                <td>
                                                    <p style="color: <?= $cor ?>!important;">
                                                        <?=$data_prod2->prod_title?></p>
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
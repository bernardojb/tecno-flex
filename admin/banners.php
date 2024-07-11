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
$sql        = "SELECT * FROM banners ORDER BY ban_priority";
$arrayParam = array();
$data_ban   = $crud_ban->getSQLGeneric($sql, $arrayParam, true);
?>
<!doctype html>
<html lang="pt-br">

<head>
  <!-- Title -->
  <title>BLOOMIN | Painel Administrativo</title>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta name="author" content="">
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
      <li class="breadcrumb-item active">Banners</li>
    </ol>
  </nav>
  <!-- Header -->
  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-title">Banners</h1>
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
              <h5 class="my-0"><i class="fas fa-align-justify fa-fw mr-2"></i>Pré-visualização</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4 border-right d-flex align-items-center">
                  <div class="alert alert-danger m-0">
                    <b>ATENÇÃO</b><br><br>
                    A pré-visualização é totalmente responsiva e <b>não</b> representa o tamanho real de exibição do banner no website.
                    <br><br>
                    O As imagens utilizadas para os banners da página inicial <b>devem possuir as dimensões 1200x300 pixels</b> com área útil de <b>1200x300 pixels</b> e o tamanho total de cada imagem não deve ultrapassar 500Kb.
                    <br><br>
                    Limite: <b>05 imagens</b>
                  </div>
                </div>
                <div class="col-lg-8 d-flex align-items-center justify-content-center">
                  <?php
                  if(count($data_ban) == 0)
                  {
                    echo '<span class="text-muted">Nenhum banner cadastrado</span>';
                  }
                  else
                  {
                  ?>
                  <div id="carouselHero" class="carousel carousel-fade slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <?php
                      $i = 0;
                      foreach($data_ban as $ban_info)
                      {
                        $i++;
                        if($i == 1)
                        {
                          echo '<div class="carousel-item active"><img src="../img/'.$ban_info->ban_name.'" class="img-fluid" alt="ACTBR" title="ACTBR"></div>';
                        }
                        else
                        {
                          echo '<div class="carousel-item"><img src="../img/'.$ban_info->ban_name.'" class="img-fluid" alt="ACTBR" title="ACTBR"></div>';
                        }
                      }
                      ?>
                      <a class="carousel-control-prev" href="#carouselHero" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Anterior</span></a>
                      <a class="carousel-control-next" href="#carouselHero" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Próximo</span></a>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                <input type="hidden" name="mode" value="ban">
                <div class="form-group">
                  <div class="custom-file">
                    <label class="custom-file-label">Selecionar nova imagem</label>
                    <input type="file" class="custom-file-input" name="ban_file[]" multiple>
                    <small class="form-text text-muted">Até 05 imagens | Formatos: jpg - jpeg - png | Máx. 500Kb por imagem</small>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="far fa-check-circle mr-2"></i>Upload</button>
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
              <h5 class="my-0"><i class="fas fa-fw fa-image mr-2"></i>Banners</h5>
            </div>
            <div class="card-body text-center">
            <?php
            if(count($data_ban) == 0)
            {
              echo '<span class="text-muted">Nenhum banner cadastrado</span>';
            }
            else
            {
            ?>
              <table data-toggle="table" data-classes="table table-striped table-hover text-center" data-search="true">
                <thead>
                  <tr>
                    <th data-sortable="true">Miniatura</th>
                    <th data-sortable="true">#ID da Imagem</th>
                    <th data-sortable="true">Prioridade</th>
                    <th data-sortable="true">Exclusão</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($data_ban as $ban_info):?>
                  <tr>
                    <td><img src="../img/<?=$ban_info->ban_name?>" alt="ACTBR" title="ACTBR"></td>
                    <td><?=$ban_info->ban_id?></td>
                    <td>
                      <form class="form-inline d-flex justify-content-center" method="post" action="atualizar">
                        <input type="hidden" name="mode" value="ban">
                        <input type="hidden" name="ban_id" value="<?=$ban_info->ban_id?>">
                        <input type="number" class="form-control" name="ban_priority" min="1" max="99" value="<?=$ban_info->ban_priority?>">
                        <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fas fa-sync fa-fw mr-1"></i>Atualizar</button>
                      </form>
                    </td>
                    <td>
                      <a href="deletar?mode=img&item=ban&ban=<?=$ban_info->ban_id?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa imagem? Essa ação NÃO pode ser desfeita.');"><i class="fas fa-trash-alt fa-fw mr-2"></i>Excluir</a>
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
    </div>
  </section>
</main>
<!-- Footer -->
<?php include 'inc/inc.footer.php';?>
<!-- JavaScript -->
<?php include 'inc/inc.js.php';?>
<!-- Base scripts -->
<script src="js/fcn.login.js"></script>
<script src="js/std.scripts.js"></script>
</body>
</html>
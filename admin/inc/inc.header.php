 
  <nav class="navbar navbar-expand-lg fixed-top">
    <a class="navbar-brand" href="dashboard"><span>BLOOMIN |</span> Painel Administrativo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
    <?php
      function setActive($comparePage)
      {
        $currentPage = basename($_SERVER['REQUEST_URI']);
        $activePage  = ($currentPage == '') ? 'dashboard' : $currentPage;
        $resultPage  = ($activePage == $comparePage) ? ' active' : '';
        # -----
        return $resultPage;
      }
      ?>
      <ul class="navbar-nav ml-auto">
        <div class="dropdown-divider"></div>
        <li class="nav-item px-2<?=setActive("dashboard")?>"><a class="nav-link" href="dashboard"><i class="fas fa-chart-line fa-fw mr-2"></i>Dashboard</a></li>
        <!-- <li class="nav-item px-2<?=setActive("banners")?>"><a class="nav-link" href="banners"><i class="fas fa-fw fa-image mr-2"></i>Banners</a></li> -->
        <!-- <li class="nav-item px-2<?=setActive("visualizar?mode=fav")?>"><a class="nav-link pl-2" href="visualizar?mode=fav"><i class="fas fa-star fa-fw mr-2"></i>Destaques</a></li> -->
        <li class="nav-item dropdown px-2">
          <a class="nav-link dropdown-toggle<?=(strpos($_SERVER['REQUEST_URI'],'visualizar') ==! false)?' active':''?>" href="#" data-toggle="dropdown"><i class="fas fa-cogs fa-fw mr-2"></i>Gerenciar</a>
          <div class="dropdown-menu">

        <?php
            if($itemcategoria){
        ?>
            <a class="nav-link pl-2<?=setActive("visualizar?mode=cat")?>" href="visualizar?mode=cat"><i class="fas fa-angle-right fa-fw mr-2"></i><?=$nomeitemcategoria?></a>
        <?php
            }
            if($itemsubcategoria){
        ?>
            <a class="nav-link pl-2<?=setActive("visualizar?mode=subcat")?>" href="visualizar?mode=subcat"><i class="fas fa-angle-right fa-fw mr-2"></i><?=$nomeitemsubcategoria?></a>
        <?php
            }
            if($itemproduto){
        ?>
            <a class="nav-link pl-2<?=setActive("visualizar?mode=prod")?>" href="visualizar?mode=prod"><i class="fas fa-angle-right fa-fw mr-2"></i><?=$nomeitemproduto?></a>
        <?php
            }
        ?>    
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <div class="dropdown-divider"></div>
        <li class="navbar-text px-3"><a href="perfil"><i class="fas fa-user fa-fw mr-2"></i>Olá, <?=$_SESSION['user_name']?> (<?=$_SESSION['user_role']?>)</a></li>
        <div class="dropdown-divider"></div>
        <li class="nav-item ml-2"><a class="nav-link" href="logout">Logout<i class="fas fa-sign-out-alt ml-2"></i></a></li>
      </ul>
    </div>
  </nav>

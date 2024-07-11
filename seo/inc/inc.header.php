<aside class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo">
        <img src="https://www.bloomin.com.br/projetos/rodape/rodape-site-color.png" alt="">
      </div>

      <?php

      ?>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?=setActive("dashboard")?>  ">
            <a class="nav-link" href="dashboard">
              <i class="material-icons">dashboard</i>
              <p>Resumo</p>
            </a>
          </li>

          <li class="nav-item <?=setActive("visualizar?mode=prod")?>  ">
            <a class="nav-link" href="visualizar?mode=prod">
              <i class="material-icons">subject</i>
              <p>Gerenciar Páginas</p>
            </a>
          </li>

          <!-- your sidebar here -->
        </ul>
      </div>
  </aside>

  <div style="display:none">



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
        <li class="nav-item dropdown px-2">
          <a class="nav-link dropdown-toggle<?=(strpos($_SERVER['REQUEST_URI'],'visualizar') ==! false)?' active':''?>" href="#" data-toggle="dropdown"><i class="fas fa-cogs fa-fw mr-2"></i>Gerenciar</a>
          <div class="dropdown-menu">
            <a class="nav-link pl-2<?=setActive("visualizar?mode=prod")?>" href="visualizar?mode=prod"><i class="fas fa-angle-right fa-fw mr-2"></i>Páginas</a>
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
  </div>
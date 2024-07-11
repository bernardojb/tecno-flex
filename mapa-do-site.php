<?php include 'inc/inc.seo.php'; ?>
<?php include 'seo/lib/cfg.global.php'; ?>
</head>
<?php  
        
    $id = $_GET['pag'];

    $sql        = "SELECT pag_title, pag_url, ativo FROM seo";
    $arrayParam = '';
    $page  = $crud_subcat->getSQLGeneric($sql, $arrayParam, true);
   

  
?>

<body>
    <!-- Navbar -->
    <?php include 'inc/inc.header.php'; ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between flex-direction-column">

                    <div class="mb-3 mb-md-0">
                        <h1 class="top-h2">Mapa do site</h1>
                    </div>
                    <div class="page_link">
                        <a href="/">Home</a>
                        <a href="#" class="desativado">Mapa do site</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->



    <!--================ Contact section start =================-->
    <section class="contact-section pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <h2 class="text-center">Conheça todas as nossas páginas</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="nav-link" href="/">Home</a>
                    <a class="nav-link" href="linha-do-tempo">Linha do Tempo</a>
                    <a class="nav-link" href="sobre-nos">Sobre</a>
                    <a class="nav-link" href="linha-asfalto">Linha Asfalto</a>
                    <a class="nav-link" href="tubo-agra-com-vedacao-de-metaramida-para-asfalto">Tubo Agra com vedação de
                        metaramida para asfalto</a>
                    <a class="nav-link" href="linha-automotiva">Linha Automotiva</a>
                    <a class="nav-link" href="abracadeiras">Abracadeiras</a>
                    <a class="nav-link" href="flexiveis-para-escapamento">Flexíveis para escapamento</a>
                    <a class="nav-link" href="linha-eletrica">Linha Elétrica</a>
                    <a class="nav-link" href="eletrodutos-metalicos-flexiveis-com-protecao-de-pvc">Eletrodutos metálicos
                        flexíveis com proteção de PVC</a>
                    <a class="nav-link" href="eletrodutos-metalicos-flexiveis-sem-protecao-de-pvc">Eletrodutos metálicos
                        flexíveis sem proteção de PVC</a>
                    <a class="nav-link" href="mgp-p">MGP-P</a>
                    <a class="nav-link" href="contra-porcas">Contra Porcas</a>
                    <a class="nav-link" href="linha-industrial">Linha Industrial</a>
                    <a class="nav-link" href="tubo-agra-de-inox-ou-zincado">Tubo agra de inox ou zincado</a>
                    <a class="nav-link" href="contato">Contato</a>
                </div>


                <div class="col-md-6 mb-2">
                    <?php
              foreach ($page as $value) {
                if($value->ativo){
                  echo '<a class="nav-link" href="'.$value->pag_url.'">'.$value->pag_title.'</a>';

                }
              }

            ?>
                </div>
            </div>

        </div>
    </section>
    <!--================ Contact section end =================-->


    <!-- Footer -->
    <?php include 'inc/inc.footer.php'; ?>
    <!-- JavaScript -->
    <?php include 'inc/inc.js.php'; ?>
    <!--cdn slick script-->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
</body>

</html>
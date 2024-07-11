<?php include 'inc/inc.seo.php';?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

</head>

<body>

    <!--================Header Menu Area =================-->
    <?php include 'inc/inc.header.php';?>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                                <div class="banner_content d-md-flex justify-content-between flex-direction-column">

                    <div class="mb-3 mb-md-0">
                        <h1><?=$title;?></h1>
                    </div>
                    <div class="page_link">
                        <a href="home">Home</a>
                        <a href="#"><?=$title;?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->





    <!--================About  Area =================-->
    <section class="about-area mt-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-3 col-lg-3 mb-4 mb-lg-4">
                    <div class="service">
                    <a href="abracadeiras">
                            <h2 class="text-center my-3">Abraçadeiras</h2>
                        </a>
                        <a href="abracadeiras"><img src="img/produtos/linha-automotiva/abracadeiras.jpg" alt="Abraçadeiras" title="Abraçadeiras"></a>
                        
                        <p><a href="abracadeiras" class="readmore">Detalhes</a></p>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 mb-4 mb-lg-4">
                    <div class="service">
                    <a href="flexiveis-para-escapamento">
                            <h2 class="text-center my-3">Flexíveis para Escapamento</h2>
                        </a>
                        <a href="flexiveis-para-escapamento"><img src="img/produtos/linha-automotiva/flexiveis-para-escapamento.jpg" alt="Flexíveis para escapamento" title="Flexíveis para escapamento"></a>
                        
                        <p><a href="flexiveis-para-escapamento" class="readmore">Detalhes</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================About Area End =================-->

    <?php include 'inc/inc.footer.php';?>
    <?php include 'inc/inc.js.php';?>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</body>

</html>
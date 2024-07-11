<?php include 'inc/inc.seo.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

</head>

<body>

    <!--================Header Menu Area =================-->
    <?php include 'inc/inc.header.php'; ?>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between flex-direction-column">

                    <div class="mb-3 mb-md-0">
                        <h1><?= $title; ?></h1>
                    </div>
                    <div class="page_link">
                        <a href="home">Home</a>
                        <a href="linha-automotiva">Linha Automotiva</a>
                        <span><?= $title; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->






    <!--================About  Area =================-->
    <section class="about-area mt-5 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h2 class='title text-center'>DG-I-AGRA | DG-Z-AGRA</h2>
                    <p class="mb-4 text-center">Flexível duplo agrafado/grampeado fabricado com fita de aço zincado
                        (DG-Z-AGRA) ou inox (DG-I- AGRA) que garante flexibilidade e absorção de vibrações.
                        Utilizado para direcionamento de gases e exaustão veicular em ensaios de
                        cronotacógrafos. Pode ser cilíndrico ou poligonal.</p>
                </div>
            </div>
        </div>

        <div class="row aling-items-center">
            <div class="col-md-6 mb-5 mb-lg-0 position-relative">
                <img src="img/produtos/linha-automotiva/flexiveis-para-escapamento2.jpg"
                    class="img-fluid d-block mr-auto" alt="<?= $title; ?>" title="<?= $title; ?>">
            </div>
            <div class="col-md-5 mr-auto mb-3">

                <div>
                    <h3 class='title'>Aplica&ccedil;&otilde;es:</h3>
                    <p>O DG-Z-AGRA e o DG-I-AGRA são utilizados em escapamentos de
                        caminhões, colheitadeiras e tratores de várias marcas e modelos. Também utilizados
                        para exaustão veicular em ensaios de cronotacógrafos. Fornecidos em lances a partir
                        de 10 metros, nas bitolas de 4" ou 5" polegadas.</p>
                    <a href="contato" class='button button-contactForm'>Entre em contato</a>


                </div>
            </div>
            <div class="container mt-5">
            </div>

        </div>
    </section>
    <!--================About Area End =================-->

    <?php include 'inc/inc.footer.php'; ?>
    <?php include 'inc/inc.js.php'; ?>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</body>

</html>
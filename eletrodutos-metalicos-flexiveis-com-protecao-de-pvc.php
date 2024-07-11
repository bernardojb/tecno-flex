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
                        <a href="linha-eletrica">Linha Elétrica</a>
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
                    <h2 class='title text-center'>MGP-G | MGP-Z</h2>
                    <p class="mb-4 text-center">Flexível fabricado com fita de aço galvanizado ou zincado revestido externamente com PVC extrudado.</p>
                </div>
            </div>
        </div>

        <div class="align-items-center d-lg-flex">
            <div class="col-md-6 mb-5 mb-lg-0 position-relative">
                <img src="img/produtos/linha-eletrica/eletrodutos-metalicos-flexiveis-com-protecao-de-pvc.jpg" class="img-fluid flip d-block m-auto" alt="<?= $title; ?>" title="<?= $title; ?>">
            </div>
            <div class="col-md-5 mb-3">
                <div>
                    <h3 class='title'>Aplica&ccedil;&otilde;es:</h3>
                    <p>O produto foi desenvolvido com o objetivo de oferecer proteção de fios e
                        cabos elétricos em instalações e equipamentos industriais, pois proporciona blindagem
                        eletrostática. O revestimento preserva as instalações da oxidação, corrosão e desgaste,
                        o que aumenta sua vida útil.</p>
                    <h3 class='title'>Embalagem:</h3>
                    <p>Para diâmetros de 3/8” a 1.1/2“ rolos com 30m e diâmetros de 2” a 4” rolos com 15m. Também fornecemos conforme a necessidade do cliente.</p>
                    <h3 class='title'>Temperatura de trabalho:</h3>
                    <p>MGP-G | MGP-Z = 70ºC com picos até 90ºC.</p>
                    <h3 class='title'>Cores dispon&iacute;veis:</h3>
                    <p>Preto, branco ou cinza.</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class='col-md-12'>
                    <h3 class='title'>Di&acirc;metros dispon&iacute;veis:</h3>
                </div>
                <div class='col-md-6 border-right'>
                    <table class="table table-striped">
                        <tbody>

                            <tr>
                                <td>3/8"</td>
                                <td>9,52 mm</td>
                            </tr>
                            <tr>
                                <td>1/2"</td>
                                <td>12,70 mm</td>
                            </tr>
                            <tr>
                                <td>3/4"</td>
                                <td>19,05 mm</td>
                                </ul>
                            <tr>
                                <td>1"</td>
                                <td>25,40 mm</td>
                            </tr>
                            <tr>
                                <td>1.1/4"</td>
                                <td>31,75 mm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class='col-md-6'>
                    <table class="table table-striped inverted">
                        <tbody>
                            <tr>
                                <td>1.1/2"</td>
                                <td>38,10 mm</td>
                            </tr>
                            <tr>
                                <td>2"</td>
                                <td>50,80 mm</td>
                            </tr>
                            <tr>
                                <td>2.1/2"</td>
                                <td>63,50 mm</td>
                            </tr>
                            <tr>
                                <td>3"</td>
                                <td>76,20 mm</td>
                            </tr>
                            <tr>
                                <td>4"</td>
                                <td>101,60 mm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



            <a href="contato" class='button button-contactForm'>Entre em contato</a>
        </div>
    </section>
    <!--================About Area End =================-->

    <?php include 'inc/inc.footer.php'; ?>
    <?php include 'inc/inc.js.php'; ?>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</body>

</html>
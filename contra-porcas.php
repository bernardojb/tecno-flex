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
                        <a href="#"><?= $title;?></a>
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
                    <h2 class='title text-center'>TMF | TMG | TCP | TFF | TFG</h2>
                    <p class="mb-4 text-center">Proporciona plena fixação, rápida desmontagem e total vedação quando fixado nas extremidades do flexível, para uma boa ancoragem nas instalações elétricas, proporcionando maior segurança para as instalações. Fabricado em latão zincado ou alumínio, e fornecido com rosca tipo BSP ou tipo NPT. Pode ser fixo (TMF, TFF) ou giratório (TMG, TFG).</p>
                </div>
            </div>
        </div>
        <div class="d-lg-flex align-items-center">
            <div class="col-md-6 mb-5 mb-lg-0 position-relative">
                <img src="img/produtos/linha-eletrica/contra-porcas2.jpg" class="img-fluid d-block flip m-auto"
                    alt="<?= $title; ?>" title="<?= $title; ?>">
            </div>
            <div class="col-md-5 ml-auto mb-3">
                <div>
                    <h3 class='title'>Aplica&ccedil;&otilde;es:</h3>
                    <p>São utilizados nos tubos MGP-G, MGP-Z, MG-G e MG-Z.</p>

                </div>
            </div>
        </div>




        <div class="container">
            <div class="row aling-items-center">
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
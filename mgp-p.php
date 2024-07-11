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
                    <h2 class='title text-center'>MGP-P</h2>
                    <p class="mb-4 text-center">Flexível fabricado com fita de aço zincado revestido externamente com PVC
                        extrudado que permeia toda a altura das espirais do conduíte.</p>
                </div>
            </div>
        </div>

        <div class="align-items-center d-lg-flex">
            <div class="col-md-6 mb-5 mb-lg-0 position-relative">
                <img src="img/produtos/linha-eletrica/mgp-p2.jpg" class="img-fluid d-block mr-auto" alt="<?= $title; ?>" title="<?= $title; ?>">
            </div>
            <div class="col-md-5 mb-3">
                <div>
                    <h3 class='title'>Aplica&ccedil;&otilde;es:</h3>
                    <p>O produto foi desenvolvido para proteção de fios e cabos elétricos em
                        diversos ambientes internos e externos, instalações elétricas industriais, prensas e
                        sistemas de aquecimento. Possui alta resistência a impactos ocorridos por cargas mais
                        pesadas. Projetado para trabalhar com temperaturas de 60 a 105°C. </p>
                    <h3 class='title'>Cores disponíveis::</h3>
                    <p>Preto, branco ou cinza.</p>
                    <h3 class='title'>Embalagem:</h3>
                    <p>Para diâmetros de 3/8" a 1" rolos com 50m e diâmetros de 1.1/4" a 2"
                        rolos com 20m. Outras medidas e comprimentos sob consulta</p>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center mt-5">
                <div class='col-md-12'>
                    <h3 class='title'>Di&acirc;metros dispon&iacute;veis:</h3>
                </div>
                <div class='col-md-6 border-right'>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Bitola pol.</td>
                                <td>Int. mm</td>
                                <td>Tolerância</td>
                                <td>Ext</td>
                            </tr>

                            <tr>
                                <td>3/8"</td>
                                <td>12,6</td>
                                <td>±0,3</td>
                                <td>17,8</td>
                            </tr>
                            <tr>
                                <td>1/2"</td>
                                <td>16</td>
                                <td>±0,5</td>
                                <td>21,1</td>
                            </tr>
                            <tr>
                                <td>3/4"</td>
                                <td>21</td>
                                <td>±0,5</td>
                                <td>26,4</td>
                                </ul>
                            <tr>
                                <td>1"</td>
                                <td>26,5</td>
                                <td>±0,5</td>
                                <td>33,1</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class='col-md-6'>
                    <table class="table table-striped inverted">
                        <tbody>
                            <tr>
                                <td>Bitola pol.</td>
                                <td>Int. mm</td>
                                <td>Tolerância</td>
                                <td>Ext</td>
                            </tr>
                            <tr>
                                <td>1.1/4"</td>
                                <td>35,1</td>
                                <td>±0,5</td>
                                <td>41,8</td>
                            </tr>
                            <tr>
                                <td>1.1/2"</td>
                                <td>40,3</td>
                                <td>±0,5</td>
                                <td>47,8</td>
                            </tr>
                            <tr>
                                <td>3"</td>
                                <td>76,2</td>
                                <td>±0,7</td>
                                <td> 88</td>
                            </tr>
                            <tr>

                                <td>4"</td>
                                <td>102</td>
                                <td>±1,0</td>
                                <td>113</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
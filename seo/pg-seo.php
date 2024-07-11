<?php include 'seo/lib/cfg.global.php'; ?>
<?php

$id = $_GET['pag'];

$sql        = "SELECT * FROM seo WHERE id = ?";
$arrayParam = array($id);
$page  = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);
//print_r($page);
$title = $page->pag_title;
$description = $page->pag_description;

$baseURL = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

?>
<?php include 'inc/inc.seo.php'; ?>

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "item": {
                    "@id": "<?=$baseURL;?>",
                    "name": "Home"
                }
            },
            {
                "@type": "ListItem",
                "position": 2,
                "item": {
                    "@id": "<?=$baseURL?>/mapa-do-site",
                    "name": "Mapa do Site"
                }
            }
        ]
    }
</script>
</head>


<body class="seo">
    <!-- Navbar -->
    <?php include 'inc/inc.header.php'; ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                                <div class="banner_content d-md-flex justify-content-between flex-direction-column">

                    <div class="mb-3 mb-md-0">
                        <h1 class="title top-h2"><?= $page->pag_title; ?></h1>
                    </div>
                    <div class="page_link">
                        <a href="home">Home</a>
                        <a href="mapa-do-site">Mapa do site</a>
                        <a href="#" class="desativado"><?= $page->pag_title; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <section class="team-area area-padding">
        <div class="container">
            <div class="area-heading mb-5">
                <div class="box thin row">


                    <div class="col-md-8 col-xl-8 mb-5">
                        <?= $page->pag_content1; ?>

                    </div>
                    <div class="col-md-4 mb-5">
                        <img src="img/uploads/products/<?= $page->pag_img1; ?>" class="img-fluid rounded" alt="<?= $page->pag_title; ?>" title="<?= $page->pag_title; ?>">
                    </div>
                </div>
            </div>
            <!-- <hr class="dif"> -->
        </div>
    </section>
    <section class="hotline-area text-center area-padding" style="background-image: url('img/uploads/products/<?= $page->pag_cta_img; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class='title txt-center'><?= $page->pag_cta_txt; ?></h2>
                    <div class="contact__buttons-container">
                        <a href="<?= $page->pag_cta_link; ?>">Contato</a>
                    </div>
                </div>
            </div>
    </section>
    <section class="team-area area-padding">
        <div class="container">
            <div class="area-heading mb-5">
                <div class="box thin row">


                    <div class="col-md-4 mb-5">
                        <img src="img/uploads/products/<?= $page->pag_img2; ?>" class="img-fluid rounded" alt="<?= $page->pag_title; ?>" title="<?= $page->pag_title; ?>">
                    </div>


                    <div class="col-md-8 col-xl-8 mb-5">
                        <?= $page->pag_content2; ?>

                    </div>
                </div>
            </div>
            <!-- <hr class="dif"> -->
        </div>
    </section>
    <!-- Footer -->
    <?php include 'inc/inc.bottom.php'; ?>
    <?php include 'inc/inc.footer.php'; ?>
    <!-- JavaScript -->
    <?php include 'inc/inc.js.php'; ?>
    <!--cdn slick script-->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
</body>

</html>
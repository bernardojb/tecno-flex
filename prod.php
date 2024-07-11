<?php
    require_once 'admin/lib/cfg.global.php';
    require_once 'admin/lib/std.functions.php';  
?>
<?php
    $id          = $_GET['id'];
    $sql         = "SELECT * FROM products where prod_id = $id";
    $arrayParam  = array();
    $data_prod   = $crud_prod->getSQLGeneric($sql, $arrayParam, false);
    $id_orcamento = $data_prod->prod_id;
    $id_sub = $data_prod->subsub_id; 
    $title = $data_prod->prod_title;
?>
<?php include 'inc/inc.seo.php' ?>
</head>
<body>
        <!-- header-start -->
        <?php include 'inc/inc.header.php' ?>
        <!-- header-end -->
        <!-- bradcam_area  -->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                            <div class="banner_content d-md-flex justify-content-between flex-direction-column">
                        <div class="mb-3 mb-md-0">
                            <h1><?=$title;?></h1>
                        </div>
                        <div class="page_link">
                            <a href="home">Home</a>
                            <a href="blog">Blog</a>
                            <a href="#"><?=$title;?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ bradcam_area  -->
        <!-- about wrap  -->
        <div class="about_wrap_area about_wrap_area2 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <?php
                        $sql        = "SELECT * FROM images where prod_id = $id and img_priority <> 1";
                        $arrayParam = array();
                        $data_img   = $crud_img->getSQLGeneric($sql, $arrayParam, false);
                    ?>
                    <img class="d-block w-100 banner-post" src="upload-adm/prod/<?=$data_img->img_name;?>" alt="First slide">       
                    </div>
                    <div class="col-md-12">
                        <?php
                            echo $data_prod->prod_desc;
                       ?>
                    </div>
                </div>
            </div>
        </div>
        <section class="hotline-area text-center area-padding" style='background-image: url(img/banner/banner-2.jpg);'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class='col-md-12 title'><span>Newsletter</span></h2>
                    <form action="#" class='row align-items-center'>
                        <div class='col-md-5'>
                            <input type="text" name='nome' placeholder='Nome:' class='form-control '>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name='e-mail' placeholder='E-mail:' class='form-control'>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="button button-contactForm">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>
        <div class="newsletter">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <!-- footer start -->
        <?php include 'inc/inc.footer.php' ?>
        <!--/ footer end  -->
        <!-- link that opens popup -->
        <!-- JS here -->
        <?php include 'inc/inc.js.php' ?>
    </body>
    </html>
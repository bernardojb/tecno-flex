<?php
    require_once 'admin/lib/cfg.global.php';
    require_once 'admin/lib/std.functions.php';  
?>
<?php
    $id         = $_GET['id'];
    $sql1        = "SELECT products.prod_title, products.prod_id, products.url, categories.cat_title FROM products INNER JOIN categories ON categories.cat_id = products.subcat_id where products.subcat_id = $id and ativo = 1";
    $arrayParam1 = array();
    $data_prod   = $crud_cat->getSQLGeneric($sql1, $arrayParam1, true);
    // print_r($data_prod);

    $cat = $data_prod->url; 
    $cat = str_replace("-"," ",$cat);
    $cat = ucfirst($cat);


    $title = $data_prod[0]->cat_title;

    
$sql2        = "SELECT * FROM categories";
$arrayParam2 = array();
$data_cat   = $crud_prod->getSQLGeneric($sql2, $arrayParam, true);

?>
<?php include 'inc/inc.seo.php' ?>

</head>

<body>
<?php
      //echo $activePage;
  ?>


        <!-- header-start -->
        <?php include 'inc/inc.header.php' ?>
        <!-- header-end -->

        <!-- bradcam_area  -->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                                    <div class="banner_content d-md-flex justify-content-between flex-direction-column">

                        <div class="mb-3 mb-md-0">
                            <h1><?php echo $title?></h1>
                        </div>
                        <div class="page_link">
                            <a href="home">Home</a>
                            <a href="blog"><?php echo $title?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ bradcam_area  -->


        <!--================About  Area =================-->
    <section class="about-area mt-5">
        <div class="container">
            <div class="row justify-content-md-center">
            <div class="col-md-3">
                <h2 class='title'>Categorias</h2>
                <ul>
                
                <?php foreach($data_cat as $cat):?>

                    <li><a href="<?=$cat->url;?>" class='readmore'><?=$cat->cat_title;?></a></li>

                <?php endforeach;?>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">

                <?php
                foreach($data_prod as $post):
                    
                    $sql2        = "SELECT * FROM images WHERE prod_id = $post->prod_id and img_priority = 1";
                    $arrayParam = array();
                    $data_image   = $crud_subcat->getSQLGeneric($sql2, $arrayParam, false);

                    if($data_image){
                        $img = $data_image->img_name; 
                    }else{
                        $sql2        = "SELECT * FROM images WHERE prod_id = $post->prod_id ";
                        $arrayParam = array();
                        $data_image   = $crud_subcat->getSQLGeneric($sql2, $arrayParam, false);
                        $img = $data_image->img_name;
                    }

                    
                ?>
                    <div class="col-md-3 col-lg-3 mb-4 mb-lg-4">
                        <div class="service">
                            <a href="<?=$post->url;?>"><img src="upload-adm/prod/<?=$img;?>" alt="<?=$post->prod_title;?>"></a>
                            <a href="<?=$post->url;?>">
                                <h3 class="text-center my-3"><?=$post->prod_title;?></h3>
                            </a>
                            <p><a href="<?=$post->url;?>" class="readmore">Leia mais</a></p>
                        </div>
                    </div>

                <?php
                endforeach;
                ?>
                </div>
                </div>
            </div>
            
        </div>
    </section>



        

        <!-- footer start -->
        <?php include 'inc/inc.footer.php' ?>
        <!--/ footer end  -->

        <!-- link that opens popup -->

        <!-- JS here -->
        <?php include 'inc/inc.js.php' ?>
    </body>

    </html>
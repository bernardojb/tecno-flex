<?php include 'inc/inc.seo.php'; ?>
<?php 


require 'admin/lib/cfg.global.php';   //configurar arquivos na bin
require 'admin/lib/std.functions.php'; //configurar arquivos na bin 

$sql        = "SELECT * FROM products LIMIT 10";
$arrayParam = array();
$data_prod   = $crud_prod->getSQLGeneric($sql, $arrayParam, true);

$sql2        = "SELECT * FROM categories";
$arrayParam2 = array();
$data_cat   = $crud_prod->getSQLGeneric($sql2, $arrayParam, true);
function limitarTexto($texto, $limite){
    $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
    return $texto;
}
?>
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
                        <h1>Blog</h1>
                    </div>
                    <div class="page_link">
                        <a href="home">Home</a>
                        <a href="blog">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->





    <!--================About  Area =================-->
    <section class="about-area mt-5">
        <div class="container">
            <div class="row justify-content-md-center">
            <div class="col-md-3">
                <h2  class='title'>Categorias</h2>
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
                    
                    $sql2        = "SELECT * FROM images WHERE prod_id = ?";
                    $arrayParam = array($post->prod_id);
                    $data_image   = $crud_subcat->getSQLGeneric($sql2, $arrayParam, false);

                    
                ?>
                    <div class="col-md-3 col-lg-3 mb-4 mb-lg-4">
                        <div class="service">
                            <a href="<?=$post->url;?>"><img src="upload-adm/prod/<?=$data_image->img_name;?>" alt="<?=$post->prod_title;?>"></a>
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
    <!--================About Area End =================-->

    <?php include 'inc/inc.footer.php'; ?>
    <?php include 'inc/inc.js.php'; ?>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</body>

</html>
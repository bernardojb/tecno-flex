<?php

if(basename($_SERVER["PHP_SELF"])==basename(__FILE__) )
header("Location:index.php");



# --------------------------------------------------
# EXIBE ERROS
# --------------------------------------------------

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);



# --------------------------------------------------
# variaveis de conexão
# --------------------------------------------------
define('HOST',     'localhost:443');
define('DBNAME',   'tflx_tflx');
define('CHARSET',  'utf8');
define('USER',     'tflx_tflxus');
define('PASSWORD', 'p^O~X1,e,oJv');

# --------------------------------------------------
# Quais itens serão cadastrados?  
# --------------------------------------------------

//Aqui iremos dizer a adm, quais tipos de itens devem ser cadastrados

$itemcategoria      = true;
$itemsubcategoria   = false;
$itemproduto        = true;


# --------------------------------------------------
# Quais Nomes os itens terão?  
# --------------------------------------------------

//Aqui podemos personalizar os nomes cadastrados
$nomeitemcategoria      = "Categoria";
$nomeitemsubcategoria   = "Subcategoria";
$nomeitemproduto        = "Posts";

# --------------------------------------------------
# Quais arquivos no site exibirão: cat, subcat e prod ? 
# --------------------------------------------------

$arquivocat             = "cat.php";
$arquivosubcat          = "subcat.php";
$arquivoprod            = "prod.php";

# --------------------------------------------------
# OPÇÕES A SEREM EXIBIDAS NA VIEW CATEGORIAS  
# --------------------------------------------------

$editarcategoria       = true;
$imagemcategoria       = false;
$pdfcategoria          = false;
$excluircategoria      = true;

# --------------------------------------------------
# OPÇÕES A SEREM EXIBIDAS NA VIEW SUBCATEGORIAS  
# --------------------------------------------------

$editarsubcategoria       = true;
$imagemsubcategoria       = true;
$pdfsubcategoria          = true;
$excluirsubcategoria      = true;

# --------------------------------------------------
# OPÇÕES A SEREM EXIBIDAS NA VIEW PRODUTOS  
# --------------------------------------------------

$editarproduto       = true;
$imagemproduto       = true;
$pdfproduto          = false;
$excluirproduto      = true;

# --------------------------------------------------
# CAMINHO DOS ARQUIVOS   
# --------------------------------------------------

//Aqui irá criar pastas padrões para organizar os arquivos de upload. 

if(is_dir('../upload-adm/')){
    
}else{
    mkdir('../upload-adm');
    mkdir('../upload-adm/cat');
    mkdir('../upload-adm/subcat');
    mkdir('../upload-adm/prod');
}
//caso queira usar uma pasta ja existente no projeto, configure abaixo.

#---- cat 
$pathcatpfd = "../upload-adm/cat/"; 
$pathcatimg = "../upload-adm/cat/";

#---- subcat
$pathsubcatimg = "../upload-adm/subcat/";
$pathsubcatpdf = "../upload-adm/subcat/";

#---- produto

$pathprodimg = "../upload-adm/prod/";
$pathprodpdf = "../upload-adm/prod/";


#--------------------------------------#
# - Referencias de exibição 
# - Para exibir no site, pode copiar as query daqui
#---------------------------------------#

#incluir nas paginas que vai exibir dados do banco de dados 

// require 'bin/cfg.global.php';   //configurar arquivos na bin
// require 'bin/std.functions.php'; //configurar arquivos na bin 

#categorias

// $sql        = "SELECT * FROM categories";
// $arrayParam = array();
// $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, true);

// foreach($data_cat as $cat_info){
//     $nome = $cat_info->cat_title;
// }

#subcategorias 

//$sql        = "SELECT * FROM subcategories";
// $arrayParam = array();
// $data_subcat   = $crud_subcat->getSQLGeneric($sql, $arrayParam, true);

// foreach($data_subcat as $cat_info){
//     $nome = $cat_info->cat_title;
// }

#produtos 

//$sql        = "SELECT * FROM products";
// $arrayParam = array();
// $data_prod   = $crud_prod->getSQLGeneric($sql, $arrayParam, true);

// foreach($data_prod as $prod_info){
//     $nome = $prod_info->prod_title;
// }

#imagens 

//$sql        = "SELECT * FROM images where prod_id = $id";  //configurar o id
// $arrayParam = array();
// $data_img   = $crud_img->getSQLGeneric($sql, $arrayParam, true);

// foreach($data_img as $img_info){
//     $img = $img_info->img_name;
// }


#SEO AUTOMATICO DOS PRODUTOS, CATEGORIAS E SUB 

// case "$activePage":
    
//     $sql        = "SELECT * FROM products WHERE url = '$activePage'";
//     $arrayParam = array();
//     $data_prod  = $crud_prod->getSQLGeneric($sql, $arrayParam, false);

//     $sql        = "SELECT * FROM categories WHERE url = '$activePage'";
//     $arrayParam = array();
//     $data_cat  = $crud_cat->getSQLGeneric($sql, $arrayParam, false);

//     $sql        = "SELECT * FROM subcategories WHERE url = '$activePage'";
//     $arrayParam = array();
//     $data_subcat  = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);

//     if($data_prod){       
//         $title          = $data_prod->prod_title;
//         $description    = "Está precisando de $title? Só com a Sistema Móveis você tem acesso ao que há de melhor no segmento com preços acessíveis.";
//     }
//     if($data_cat){
//         $title          = $data_cat->cat_title;
//         $description    = "Está precisando de $title? Só com a Sistema Móveis você tem acesso ao que há de melhor no segmento com preços acessíveis.";
//     }
//     if($data_subcat){
//         $title          = $data_subcat->subcat_title;
//         $description    = "Está precisando de $title? Só com a Sistema Móveis você tem acesso ao que há de melhor no segmento com preços acessíveis.";
//     }
//   break;






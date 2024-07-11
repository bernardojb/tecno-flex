<?php
# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
# --------------------------------------------------
# Page protection
# --------------------------------------------------
require_once 'lib/class.check.php';
# --------------------------------------------------
# Includes
# --------------------------------------------------
require_once 'lib/cfg.global.php';
require_once 'lib/std.functions.php';

$img_id     = $_GET['img'];
$modo       = $_GET['mode'];
$prod_id    = $_GET['prod_id'];

if(!isset($modo) or !isset($img_id) or !isset($prod_id) ){
    echo "<script>";
    echo "alert('Parametro não aceito');"; 
    echo 'window.history.back();';
    echo "<script>";
    exit();
}

$sql        = "SELECT * FROM images WHERE prod_id = ?";
$arrayParam = array($prod_id);
$data_img   = $crud_img->getSQLGeneric($sql, $arrayParam, true);

foreach($data_img as $img_info){

    if($img_info->img_priority == 1){
        //Verifica se ja existe produto em destaque, se existir ele tira o destaque.

        $img_id2     = $img_info->img_id;
        $arrayUpdate = array('img_priority' => 99);
        $arrayCond   = array('img_id=' => $img_id2);
        $return      = $crud_img->update($arrayUpdate, $arrayCond);
    }
}


$arrayUpdate = array('img_priority' => 1);
$arrayCond   = array('img_id=' => $img_id);

if($return      = $crud_img->update($arrayUpdate, $arrayCond)){
    echo '<script type="text/javascript">';
    echo 'alert("Imagem destacada com sucesso");';
    echo 'window.history.back();';
    echo '</script>';
    exit;
}





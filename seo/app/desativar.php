<?php

# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
# --------------------------------------------------
# Page protection
# --------------------------------------------------
require_once '../lib/class.check.php';
# --------------------------------------------------
# Includes
# --------------------------------------------------
require_once '../lib/cfg.global.php';
require_once '../lib/std.functions.php';
# --------------------------------------------------
# Variables
# --------------------------------------------------
$mode  = $_GET['mode'];
$item  = $_GET['item'];
# --------------------------------------------------
# Allowed modes
# --------------------------------------------------
$allowedModes = array('prod','prodAll');
$allowedItems = array('prod');

# --------------------------------------------------
# Switches
# --------------------------------------------------
switch($mode)
{


  # --------------------------------------------------
  case "prod":
    # --------------------------------------------------
    $id    = $_GET['id'];
    $pag_title    = $_POST['pag_title'];
    //$pag_url      = $_POST['pag_url'];
    $pag_description     = $_POST['pag_description'];
    $pag_content1    = $_POST['pag_content1'];
    $pag_content2    = $_POST['pag_content2'];
    $pag_cta_txt      = $_POST['pag_cta_txt'];
    $pag_cta_link  = $_POST['pag_cta_link'];
    $pag_cta_link  = $_POST['pag_cta_link'];
  
    
    $sql = "UPDATE seo SET ativo = 0 WHERE id = $id";
    # ----------
    $arrayCond = array();
    $return    = $crud_prod->getSQLGeneric($sql, $arrayCond, false);
    print_r($return);
    # ----------
    echo '<script type="text/javascript">';
    // echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="visualizar?mode=prod&s=s";';
    echo '</script>';
  break;
  
  # --------------------------------------------------
  case "prodAll":
    # --------------------------------------------------
    
    $sql = "UPDATE seo SET ativo = 0";
    # ----------
    $arrayCond = array();
    $return    = $crud_prod->getSQLGeneric($sql, $arrayCond, false);
    print_r($return);
    # ----------
    echo '<script type="text/javascript">';
    // echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="visualizar?mode=prod&s=s";';
    echo '</script>';
  break;
  
}
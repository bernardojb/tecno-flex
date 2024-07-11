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
$mode = $_POST['mode'];
# --------------------------------------------------
# Allowed modes
# --------------------------------------------------
$allowedModes = array('cat','subcat','prod');
# --------------------------------------------------
if(!in_array($mode, $allowedModes))
{
  echo '<script type="text/javascript">';
  echo 'alert("Parâmetros incorretos");';
  echo 'window.history.back();';
  echo '</script>';
  exit;
}
# --------------------------------------------------
# Switches
# --------------------------------------------------
switch($mode)
{
  # --------------------------------------------------
  case "cat":
  # --------------------------------------------------
  $cat_title    = $_POST['cat_title'];
  $cat_priority = $_POST['cat_priority'];
  $cat_url      = $_POST['cat_url'];
  # ----------
  $arrayInsert = array(
    'cat_title'    => $cat_title,
    'cat_priority' => $cat_priority,
    'cat_url'      => $cat_url
  );
  $return = $crud_cat->insert($arrayInsert);
  # ----------
   echo '<script type="text/javascript">';
    echo 'alert("Produto cadastrado com sucesso!");';
    echo 'window.location.href="gerador-htaccess-cat.php";';
    echo '</script>';
    exit;
  # ----------
  break;
  # --------------------------------------------------
  case "subcat":
  # --------------------------------------------------
    $cat_id          = $_POST['cat_id'];
    $subcat_title    = $_POST['subcat_title'];
    $subcat_priority = $_POST['subcat_priority'];
    $subcat_url      = $_POST['subcat_url'];   
    # ----------
    $arrayInsert = array(
      'cat_id'          => $cat_id,
      'subcat_title'    => $subcat_title,
      'subcat_priority' => $subcat_priority,
      'subcat_url'      => $subcat_url
    );
    $return = $crud_subcat->insert($arrayInsert);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Produto cadastrado com sucesso!");';
    echo 'window.location.href="gerador-htaccess-subcat.php";';
    echo '</script>';
    exit;
    # ----------
  break;
  # --------------------------------------------------
  case "prod":
  # --------------------------------------------------
    
    $pag_title    = $_POST['pag_title'];
    $pag_url      = $_POST['pag_url'];
    $pag_description     = $_POST['pag_description'];
    $pag_content1    = $_POST['pag_content1'];
    $pag_content2    = $_POST['pag_content2'];
    $pag_cta_txt      = $_POST['pag_cta_txt'];
    $pag_cta_link  = $_POST['pag_cta_link'];
   
    # ----------
    $arrayInsert = array(
      'pag_title'    => $pag_title,
      'pag_url'      => $pag_url,
      'pag_content1'    => $pag_content1,
      'pag_description'     => $pag_description,
      'pag_content2'    => $pag_content2,
      'pag_cta_txt'      => $pag_cta_txt,
      'pag_cta_link'  => $pag_cta_link
      );
    $return = $crud_prod->insert($arrayInsert);
        
    # ----------    
    echo '<script type="text/javascript">';
    echo 'alert("Página cadastrada com sucesso!");';
    echo 'window.location.href="gerador-htaccess-prod.php";';
    echo '</script>';
    exit;
    # ----------
  break;
}
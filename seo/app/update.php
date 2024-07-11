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
$mode         = $_POST['mode'];
$allowedModes = array('cat','subcat','prod','img');
# --------------------------------------------------
# Allowed modes
# --------------------------------------------------
if(!in_array($mode, $allowedModes))
{
  echo '<script type="text/javascript">';
  echo 'alert("Parâmetros incorretos");';
  echo 'window.location.href="dashboard";';
  echo '</script>';
}
# --------------------------------------------------
# Switches
# --------------------------------------------------
switch($mode)
{
  # --------------------------------------------------
  case "cat":
  # --------------------------------------------------
    $cat_id       = $_POST['cat_id'];
    $cat_title    = $_POST['cat_title'];
    $cat_priority = $_POST['cat_priority'];
    # ----------
    $arrayUpdate = array(
      'cat_title'    => $cat_title,
      'cat_priority' => $cat_priority
    );
    $arrayCond = array('cat_id=' => $cat_id);
    $return    = $crud_cat->update($arrayUpdate, $arrayCond);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="editar?mode=cat&cat='.$cat_id.'";';
    echo '</script>';
    # ----------
  break;
  # --------------------------------------------------
  case "subcat":
  # --------------------------------------------------
    $cat_id          = $_POST['cat_id'];
    $subcat_id       = $_POST['subcat_id'];
    $subcat_title    = $_POST['subcat_title'];
    $subcat_priority = $_POST['subcat_priority'];
    # ----------
    $arrayUpdate = array(
      'cat_id'          => $cat_id,
      'subcat_title'    => $subcat_title,
      'subcat_priority' => $subcat_priority
    );
    $arrayCond = array('subcat_id=' => $subcat_id);
    $return    = $crud_subcat->update($arrayUpdate, $arrayCond);
    # -----
    echo '<script type="text/javascript">';
    echo 'alert("Alteração realizada com sucesso!'.$cat_id.'");';
    echo 'window.location.href="editar?mode=subcat&subcat='.$subcat_id.'";';
    echo '</script>';
    # ----------
  break;
  # --------------------------------------------------
  case "prod":
  # --------------------------------------------------
    $id    = $_POST['id'];
    $pag_title    = $_POST['pag_title'];
    //$pag_url      = $_POST['pag_url'];
    $pag_description     = $_POST['pag_description'];
    $pag_content1    = $_POST['pag_content1'];
    $pag_content2    = $_POST['pag_content2'];
    $pag_cta_txt      = $_POST['pag_cta_txt'];
    $pag_cta_link  = $_POST['pag_cta_link'];
   
    # ----------
    $arrayUpdate = array(
      'pag_title'    => $pag_title,
      //'pag_url'      => $pag_url,
      'pag_description'     => $pag_description,
      'pag_content1'    => $pag_content1,
      'pag_content2'    => $pag_content2,
      'pag_cta_txt'      => $pag_cta_txt,
      'pag_cta_link'  => $pag_cta_link
      );
    $arrayCond = array('id=' => $id);
    $return    = $crud_prod->update($arrayUpdate, $arrayCond);
    print_r($arrayInsert);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="editar?mode=prod&prod='.$id.'";';
    echo '</script>';
    # ----------
  break;
  # --------------------------------------------------
  case "img":
  # --------------------------------------------------
    $prod_id      = $_POST['prod_id'];
    $img_id       = $_POST['img_id'];
    $img_priority = $_POST['img_priority'];
    # ----------
    $arrayUpdate = array('img_priority' => $img_priority);
    $arrayCond   = array('img_id=' => $img_id);
    $return      = $crud_img->update($arrayUpdate, $arrayCond);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="editar?mode=prod&prod='.$prod_id.'";';
    echo '</script>';
    # ----------
  break;
}
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
$allowedModes = array('cat','subcat','prod','img','destaque','ban');
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
    $cat_id        = $_POST['cat_id'];
    $cat_title     = $_POST['cat_title'];
    $cat_priority  = $_POST['cat_priority'];
    # ----------
    $arrayUpdate = array(
      'cat_title'     => $cat_title,
      'cat_priority'  => $cat_priority
    );
    $arrayCond = array('cat_id=' => $cat_id);
    $return    = $crud_cat->update($arrayUpdate, $arrayCond);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="visualizar?mode=cat";';
    echo '</script>';
    # ----------
  break;
  # --------------------------------------------------
  case "subcat":
  # --------------------------------------------------
    $cat_id           = $_POST['cat_id'];
    $subcat_id        = $_POST['subcat_id'];
    $subcat_title     = $_POST['subcat_title'];

    # --------------------------------------------------
    $arrayUpdate = array(
      'cat_id'           => $cat_id,
      'subcat_title'     => $subcat_title
    );
    $arrayCond = array('subcat_id=' => $subcat_id);
    $return    = $crud_subcat->update($arrayUpdate, $arrayCond);
    # -----
    echo '<script type="text/javascript">';
    echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="visualizar?mode=subcat";';
    echo '</script>';
    # ----------
  break;
  # --------------------------------------------------
  case "prod":
  # --------------------------------------------------
    $subcat_id      = $_POST['subcat_id'];
    $prod_id        = $_POST['prod_id'];
    $prod_title     = $_POST['prod_title'];
    $prod_desc      = $_POST['prod_desc'];
    $exibir         = $_POST['exibir'];

    # --------------------------------------------------
    $arrayUpdate = array(
      'subcat_id'      => $subcat_id,
      'prod_id'        => $prod_id,
      'prod_title'     => $prod_title,
      'prod_desc'      => $prod_desc,
      'ativo'          => $exibir

    );
    $arrayCond = array('prod_id=' => $prod_id);
    $return    = $crud_prod->update($arrayUpdate, $arrayCond);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="visualizar?mode=prod";';
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
  # --------------------------------------------------
  case "destaque":
  # --------------------------------------------------
    $fav_id         = $_POST['fav_id'];
    $fav_prioridade = $_POST['fav_prioridade'];
    # ----------
    $arrayUpdate = array(
      'fav_prioridade'     => $fav_prioridade
    );
    $arrayCond = array('fav_id=' => $fav_id);
    $return    = $crud_fav->update($arrayUpdate, $arrayCond);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="visualizar?mode=fav";';
    echo '</script>';
    # ----------
  break;

  # --------------------------------------------------
  case "ban":
  # --------------------------------------------------
    $ban_id       = $_POST['ban_id'];
    $ban_priority = $_POST['ban_priority'];
    # ----------
    $arrayUpdate = array('ban_priority' => $ban_priority);
    $arrayCond   = array('ban_id=' => $ban_id);
    $return      = $crud_ban->update($arrayUpdate, $arrayCond);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Alteração realizada com sucesso!");';
    echo 'window.location.href="banners";';
    echo '</script>';
    # ----------
  break;
 
}
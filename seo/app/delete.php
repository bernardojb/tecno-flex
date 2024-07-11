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
$allowedModes = array('cat','subcat','prod','img');
$allowedItems = array('prod');
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
if($mode == 'img' && !in_array($item, $allowedItems))
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
    $cat_id = $_GET['cat'];
    # ----------
    $arrayDel = array('cat_id=' => $cat_id);  
    $return   = $crud_cat->delete($arrayDel); 
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Exclusão realizada com sucesso!");';
    echo 'window.location.href="visualizar?mode=cat";';
    echo '</script>';
    exit;
    # ----------
  break;
  # --------------------------------------------------
  case "subcat":
  # --------------------------------------------------
    $subcat_id = $_GET['subcat'];
    # ----------
    $arrayDel = array('subcat_id=' => $subcat_id);
    $return   = $crud_subcat->delete($arrayDel);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Exclusão realizada com sucesso!");';
    echo 'window.location.href="visualizar?mode=subcat";';
    echo '</script>';
    exit;
    # ----------
  break;
  # --------------------------------------------------
  case "prod":
  # --------------------------------------------------
    $prod_id    = $_GET['prod'];
    # ----------
    $sql        = "SELECT * FROM seo WHERE id = ?";
    $arrayParam	= array($prod_id);
    $data_img   = $crud_prod->getSQLGeneric($sql, $arrayParam, true);
    # ----------
    foreach($data_img as $img_info)
    {
      unlink('../../img/uploads/products/'.$img_info->img_name);
      $arrayImg = array('img_id=' => $img_info->img_id);
      $return   = $crud_prod->delete($arrayImg);
    }
    # --------------------------------------------------
    $arrayDel   = array('id=' => $prod_id);
    $return     = $crud_prod->delete($arrayDel);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Exclusão realizada com sucesso!");'; 
    echo 'window.location.href="visualizar?mode=prod";';
    echo '</script>';
    exit;
    # ----------
  break;
  # --------------------------------------------------
  case "img":
  # --------------------------------------------------
    switch ($item)
    {
      # --------------------------------------------------
      case "prod":
      # --------------------------------------------------
        $prod_id = $_GET['prod'];
        $img_id  = $_GET['img'];
        # ----------
        $sql        = "SELECT * FROM images WHERE img_id = ?";
        $arrayParam = array($img_id);
        $data_img   = $crud_img->getSQLGeneric($sql, $arrayParam, false);
        # ----------
        if(!$data_img)
        {
          echo '<script type="text/javascript">';
          echo 'alert("Nenhuma imagem para excluir");';
          echo 'window.history.back();';
          echo '</script>';
          exit;
        }
        else
        {
          unlink('../../img/uploads/products/'.$data_img->img_name);
          # ----------
          $arrayDel = array('img_id=' => $img_id);
          $return   = $crud_img->delete($arrayDel);
          # ----------
          echo '<script type="text/javascript">';
          echo 'alert("Exclusão realizada com sucesso!");';
          echo 'window.location.href="editar?mode=prod&prod='.$prod_id.'";';
          echo '</script>';
          exit;
        }
        # ----------
      break;
    }
  break;
}
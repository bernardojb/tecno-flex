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
$item = $POST['item'];
# --------------------------------------------------
# Allowed modes
# --------------------------------------------------
$allowedModes = array('subcat','prod');
# --------------------------------------------------
if(!in_array($mode, $allowedModes))
{
  echo '<script type="text/javascript">';
  echo 'alert("Parâmetros incorretos!");';
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
  case "subcat":
  # --------------------------------------------------
    $subcat_id = $_POST['subcat_id'];
    # ----------
    if(isset($_FILES['subcat_img_file']['type']))
    {
      $allowed_ext = array('jpg','jpeg','png');
      $array_ext   = explode('.', $_FILES['subcat_img_file']['name']);
      $file_ext    = strtolower(end($array_ext));
      # ----------
      if((($_FILES['subcat_img_file']['type'] == 'image/png') || ($_FILES['subcat_img_file']['type'] == 'image/jpg') || ($_FILES['subcat_img_file']['type'] == 'image/jpeg')) && ($_FILES['subcat_img_file']['size'] < 500000) && in_array($file_ext, $allowed_ext))
      {
        if($_FILES['subcat_img_file']['error'] > 0)
        {
          echo '<script type="text/javascript">';
          echo 'alert("Erro: '.$_FILES['subcat_img_file']['error'].'");';
          echo 'window.history.back();';
          echo '</script>';
          exit;
          # ----------
        }
        else
        {
          $sql         = "SELECT * FROM subcategories WHERE subcat_id = ?";
          $arrayParam  = array($subcat_id);
          $data_subcat = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);
          # ----------
          if($data_subcat->subcat_img <> ''){unlink('../../img/uploads/subcat/'.$data_subcat->subcat_img);}
          # ----------
          $subcat_img_path = '../../img/uploads/subcat/';
          $subcat_img_tmp  = $_FILES['subcat_img_file']['tmp_name'];
          $subcat_img_name = md5(date('d_m_Y_H_i_s').'_'.$_FILES['subcat_img_file']['name']).'.'.$file_ext;
          # ----------
          $arrayUpdate = array('subcat_img' => $subcat_img_name);
          $arrayCond   = array('subcat_id=' => $subcat_id);
          $return      = $crud_subcat->update($arrayUpdate, $arrayCond);
          # ----------
          move_uploaded_file($subcat_img_tmp, $subcat_img_path.$subcat_img_name);
          # ----------
          echo '<script type="text/javascript">';
          echo 'alert("Upload realizado com sucesso!");';
          echo 'window.location.href="editar?mode=subcat&subcat='.$data_subcat->subcat_id.'";';
          echo '</script>';
          exit;
          # ----------
        }
      }
      else
      {
        echo '<script type="text/javascript">';
        echo 'alert("Imagem inválida!");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
        # ----------
      }
    }
  break;
  # --------------------------------------------------
  case "prod":
  # --------------------------------------------------
    $prod_id    = $_POST['prod_id'];
    # ----------
    $img_limit  = 4;
    # ----------
    $sql        = "SELECT * FROM seo WHERE id = ?";
    $arrayParam = array($prod_id);
    $data_img   = $crud_img->getSQLGeneric($sql, $arrayParam, true);
    $total_img  = count($data_img);
    
    # ----------
    print_r($_FILES['pag_img1']['type'][$i]);
    # ----------
    $max_files = $img_limit;
    # ----------
    for($i=0; $i<$max_files; $i++)
    {
      if(isset($_FILES['pag_img1']['type'][$i]))
      {
      
        $allowed_ext = array('jpg','jpeg','png');
        $array_ext   = explode('.', $_FILES['pag_img1']['name'][$i]);
        $file_ext    = strtolower(end($array_ext));

        # ----------
        if((($_FILES['pag_img1']['type'][$i] == 'image/png') || ($_FILES['pag_img1']['type'][$i] == 'image/jpg') || ($_FILES['pag_img1']['type'][$i] == 'image/jpeg')) && ($_FILES['pag_img1']['size'][$i] < 500000) && in_array($file_ext, $allowed_ext))
        {
          if($_FILES['pag_img1']['error'][$i] > 0)
          {
            // echo '<script type="text/javascript">';
            // echo 'alert("Erro: '.$_FILES['pag_img1']['error'][$i].'");';
            // echo 'window.history.back();';
            // echo '</script>';
            // exit;
            # ----------
          }
          else
          {
            $img_path    = '../../img/uploads/products/';
            $img_tmp     = $_FILES['pag_img1']['tmp_name'][$i];
            //$img_name    = md5(date('d_m_Y_H_i_s').'_'.$_FILES['pag_img1']['name'][$i]).'.'.$file_ext;
            $img_name    = $_FILES['pag_img1']['name'][$i];
            # ----------
            // $arrayInsert = array('id' => $prod_id, 'pag_img1' => $img_name);
            $arrayInsert = '';
            $sql = 'UPDATE seo SET pag_img1 = "'.$img_name.'" WHERE id = '.$prod_id;
            // $return      = $crud_prod->insert($arrayInsert);
            $return      = $crud_prod->getSQLGeneric($sql, $arrayInsert, true);
            //print_r($sql);
            # ----------
            move_uploaded_file($img_tmp, $img_path.$img_name);
            # ----------
            echo '<script type="text/javascript">';
            echo 'alert("Upload realizado com sucesso!");';
            echo 'window.location.href="editar?mode=prod&prod='.$prod_id.'";';
            echo '</script>';
          }
        }
        else
        {
          echo '<script type="text/javascript">';
          echo 'alert("Imagem inválida!");';
          echo 'window.history.back();';
          echo '</script>';
          exit;
          # ----------
        }
      }

      if(isset($_FILES['pag_img2']['type'][$i]))
      {
      
        $allowed_ext = array('jpg','jpeg','png');
        $array_ext   = explode('.', $_FILES['pag_img2']['name'][$i]);
        $file_ext    = strtolower(end($array_ext));

        # ----------
        if((($_FILES['pag_img2']['type'][$i] == 'image/png') || ($_FILES['pag_img2']['type'][$i] == 'image/jpg') || ($_FILES['pag_img2']['type'][$i] == 'image/jpeg')) && ($_FILES['pag_img2']['size'][$i] < 500000) && in_array($file_ext, $allowed_ext))
        {
          if($_FILES['pag_img2']['error'][$i] > 0)
          {
            // echo '<script type="text/javascript">';
            // echo 'alert("Erro: '.$_FILES['pag_img2']['error'][$i].'");';
            // echo 'window.history.back();';
            // echo '</script>';
            // exit;
            # ----------
          }
          else
          {
            $img_path    = '../../img/uploads/products/';
            $img_tmp     = $_FILES['pag_img2']['tmp_name'][$i];
            //$img_name    = md5(date('d_m_Y_H_i_s').'_'.$_FILES['pag_img2']['name'][$i]).'.'.$file_ext;
            $img_name    = $_FILES['pag_img2']['name'][$i];
            # ----------
            // $arrayInsert = array('id' => $prod_id, 'pag_img2' => $img_name);
            $arrayInsert = '';
            $sql = 'UPDATE seo SET pag_img2 = "'.$img_name.'" WHERE id = '.$prod_id;
            // $return      = $crud_prod->insert($arrayInsert);
            $return      = $crud_prod->getSQLGeneric($sql, $arrayInsert, true);
            //print_r($sql);
            # ----------
            move_uploaded_file($img_tmp, $img_path.$img_name);
            # ----------
            echo '<script type="text/javascript">';
            echo 'alert("Upload realizado com sucesso!");';
            echo 'window.location.href="editar?mode=prod&prod='.$prod_id.'";';
            echo '</script>';
          }
        }
        else
        {
          echo '<script type="text/javascript">';
          echo 'alert("Imagem inválida!");';
          echo 'window.history.back();';
          echo '</script>';
          exit;
          # ----------
        }
      }
      if(isset($_FILES['pag_cta_img']['type'][$i]))
      {
      
        $allowed_ext = array('jpg','jpeg','png');
        $array_ext   = explode('.', $_FILES['pag_cta_img']['name'][$i]);
        $file_ext    = strtolower(end($array_ext));

        # ----------
        if((($_FILES['pag_cta_img']['type'][$i] == 'image/png') || ($_FILES['pag_cta_img']['type'][$i] == 'image/jpg') || ($_FILES['pag_cta_img']['type'][$i] == 'image/jpeg')) && ($_FILES['pag_cta_img']['size'][$i] < 500000) && in_array($file_ext, $allowed_ext))
        {
          if($_FILES['pag_cta_img']['error'][$i] > 0)
          {
            echo '<script type="text/javascript">';
            echo 'alert("Erro: '.$_FILES['pag_cta_img']['error'][$i].'");';
            echo 'window.history.back();';
            echo '</script>';
            exit;
            # ----------
          }
          else
          {
            $img_path    = '../../img/uploads/products/';
            $img_tmp     = $_FILES['pag_cta_img']['tmp_name'][$i];
            //$img_name    = md5(date('d_m_Y_H_i_s').'_'.$_FILES['pag_cta_img']['name'][$i]).'.'.$file_ext;
            $img_name    = $_FILES['pag_cta_img']['name'][$i];
            # ----------
            // $arrayInsert = array('id' => $prod_id, 'pag_cta_img' => $img_name);
            $arrayInsert = '';
            $sql = 'UPDATE seo SET pag_cta_img = "'.$img_name.'" WHERE id = '.$prod_id;
            // $return      = $crud_prod->insert($arrayInsert);
            $return      = $crud_prod->getSQLGeneric($sql, $arrayInsert, true);
           // print_r($sql);
            # ----------
            move_uploaded_file($img_tmp, $img_path.$img_name);
            # ----------
            echo '<script type="text/javascript">';
            echo 'alert("Upload realizado com sucesso!");';
            echo 'window.location.href="editar?mode=prod&prod='.$prod_id.'";';
            echo '</script>';
          }
        }
        else
        {
          echo '<script type="text/javascript">';
          echo 'alert("Imagem inválida!");';
          echo 'window.history.back();';
          echo '</script>';
          exit;
          # ----------
        }
      }
    }
  break;
}
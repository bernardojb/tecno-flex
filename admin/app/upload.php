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
$allowedModes = array('cat','subcat','prod','prod_pdf','cat_pdf','subcat_pdf','ban');
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
  case "cat":
  # --------------------------------------------------
   $cat_id    = $_POST['cat_id'];
   $imgantiga = $_POST['imgantiga'];
   
    # ----------
    $img_limit  = 9000;
    # ----------
    $sql        = "SELECT * FROM categories WHERE cat_id = ?";
    $arrayParam = array($cat_id);
    $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, true);
    $total_img  = count($data_cat);
    # ----------
    if($total_img >= $img_limit)
    {
      echo '<script type="text/javascript">';
      echo 'alert("Você já possui '.$img_limit.' imagens cadastradas");';
      echo 'window.history.back();';
      echo '</script>';
      exit;
      # ----------
    }
    # ----------
    $max_files = $img_limit - $total_img;
    # ----------
    for($i=0; $i<$max_files; $i++)
    {
      if(isset($_FILES['img_file']['type'][$i]))
      {
        $allowed_ext = array('jpg','jpeg','png');
        $array_ext   = explode('.', $_FILES['img_file']['name'][$i]);
        $file_ext    = strtolower(end($array_ext));
        # ----------
        if((($_FILES['img_file']['type'][$i] == 'image/png') || ($_FILES['img_file']['type'][$i] == 'image/jpg') || ($_FILES['img_file']['type'][$i] == 'image/jpeg')) && ($_FILES['img_file']['size'][$i] < 500000) && in_array($file_ext, $allowed_ext))
        {
          if($_FILES['img_file']['error'][$i] > 0)
          {
            echo '<script type="text/javascript">';
            echo 'alert("Erro: '.$_FILES['img_file']['error'][$i].'");';
            echo 'window.history.back();';
            echo '</script>';
            exit;
            # ----------
          }
          else
          {
            #exclui imagem antiga

            if($imgantiga <> ""){
                echo "<script>alert('$imgantiga');</script>";
                unlink('$pathcatimg'.$imgantiga);
            }

            $img_path    = "../".$pathcatimg;
            $img_tmp     = $_FILES['img_file']['tmp_name'][$i];
            $img_name    = md5(date('d_m_Y_H_i_s').'_'.$_FILES['img_file']['name'][$i]).'.'.$file_ext;
            #-----------
            # Trata a string do alt
            #-----------
            # Retira a extensão do arquivo
            $pre         = str_replace($file_ext, '', $_FILES['img_file']['name'][$i]);
            #-----------
            # Retira o ponto do final
            $middle      = str_replace('.', '', $pre);
            #-----------
            #Retira o "-" e coloca um espaço no lugar
            $alt         = str_replace('-', ' ', $middle);
            # ----------
              
            $arrayUpdate = array('cat_img' => $img_name);
            $arrayCond = array('cat_id=' => $cat_id);
            $return    = $crud_cat->update($arrayUpdate, $arrayCond); 

            // $arrayInsert = array('prod_id' => $cat_id, 'img_name' => $img_name, 'img_priority' => 99, 'img_alt' => $alt);
            // $return      = $crud_img->insert($arrayInsert);             
            # ----------
            move_uploaded_file($img_tmp, $img_path.$img_name);
            # ----------
            echo '<script type="text/javascript">';
            echo 'alert("Upload realizado com sucesso!");';
    
            if($pdfcategoria){
                echo 'window.location.href="editar?mode=cat&item=pdf&cat='.$cat_id.'";';
                echo '</script>';
                exit;
            }
                echo 'window.location.href="visualizar?mode=cat";';
                echo '</script>';
                exit;
            
            
          }
        }
        else
        {

          
          # ----------
        }
      }
    }
  break;
  # --------------------------------------------------
  case "subcat":
  # --------------------------------------------------
   $subcat_id    = $_POST['subcat_id'];
    # ----------
    $img_limit  = 9999;
    # ----------
    $sql         = "SELECT * FROM subcategories WHERE subcat_id = ?";
    $arrayParam  = array($subcat_id);
    $data_subcat = $crud_subcat->getSQLGeneric($sql, $arrayParam, true);
    $total_img   = count($data_subcat);
    # ----------
    if($total_img >= $img_limit)
    {
      echo '<script type="text/javascript">';
      echo 'alert("Você já possui '.$img_limit.' imagens cadastradas");';
      echo 'window.history.back();';
      echo '</script>';
      exit;
      # ----------
    }
    # ----------
    $max_files = $img_limit - $total_img;
    # ----------
    for($i=0; $i<$max_files; $i++)
    {
      if(isset($_FILES['img_file']['type'][$i]))
      {
        $allowed_ext = array('jpg','jpeg','png');
        $array_ext   = explode('.', $_FILES['img_file']['name'][$i]);
        $file_ext    = strtolower(end($array_ext));
        # ----------
        if((($_FILES['img_file']['type'][$i] == 'image/png') || ($_FILES['img_file']['type'][$i] == 'image/jpg') || ($_FILES['img_file']['type'][$i] == 'image/jpeg')) && ($_FILES['img_file']['size'][$i] < 500000) && in_array($file_ext, $allowed_ext))
        {
          if($_FILES['img_file']['error'][$i] > 0)
          {
            echo '<script type="text/javascript">';
            echo 'alert("Erro: '.$_FILES['img_file']['error'][$i].'");';
            echo 'window.history.back();';
            echo '</script>';
            exit;
            # ----------
          }
          else
          {
            $img_path    = '../'.$pathsubcatimg;
            $img_tmp     = $_FILES['img_file']['tmp_name'][$i];
            $img_name    = md5(date('d_m_Y_H_i_s').'_'.$_FILES['img_file']['name'][$i]).'.'.$file_ext;
            #-----------
            # Trata a string do alt
            #-----------
            # Retira a extensão do arquivo
            $pre         = str_replace($file_ext, '', $_FILES['img_file']['name'][$i]);
            #-----------
            # Retira o ponto do final
            $middle      = str_replace('.', '', $pre);
            #-----------
            #Retira o "-" e coloca um espaço no lugar
            $alt         = str_replace('-', ' ', $middle);
            # ----------
              
            $arrayUpdate = array('subcat_img' => $img_name);
            $arrayCond = array('subcat_id=' => $subcat_id);
            $return    = $crud_subcat->update($arrayUpdate, $arrayCond);  
              
            # ----------
            move_uploaded_file($img_tmp, $img_path.$img_name);
            # ----------
            echo '<script type="text/javascript">';
            echo 'alert("Upload realizado com sucesso!");';
            if($pdfsubcategoria){
                echo 'window.location.href="editar?mode=subcat&item=pdf&subcat='.$subcat_id.'";'; 
                echo '</script>';
                exit;   
            }else{
                echo 'window.location.href="editar?mode=subcat&item=img&subcat='.$subcat_id.'";';
                echo '</script>';
                exit;
            }           
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
# --------------------------------------------------
case "prod":
# --------------------------------------------------
    $prod_id    = $_POST['prod_id'];
    # ----------
    $img_limit  = 2;
    # ----------
    $sql        = "SELECT * FROM images WHERE prod_id = ?";
    $arrayParam = array($prod_id);
    $data_img   = $crud_img->getSQLGeneric($sql, $arrayParam, true);
    $total_img  = count($data_img);
    # ----------
    if($total_img >= $img_limit){
        echo '<script type="text/javascript">';
        echo 'alert("Você já possui '.$img_limit.' imagens cadastradas");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
        # ----------
    }
    # ----------
    $max_files = $img_limit - $total_img;
    # ----------
    
    for($i=0; $i<=$max_files; $i++){
        if(isset($_FILES['img_file']['type'][$i])){
            $allowed_ext = array('jpg','jpeg','png');
            $array_ext   = explode('.', $_FILES['img_file']['name'][$i]);
            $file_ext    = strtolower(end($array_ext));
            # ----------
            if((($_FILES['img_file']['type'][$i] == 'image/png') || ($_FILES['img_file']['type'][$i] == 'image/jpg') || ($_FILES['img_file']['type'][$i] == 'image/jpeg')) && ($_FILES['img_file']['size'][$i] < 5000000000) && in_array($file_ext, $allowed_ext)){
                if($_FILES['img_file']['error'][$i] > 0){
                    echo '<script type="text/javascript">';
                    echo 'alert("Erro: '.$_FILES['img_file']['error'][$i].'");';
                    echo 'window.history.back();';
                    echo '</script>';
                    exit;
                    # ----------
                } else {            
                    $img_path    = '../'.$pathprodimg;
                    $img_tmp     = $_FILES['img_file']['tmp_name'][$i];

                    $img_name    = md5(date('d_m_Y_H_i_s').'_'.$_FILES['img_file']['name'][$i]).'.'.$file_ext;

                    // print_r($img_tmp     = $_FILES['img_file']['tmp_name']);
                    // exit;
                    
                    #-----------
                    # Trata a string do alt
                    #-----------
                    # Retira a extensão do arquivo
                    $pre         = str_replace($file_ext, '', $_FILES['img_file']['name'][$i]);
                    #-----------
                    # Retira o ponto do final
                    $middle      = str_replace('.', '', $pre);
                    #-----------
                    #Retira o "-" e coloca um espaço no lugar
                    $alt         = str_replace('-', ' ', $middle);
                    # ----------
                    $arrayInsert = array('prod_id' => $prod_id, 'img_name' => $img_name, 'img_priority' => 99, 'img_alt' => $alt);
                    $return      = $crud_img->insert($arrayInsert);
                    # ----------
                    move_uploaded_file($img_tmp, $img_path.$img_name);
                }
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Imagem inválida!");';
                echo 'window.history.back();';
                echo '</script>';
                exit;
                # ----------
            }
        }
    }
    echo '<script type="text/javascript">';
    echo 'window.location.href="editar?mode=prod&item=img&prod='.$prod_id.'";'; 
    echo '</script>';
    break;
# ----------------------------------------
case "prod_pdf":
    $prod_id = $_POST["prod_id"];
    $crud = Crud::getInstance($pdo,'pdf');
    # -----
    if(isset($_FILES["prod_pdf"]["type"]))
    {
      # Allowed extensions
      $allowedExt = array('pdf');
      $arrayExt   = explode('.', $_FILES['prod_pdf']['name']);
      $fileExt    = strtolower(end($arrayExt));
      # Select for variables
      $sql        = "SELECT * FROM pdf WHERE prod_id = ?";
      $arrayParam = array($prod_id);
      $data_pdf  = $crud->getSQLGeneric($sql, $arrayParam, false);
      # Conditions and upload
      $arrayInsert = array('pdf_title' => $_FILES['prod_pdf']['name'], 'prod_id' => $prod_id);
      //$arrayCond   = array('pdf_id=' => $pdf_id);
      //$return      = $crud->update($arrayUpdate, $arrayCond);

      $return      = $crud_pdf->insert($arrayInsert);          

      # -----
      $srcPath = $_FILES['prod_pdf']['tmp_name'];
      $tgtPath = "../".$pathprodpdf;
      $tgtPath .= $_FILES['prod_pdf']['name'];   
      move_uploaded_file($srcPath,$tgtPath);

      echo '<script type="text/javascript">'; 
      echo 'alert("Upload realizado com sucesso!");';
      echo 'window.location.href="editar?mode=prod&item=pdf&prod='.$prod_id.'";';
      echo '</script>';
      
    }
  break;
  case "cat_pdf":
    $cat_id = $_POST["cat_id"];
    // $crud = Crud::getInstance($pdo,'cat');
    # -----
    if(isset($_FILES["cat_pdf"]["type"]))
    {
      # Allowed extensions
      $allowedExt = array('pdf');
      $arrayExt   = explode('.', $_FILES['cat_pdf']['name']);
      $fileExt    = strtolower(end($arrayExt));

      # Select for variables
      $sql        = "SELECT * FROM categories where cat_id = ?";
      $arrayParam = array($cat_id);
      $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, false);


    if(!empty($data_cat->cat_pdf)){
        $caminho = "../".$pathcatpfd . $data_cat->cat_pdf;
        unlink($caminho);
    }

    $arrayUpdate = array('cat_pdf' => $_FILES['cat_pdf']['name']);
    $arrayCond   = array('cat_id=' => $cat_id);
    $return      = $crud_cat->update($arrayUpdate, $arrayCond);

      # -----
      $srcPath = $_FILES['cat_pdf']['tmp_name'];
      $tgtPath = "../".$pathcatpfd;
      $tgtPath .= $_FILES['cat_pdf']['name'];
      move_uploaded_file($srcPath,$tgtPath);

      echo '<script type="text/javascript">'; 
      echo 'alert("Upload realizado com sucesso!");';
      echo 'window.location.href="editar?mode=prod&item=pdf&prod='.$prod_id.'";';
      echo '</script>';
      
    }
  break;
  case "subcat_pdf":
    
    $subcat_id = $_POST["subcat_id"];
    // $crud = Crud::getInstance($pdo,'cat');
    # -----

    
    if(isset($_FILES["subcat_pdf2"]["type"]))
    {
      # Allowed extensions
      $allowedExt = array('pdf');
      $arrayExt   = explode('.', $_FILES['subcat_pdf2']['name']);
      $fileExt    = strtolower(end($arrayExt));


      # Select for variables
      $sql        = "SELECT * FROM subcategories where subcat_id = ?";
      $arrayParam = array($subcat_id);
      $data_subcat   = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);




    if(!empty($data_subcat->subcat_pdf)){
        $caminho = "../".$pathsubcatpdf . $data_subcat->subcat_pdf;
        unlink($caminho);
    }

    $arrayUpdate = array('subcat_pdf' => $_FILES['subcat_pdf2']['name']);
    $arrayCond   = array('subcat_id=' => $subcat_id);
    $return      = $crud_subcat->update($arrayUpdate, $arrayCond);

      # -----
      $srcPath = $_FILES['subcat_pdf2']['tmp_name'];
      $tgtPath = "../".$pathsubcatpdf;
      $tgtPath .= $_FILES['subcat_pdf2']['name'];

      move_uploaded_file($srcPath,$tgtPath);

      echo '<script type="text/javascript">'; 
      echo 'alert("Upload realizado com sucesso!");';
      echo 'window.location.href="editar?mode=subcat&item=pdf&subcat='.$subcat_id.'";';
      echo '</script>';
      
    }
  break;

    # --------------------------------------------------
    case "ban":
    # --------------------------------------------------
      $ban_limit = 5;
      # ----------
      $sql        = "SELECT * FROM banners";
      $arrayParam = array();
      $data_ban   = $crud_ban->getSQLGeneric($sql, $arrayParam, true);
      $total_ban  = count($data_ban);
      # ----------
      if($total_ban >= $ban_limit)
      {
        echo '<script type="text/javascript">';
        echo 'alert("Você já possui '.$ban_limit.' imagens cadastradas");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
        # ----------
      }
      # ----------
      $max_files = $ban_limit - $total_ban;
      # ----------
      for($i=0; $i<$max_files; $i++)
      {
        if(isset($_FILES['ban_file']['type'][$i]))
        {
          $allowed_ext = array('jpg','jpeg','png');
          $array_ext   = explode('.', $_FILES['ban_file']['name'][$i]);
          $file_ext    = strtolower(end($array_ext));
          # ----------
          if((($_FILES['ban_file']['type'][$i] == 'image/png') || ($_FILES['ban_file']['type'][$i] == 'image/jpg') || ($_FILES['ban_file']['type'][$i] == 'image/jpeg')) && ($_FILES['ban_file']['size'][$i] < 500000) && in_array($file_ext, $allowed_ext))
          {
            if($_FILES['ban_file']['error'][$i] > 0)
            {
              echo '<script type="text/javascript">';
              echo 'alert("Erro: '.$_FILES['ban_file']['error'][$i].'");';
              echo 'window.history.back();';
              echo '</script>';
              exit;
              # ----------
            }
            else
            {
              $ban_path    = '../../img/';
              $ban_tmp     = $_FILES['ban_file']['tmp_name'][$i];
              $ban_name    = md5(date('d_m_Y_H_i_s').'_'.$_FILES['ban_file']['name'][$i]).'.'.$file_ext;
              # ----------
              $arrayInsert = array('ban_name' => $ban_name, 'ban_priority' => 99);
              $return      = $crud_ban->insert($arrayInsert);
              # ----------
              move_uploaded_file($ban_tmp, $ban_path.$ban_name);
              # ----------
              echo '<script type="text/javascript">';
              echo 'alert("Upload realizado com sucesso!");';
              echo 'window.location.href="banners";';
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
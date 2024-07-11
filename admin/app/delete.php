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
$allowedModes = array('cat','subcat','prod','img','fav','pdf','catpdf','subcatpdf');
$allowedItems = array('prod','ban', 'gal','catpdf','cat','subcat','subcatpdf');
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
if($mode == 'img' && !in_array($item, $allowedItems))
{
  echo '<script type="text/javascript">';
  echo 'alert("aqui 1 Parâmetros incorretos");';
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
    $sql        = "SELECT * FROM subcategories WHERE cat_id = ?";
    $arrayParam = array($cat_id);
    $data_subcat  = $crud_subcat->getSQLGeneric($sql, $arrayParam, true);
    foreach($data_subcat as $subcat_info):
    # --------------------------------------------------  
    $nome = "../../.htaccess";
	$arquivo = fopen($nome, "r+");	
	if ($arquivo) {
		$novo_buffer = '';
		while (!feof($arquivo)) {
			$buffer = fgets($arquivo, filesize($nome));
			$novo_buffer .= str_replace("RewriteRule ^".$subcat_info->subcat_url."/?$  index.php?mode=produtos&subcat=".$subcat_info->subcat_id." [NC,L]", " ", $buffer);			
		}
		ftruncate($arquivo, 0);
		rewind($arquivo);
		fwrite($arquivo, $novo_buffer);
		fclose($arquivo);
	}	
    # --------------------------------------------------    
    $sql        = "SELECT * FROM products WHERE subcat_id = ?";
    $arrayParam = array($subcat_info->subcat_id);
    $data_prod  = $crud_prod->getSQLGeneric($sql, $arrayParam, true);
    foreach($data_prod as $prod_info):
    # --------------------------------------------------      
    $nome = "../../.htaccess";
	$arquivo = fopen($nome, "r+");	
	if ($arquivo) {
		$novo_buffer = '';
		while (!feof($arquivo)) {
			$buffer = fgets($arquivo, filesize($nome));
			$novo_buffer .= str_replace("RewriteRule ^".$prod_info->prod_url."/?$  index.php?mode=produto&prod=".$prod_info->prod_id." [NC,L]", " ", $buffer);			
		}
		ftruncate($arquivo, 0);
		rewind($arquivo);
		fwrite($arquivo, $novo_buffer);
		fclose($arquivo);
	}	
    # --------------------------------------------------    
    $arrayDel = array('prod_id=' => $prod_info->prod_id);
    $return   = $crud_prod->delete($arrayDel);
    endforeach;  
    $arrayDel = array('subcat_id=' => $subcat_info->subcat_id);
    $return   = $crud_subcat->delete($arrayDel);
    endforeach; 
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
    $sql          = "SELECT * FROM subcategories WHERE subcat_id = ?";
    $arrayParam   = array($subcat_id);
    $data_subcat  = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);    
    $nome = "../../.htaccess";
	$arquivo = fopen($nome, "r+");	
	if ($arquivo) {
		$novo_buffer = '';
		while (!feof($arquivo)) {
			$buffer = fgets($arquivo, filesize($nome));
			$novo_buffer .= str_replace("RewriteRule ^".$data_subcat->subcat_url."/?$  index.php?mode=produtos&subcat=".$data_subcat->subcat_id." [NC,L]", " ", $buffer);			
		}
		ftruncate($arquivo, 0);
		rewind($arquivo);
		fwrite($arquivo, $novo_buffer);
		fclose($arquivo);
	}	
    # --------------------------------------------------
    $sql        = "SELECT * FROM products WHERE subcat_id = ?";
    $arrayParam = array($subcat_id);
    $data_prod  = $crud_prod->getSQLGeneric($sql, $arrayParam, true);
    foreach($data_prod as $prod_info):
    #---------------------------------------     
    $nome = "../../.htaccess";
	$arquivo = fopen($nome, "r+");	
	if ($arquivo) {
		$novo_buffer = '';
		while (!feof($arquivo)) {
			$buffer = fgets($arquivo, filesize($nome));
			$novo_buffer .= str_replace("RewriteRule ^".$prod_info->prod_url."/?$  index.php?mode=produto&prod=".$prod_info->prod_id." [NC,L]", " ", $buffer);			
		}
		ftruncate($arquivo, 0);
		rewind($arquivo);
		fwrite($arquivo, $novo_buffer);
		fclose($arquivo);
	}       
    #----------------------------------------
    $arrayDel = array('prod_id=' => $prod_info->prod_id);
    $return   = $crud_prod->delete($arrayDel);
    endforeach;    
    #-----------
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
    $sql        = "SELECT * FROM products WHERE prod_id = ?";
    $arrayParam = array($prod_id);
    $data_prod  = $crud_prod->getSQLGeneric($sql, $arrayParam, false);    
    $nome = "../../.htaccess";
	$arquivo = fopen($nome, "r+");	
	if ($arquivo) {
		$novo_buffer = '';
		while (!feof($arquivo)) {
			$buffer = fgets($arquivo, filesize($nome));
			$novo_buffer .= str_replace("RewriteRule ^".$data_prod->prod_url."/?$  index.php?mode=produto&prod=".$data_prod->prod_id." [NC,L]", " ", $buffer);			
		}
		ftruncate($arquivo, 0);
		rewind($arquivo);
		fwrite($arquivo, $novo_buffer);
		fclose($arquivo);
	}	 
    # --------------------------------------------------
    $sql        = "SELECT * FROM favoritos WHERE prod_id = ?";
    $arrayParam = array($prod_id);
    $data_fav  = $crud_fav->getSQLGeneric($sql, $arrayParam, false);
    if($data_fav->fav_id != null){
        $arrayDel   = array('fav_id=' => $data_fav->fav_id);
        $return     = $crud_fav->delete($arrayDel);
    }    
    # --------------------------------------------------
    $arrayDel   = array('prod_id=' => $prod_id);
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
  case "fav":
  # --------------------------------------------------
    $fav_id = $_GET['fav'];
    # ----------
    $arrayDel = array('fav_id=' => $fav_id);  
    $return   = $crud_fav->delete($arrayDel); 
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Exclusão realizada com sucesso!");';
    echo 'window.location.href="visualizar?mode=fav";';
    echo '</script>';
    exit;
    # ----------
  break;
  # --------------------------------------------------
  case "img":
  # --------------------------------------------------
    switch ($item)
    {
      case "cat":
        $cat_id = $_GET['cat_id'];    
        $sql        = "SELECT * FROM categories where cat_id = ?";
        $arrayParam = array($cat_id);
        $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, false);
        $caminhoimg = "../" . $pathcatimg . $data_cat->cat_img;
        unlink($caminhoimg);
        $arrayUpdate = array('cat_img' => '');
        $arrayCond   = array('cat_id=' => $cat_id);
        $return      = $crud_cat->update($arrayUpdate, $arrayCond);
        echo '<script type="text/javascript">'; 
        echo 'alert("Exclusão realizada com sucesso!");'; 
        echo 'window.history.back();';
        echo '</script>';  
      break;
      #--------------------------------------------
      case "subcat":
        $subcat_id = $_GET['subcat'];    
        $sql        = "SELECT * FROM subcategories where subcat_id = ?";
        $arrayParam = array($subcat_id);
        $data_subcat   = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);
        $caminhoimg = "../" . $pathsubcatimg . $data_subcat->subcat_img;
        unlink($caminhoimg);
        $arrayUpdate = array('subcat_img' => '');
        $arrayCond   = array('subcat_id=' => $subcat_id);
        $return      = $crud_subcat->update($arrayUpdate, $arrayCond);
        echo '<script type="text/javascript">'; 
        echo 'alert("Exclusão realizada com sucesso!");'; 
        echo 'window.history.back();';
        echo '</script>';  
      break;
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
          unlink('../'.$pathprodimg.$data_img->img_name);
          # ----------
          $arrayDel = array('img_id=' => $img_id);
          $return   = $crud_img->delete($arrayDel);
          # ----------
          echo '<script type="text/javascript">';
          echo 'alert("Exclusão realizada com sucesso!");';
          echo 'window.location.href="editar?mode=prod&item=img&prod='.$prod_id.'";';
          echo '</script>';
          exit;
        }
        # ----------
      break;
        # --------------------------------------------------
      case "gal":
      # --------------------------------------------------
        $gal_id = $_GET['gal'];
        # ----------
        $sql        = "SELECT * FROM gallery WHERE gal_id = ?";
        $arrayParam = array($gal_id);
        $data_gal   = $crud_gal->getSQLGeneric($sql, $arrayParam, false);
        # ----------
        if(!$data_gal)
        {
          echo '<script type="text/javascript">';
          echo 'alert("Nenhuma imagem para excluir");';
          echo 'window.history.back();';
          echo '</script>';
          exit;
        }
        else
        {
          unlink('../../img/uploads/gallery/'.$data_gal->gal_name);
          # ----------
          $arrayDel = array('gal_id=' => $gal_id);
          $return   = $crud_gal->delete($arrayDel);
          # ----------
          echo '<script type="text/javascript">';
          echo 'alert("Exclusão realizada com sucesso!");';
          echo 'window.location.href="gallery.php";';
          echo '</script>';
          exit;
        }
        # ----------
      break;
      # --------------------------------------------------
      case "ban":
      # --------------------------------------------------
        $ban_id = $_GET['ban'];
        # ----------
        $sql        = "SELECT * FROM banners WHERE ban_id = ?";
        $arrayParam = array($ban_id);
        $data_ban   = $crud_ban->getSQLGeneric($sql, $arrayParam, false);
        # ----------
        if(!$data_ban)
        {
          echo '<script type="text/javascript">';
          echo 'alert("Nenhum banner para excluir");';
          echo 'window.history.back();';
          echo '</script>';
          exit;
        }
        else
        {
          unlink('../../img/uploads/banners/'.$data_ban->ban_name);
          # ----------
          $arrayDel = array('ban_id=' => $ban_id);
          $return   = $crud_ban->delete($arrayDel);
          # ----------
          echo '<script type="text/javascript">';
          echo 'alert("Exclusão realizada com sucesso!");';
          echo 'window.location.href="banners";';
          echo '</script>';
          exit;
        }
        # ----------
      break;      
    }
  break;
  # ----------------------------------------
  case "pdf":
    $pdf_id = $_GET['pdf'];
    # -----
    $crud = Crud::getInstance($pdo,'pdf');
    # -----
    $sql        = "SELECT * FROM pdf WHERE pdf_id = ?";
    $arrayParam	= array($pdf_id);
    $data_pdf  = $crud->getSQLGeneric($sql, $arrayParam, false);
    # -----
    $caminhopdf = "../".$pathprodpdf.$data_pdf->pdf_title/
    unlink($caminhopdf);
    # -----
    $arrayDel = array('pdf_id=' => $pdf_id);
    $return   = $crud_pdf->delete($arrayDel);
    # -----
    echo '<script type="text/javascript">'; 
    echo 'alert("Exclusão realizada com sucesso aaaaaaaaaaaaaaaaaaaaaaa!");'; 
    echo 'window.history.back();';
    echo '</script>';
    break;
    case "catpdf":
        $cat_id = $_GET['cat_id'];    
        $sql        = "SELECT * FROM categories where cat_id = ?";
        $arrayParam = array($cat_id);
        $data_cat   = $crud_cat->getSQLGeneric($sql, $arrayParam, false);
        $caminhopdf = "../" . $pathcatpfd . $data_cat->cat_pdf;
        unlink($caminhopdf);
        $arrayUpdate = array('cat_pdf' => '');
        $arrayCond   = array('cat_id=' => $cat_id);
        $return      = $crud_cat->update($arrayUpdate, $arrayCond);
        echo '<script type="text/javascript">'; 
        echo 'alert("Exclusão realizada com sucesso!");'; 
        echo 'window.history.back();';
        echo '</script>';  
    break;
    case "subcatpdf":
      $subcat_id = $_GET['subcat_id'];
      $sql        = "SELECT * FROM subcategories where subcat_id = ?";
      $arrayParam = array($subcat_id);
      $data_subcat   = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);
      $caminhopdf = "../" . $pathsubcatpdf . $data_subcat->subcat_pdf;
      unlink($caminhopdf);
      $arrayUpdate = array('subcat_pdf' => '');
      $arrayCond   = array('subcat_id=' => $subcat_id);
      $return      = $crud_subcat->update($arrayUpdate, $arrayCond);
      echo '<script type="text/javascript">'; 
      echo 'alert("Exclusão realizada com sucesso!");'; 
      echo 'window.history.back();';
      echo '</script>'; 
    break;    
}
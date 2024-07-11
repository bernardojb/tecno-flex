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
$allowedModes = array('cat','subcat','prod','fav');
# --------------------------------------------------
if(!in_array($mode, $allowedModes)){
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
  $cat_title     = $_POST['cat_title'];
  $cat_priority  = $_POST['cat_priority'];
  $caturl = $cat_title;
  $url = geraurl("$caturl");
  $url = $url;
  # ----------
  $arrayInsert = array(
    'cat_title'    => $cat_title,
    'cat_priority' => $cat_priority,
    'url' => $url
  );
  if($return = $crud_cat->insert($arrayInsert)){
  $sql          = "SELECT * FROM categories ORDER BY cat_id DESC LIMIT 1";
  $arrayParam   = array();
  $data_cat     = $crud_cat->getSQLGeneric($sql, $arrayParam, false);
    $id_cat      = $data_cat->cat_id;
    #insere id na url do categoria cadastrado
    $url = $url . '-'.$id_cat; 
    $arrayUpdate = array(
        'url'      => $url      
    );
    $arrayCond = array('cat_id=' => $id_cat);
    $return    = $crud_cat->update($arrayUpdate, $arrayCond);
  #fim insere id do produto
  if(gerahtaccesscat($url,$id_cat,$arquivocat)){
      echo '<script type="text/javascript">';
      echo 'alert("Cadastrado com sucesso!");';
      if($imagemcategoria){
        echo "window.location.href='editar?mode=cat&item=img&cat=$id_cat';";
        echo '</script>';
        exit;
      }if($pdfcategoria){
        echo "window.location.href='editar?mode=cat&item=pdf&cat=$id_cat';";
        echo '</script>';
      exit;
      }
        echo "window.location.href='visualizar?mode=cat';";
        echo '</script>';
      exit;
  }else{
      echo '<script type="text/javascript">';
      echo 'alert("ERRO AO GERAR HTACCESS");';
      echo "window.location.href='editar?mode=cat&item=img&cat=$id_cat';";
      echo '</script>';
  }
}
exit;
  # ----------
  break;
  # --------------------------------------------------
  case "subcat":
  # --------------------------------------------------
    $cat_id           = $_POST['cat_id'];
    $subcat_title     = $_POST['subcat_title'];
    $subcat_priority  = $_POST['subcat_priority'];
    $subcat_desc      = $_POST['subcat_desc'];
    $subcat_url       = $_POST['subcat_title'];
    $url = geraurl("$subcat_url");
    $url = "subcategoria/".$url;
    #verifica se a url existe no banco 
    # ----------
    $arrayInsert = array(
      'cat_id'           => $cat_id,
      'subcat_title'     => $subcat_title,
      'subcat_priority'  => $subcat_priority,
      'url'       => $url
    );
    if($return = $crud_subcat->insert($arrayInsert)){
        $sql          = "SELECT subcat_id FROM subcategories ORDER BY subcat_id DESC LIMIT 1";
        $arrayParam   = array();
        $data_subcat  = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);
        $id_subcat    = $data_subcat->subcat_id;
            #insere id na url do categoria cadastrado
            $url = $url . '-'.$id_subcat; 
            $arrayUpdate = array(
                'url'      => $url      
            );
            $arrayCond = array('subcat_id=' => $id_subcat);
            $return    = $crud_subcat->update($arrayUpdate, $arrayCond);
        if(gerahtaccesssubcat($url,$id_subcat, $arquivosubcat)){
            echo '<script type="text/javascript">';
            echo 'alert("Arquivo gravado com sucesso");';
            if($imagemsubcategoria){
                echo "window.location.href='editar?mode=subcat&item=img&subcat=$id_subcat';";
                echo '</script>';
                exit;
            }
            if($pdfsubcategoria){
                echo "window.location.href='editar?mode=subcat&item=pdf&subcat=$id_subcat';";
                echo '</script>';
                exit;
            }
            echo "window.location.href='visualizar?mode=subcat';";
            echo '</script>';
            exit;
        }else{
            echo '<script type="text/javascript">';
            echo 'alert("ERRO AO GERAR HTACCESS");';
            echo "window.location.href='editar?mode=subcat&item=img&subcat=$id_subcat';";
            echo '</script>';
        }
    }
  break;
  # --------------------------------------------------
  case "prod":
  # --------------------------------------------------
  if($itemsubcategoria){
    $subcat_id      = $_POST['subcat_id'];
    $prod_title     = $_POST['prod_title'];
    $prod_desc      = $_POST['prod_desc'];
    $exibir      = $_POST['exibir'];
  }else{
    $subcat_id      = $_POST['cat_id'];
    $prod_title     = $_POST['prod_title'];
    $prod_desc      = $_POST['prod_desc'];
    $exibir      = $_POST['exibir'];
  }
    $url            = $prod_title; 
    $url = geraurl("$prod_title");
    $url = $url;
    # ----------
    if($itemsubcategoria){
        $arrayInsert = array(
            'subcat_id'      => $subcat_id,
            'prod_title'     => $prod_title,
            'prod_desc'      => $prod_desc,
            'url'            => $url,
            'ativo'          => $exibir
            );
    }else{
        $arrayInsert = array(
            'subcat_id'      => $subcat_id,
            'prod_title'     => $prod_title,
            'prod_desc'      => $prod_desc,
            'url'            => $url,
            'ativo'          => $exibir
            );
    }
    if($return = $crud_prod->insert($arrayInsert)){
        $sql          = "SELECT * FROM products ORDER BY prod_id DESC LIMIT 1";
        $arrayParam   = array();
        $data_prod    = $crud_prod->getSQLGeneric($sql, $arrayParam, false);
        $id_prod      = $data_prod->prod_id;
        #insere id na url do produto cadastrado
        $url = $data_prod->url . '-'.$id_prod; 
        $arrayUpdate = array(
            'url'      => $url      
        );
        $arrayCond = array('prod_id=' => $id_prod);
        $return    = $crud_prod->update($arrayUpdate, $arrayCond);
    #fim insere id do produto
        if(gerahtaccessprod($url,$id_prod,$arquivoprod)){
            echo '<script type="text/javascript">';
            echo 'alert("URL CADASTRADA NO HTACCESS!");';
            if($imagemproduto){
                echo "window.location.href='editar?mode=prod&item=img&prod=$id_prod';";
                echo '</script>';
                exit;
            }
            if($pdfproduto){
                echo "window.location.href='editar?mode=prod&item=pdf&prod=$id_prod';";
                echo '</script>';
                exit;
            }
            echo "window.location.href='visualizar?mode=prod';";
            echo '</script>';
            exit;           
        }else{
            echo '<script type="text/javascript">';
            echo 'alert("ERRO AO GERAR HTACCESS");';
            echo "window.location.href='editar?mode=prod&item=img&prod=$id_prod';";
            echo '</script>';
        }
    }
    # ----------
  break;
  # --------------------------------------------------
  case "fav":
  # --------------------------------------------------
    $prod_id     = $_POST['prod_id'];
    # ----------
    $sql        = "SELECT * FROM favoritos WHERE prod_id = ?";
    $arrayParam = array($prod_id);
    $data_fav  = $crud_fav->getSQLGeneric($sql, $arrayParam, true);
    if($data_fav != null){
      echo '<script type="text/javascript">';
      echo 'alert("Produto já está cadastrado como Destaque!");';
      echo 'window.location.href="../visualizar?mode=prod";';
      echo '</script>';
      exit;
    }
    #----------
    $arrayInsert = array(
      'prod_id'        => $prod_id,
      'fav_prioridade' => '1'
    );
    $return = $crud_fav->insert($arrayInsert);
    # ----------
    echo '<script type="text/javascript">';
    echo 'alert("Destaque cadastrado com sucesso!");';
    echo 'window.location.href="../visualizar?mode=fav";';
    echo '</script>';
    exit;
    # ----------
  break;
}
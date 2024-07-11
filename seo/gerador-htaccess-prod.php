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
# --------------------------------------------------

    $sql        = "SELECT * FROM seo ORDER BY id DESC LIMIT 1";
    $arrayParam = array();
    $data_prod   = $crud_prod->getSQLGeneric($sql, $arrayParam, false);
    //print_r($data_prod);
    $sql          = "SELECT cat_id FROM subcategories WHERE subcat_id = ?";
    $arrayParam   = array($data_prod->subcat_id);
    $data_subcat  = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);


    $id_cat     = $data_subcat->cat_id;
    $id_produto = $data_prod->id;
    $url_prod = $data_prod->pag_url;

    $fp = fopen("../.htaccess", "a+");

    if ($id_cat == '1'){ 
        $escreve = fwrite($fp, "\n RewriteRule ^$url_prod/?$  pg-seo.php?mode=prod&pag=$id_produto [NC,L] ");
    }else{
        $escreve = fwrite($fp, "\n RewriteRule ^$url_prod/?$  pg-seo.php?mode=prod&pag=$id_produto [NC,L] ");
    }

    fclose($fp);
    # ----------
        
    #$arquivo = '/../../.htaccess';
    #$numero_linha = 211;
    #$conteudo_linha = '#------ADM------';

    #$linhas = file($arquivo); // lê o arquivo na forma de array (cada linha é um elemento)
    #$final_array = array_splice($linhas, $numero_linha - 1); // corta array ($linhas fica com a primeira parte; array_splice retorna a parte cortada)
    #$linhas[] = $conteudo_linha . "\n RewriteRule ^$prod_title/?$  produtos?mode=prod&prod=$id_produto  [NC,L] "; // adiciona após a posição cortada
    #$linhas = array_merge($linhas, $final_array); // junta novamente
    #file_put_contents($arquivo, $linhas);
    
    echo '<script type="text/javascript">';
    echo 'alert("URL amigável gerada com sucesso!");';
    echo 'window.location.href="visualizar?mode=prod";';
    echo '</script>';
    exit;
?>
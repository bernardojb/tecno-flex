<?
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
    $sql          = "SELECT cat_id, subcat_url, subcat_id, subcat_title FROM subcategories ORDER BY subcat_id DESC LIMIT 1";
    $arrayParam   = array();
    $data_subcat  = $crud_subcat->getSQLGeneric($sql, $arrayParam, false);
    
    $id_cat       = $data_subcat->cat_id;
    $id_subcat    = $data_subcat->subcat_id;
    $url_subcat   = $data_subcat->subcat_url; 

    if ($url_subcat == ''){
        echo "erro";
        exit;
    }

    $fp = fopen("../.htaccess", "a+");

    if ($id_cat == '1'){ 
        $escreve = fwrite($fp, "\n RewriteRule ^$url_subcat/?$  index.php?mode=produtos&subcat=$id_subcat [NC,L] ");    
    }else{
        $escreve = fwrite($fp, "\n RewriteRule ^$url_subcat/?$  index.php?mode=produtos&subcat=$id_subcat [NC,L] ");     
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
    echo 'window.location.href="visualizar?mode=subcat";';
    echo '</script>';
    exit;
?>
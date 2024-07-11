<?php

# --------------------------------------------------
# Limit words
# --------------------------------------------------
function limitWords($string, $limit)
{
  $words = explode(" ",$string);
  # ----------
  return implode(" ", array_splice($words, 0, $limit));
}

function geraurl($titulo){
    $titulo = $titulo;
    $titulo = ltrim($titulo);
    $titulo = rtrim($titulo);
    $titulo = preg_replace("[^a-zA-Z0-9_]", "", $titulo);
    $titulo = str_replace(" ", "-", $titulo);
    $titulo = ltrim($titulo);
    $titulo = rtrim($titulo);
    $titulo = strtolower($titulo);

    $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

    $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u');

    $titulo = str_replace($comAcentos, $semAcentos, $titulo);
    $titulo = preg_replace('/[^a-zA-Z0-9 -]/', "", $titulo);  

    $titulo = str_replace("--", "-", $titulo);
    $titulo = str_replace("---", "-", $titulo);
    return("$titulo");
}

# -------------- GERA HTACCES CAT 
function gerahtaccesscat($url, $id, $arquivocat){
    $str = "RewriteRule ^$url?$ $arquivocat?id=$id [NC,L]";

    if(file_exists('../../.htaccess')){
        $fp = fopen("../../.htaccess", "a+");   
        $escreve = fwrite($fp, "\n $str");  
        fclose($fp);
        return(true);
    }else{
        echo "<script>alert('Caminho do htacces errado');</script>";
    }  
}
# -------------- GERA HTACCES SUBCAT 
function gerahtaccesssubcat($url, $id, $arquivosubcat){
    $str = "RewriteRule ^$url?$ $arquivosubcat?id=$id [NC,L]";

    if(file_exists('../../.htaccess')){
        $fp = fopen("../../.htaccess", "a+");   
        $escreve = fwrite($fp, "\n $str");  
        fclose($fp);
        return(true);
    }else{
        echo "<script>alert('Caminho do htacces errado');</script>";
    }  
}
# -------------- GERA HTACCES prod 
function gerahtaccessprod($url, $id, $arquivoprod){
    
    $str = "RewriteRule ^$url?$ $arquivoprod?id=$id [NC,L]";

    if(file_exists('../../.htaccess')){
        $fp = fopen("../../.htaccess", "a+");   
        $escreve = fwrite($fp, "\n $str");  
        fclose($fp);
        return(true);
    }else{
        echo "<script>alert('Caminho do htacces errado');</script>";
    }  
}



function alerta($txt){
    echo "<script>alert('$txt');</script>";
}

function gerasitemap($url){
    $data       = date("Y-m-d");
    $linha     = "</urlset>";
    $substituir = "
<url>
    <loc>https://www.ne.com.br/$url</loc>
        <lastmod>$data</lastmod>
</url>

</urlset>
    ";
    $arquivo    = "../../sitemap.xml";

    $conteudo = file_get_contents($arquivo);
    $novoconteudo = str_replace($linha, $substituir, $conteudo);

    $gravar = fopen($arquivo, "w");
    fwrite($gravar, $novoconteudo);
    fclose($gravar); 

    echo "<script>alert('sitemap.xml gerado com sucesso')</script>";
}
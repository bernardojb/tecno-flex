<?php
    $files = glob('*.{php}',GLOB_BRACE);
    foreach($files as $url){
        $url = explode('.',$url);
        $url = $url[0];
        echo 'RewriteRule ^'.$url.'?$ '.$url.'.php [NC]<br>';
    }
?>
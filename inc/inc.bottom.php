
<?php // include 'inc/inc.seo.php'; ?>
<?php include 'seo/lib/cfg.global.php'; ?>
<?php  
    $sql2        = "SELECT pag_title, pag_url, ativo FROM seo";
    $arrayParam2 = '';
    $page2  = $crud_subcat->getSQLGeneric($sql2, $arrayParam2, true);
     
?>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

<div class="footer-bottom">
		<div class="container-fluid">
			<div class="inner">
				<div class="footer-more-links text-center">
				  <?php
					  foreach ($page2 as $value) {
						if($value->ativo){
						  echo ' <a href="'.$value->pag_url.'">'.$value->pag_title.'</a> | ';

						}
					  }
					?> 
				</div>


			</div>
		</div>
	</div>
<style>
.footer-bottom {
    border-top: 1px solid #ebebeb;
    padding: 26px;
	    font-family: 'Rubik', sans-serif;
    /* border-bottom: 1px solid #ebebeb; */
}
.footer-more-links {
    font-size: 0.8rem;
    color: #666;
}
.footer-more-links a {
    color: #666;
    display: inline-block;
    vertical-align: top;
    padding: 0 5px;
}

</style>
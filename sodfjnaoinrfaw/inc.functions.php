<?php

	$menu = ([
		"home" 		       => "Home",
		"sobre-nos" 	   => "Quem Somos",
		"Área de Atuação"  => [
			"consultoria-empresarial" 	 => "Consultoria Empresarial",
			"direito-medico-e-da-saude"  => "Direito Médico e da Saúde",
			"direito-do-consumidor" 	 => "Direito do Consumidor",
			"direito-do-trabalho" 		 => "Direito do Trabalho",
			"consultoria-previdenciaria" => "Consultoria Previdenciária"
		],
		"artigos-e-noticias"  => "Artigos & Notícias Relevantes",
		"contato" 			  => "Contato"
	]);

	//$dados   = array multidimensional com informações
	//$campo   = coluna do array que vai ser retornada (valores: telefone, email, celular, whatsapp, gmaps e endereco)
	//$return  = return pode ser 'array' ou 'html' | Default = html
	function dadosContato($col, $return = "") {
		
		$dadosContato = array(
			"telefone"  => ["(11) 4329-3701"],
			"endereco"  => ["R. Tijuco Preto, 393 - Conj. 53 - Tatuapé"],
			"email"  	=> ["contato@becaadvocacia.com.br"],
			"gmaps"     => ["https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14630.74271830158!2d-46.572074!3d-23.543805!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5eeae356edf7%3A0x6b046af4516471d8!2sR.+Tijuco+Preto%2C+393+-+Tatuap%C3%A9%2C+S%C3%A3o+Paulo+-+SP%2C+03316-000!5e0!3m2!1spt-BR!2sbr!4v1555942930722!5m2!1spt-BR!2sbr"]
		);
		
		$return = (isset($return) && !empty($return)) ? $return : "html";
		foreach($dadosContato as $ind => $info) {
			if($ind == $col) {
				if(is_array($info) && count($info) > 0) {
					if($return == "html") { $html = ""; }
					foreach($info as $in) {
						if($return == "array") {
							$arrDados[] = $in;
						} else {
							if($ind != "gmaps" && $ind != "endereco") {
								$href  = ($ind == "whatsapp") ? "https://wa.me/55" : (($ind == "email") ? "mailto:" : "tel:");
								$link  = ($ind == "whatsapp" || $ind == "celular" || $ind == "telefone") ? preg_replace("/\D+/", "", $in) : $in;
								$html .= "<a href='".$href.$link."'>".$in."</a>";
							} else if($ind == "gmaps") {
								$html .= $in;
							} else {
								$html .= "<span>".$in."</span>";
							}
						}
					}
				}
			}
		}
		
		if(isset($arrDados) && is_array($arrDados) && !empty($arrDados)) { 
			return $arrDados; 
		} else {
			echo $html;
		}
	}
	
	
	function menuAtivo($link) {
		$linkAtual = strtolower($_SERVER['REQUEST_URI']);
		$pagAtual  = basename($linkAtual);
		return ($pagAtual == $link) ? "active" : false;
	}
	function dropRecursivo($sub, $ctn, $navbar = true) {
		if(is_array($sub) && !empty($sub)) {
			if($navbar == true) { 
				$menuSub  = '<ul class="dropdown-menu dropdown-menu-right dropdown'.$ctn.'">';
				$i=1;
				foreach($sub as $subLink => $subTxt) {
					if(is_array($subTxt) && !empty($subTxt)) {
						$menuSub .= '<li class="nav-item dropdown '.menuAtivo($subLink).'">';
						$menuSub .= '<a data-target="dropdown'.$i.'" class="nav-link dropdown-toggle " href="#">'.$subLink.'</a>';
						$menuSub .= dropRecursivo($subTxt, $i);
					} else {
						$menuSub .= '<li class="nav-item '.menuAtivo($subLink).'">';
						$menuSub .= '<a class="dropdown-item" href="'.$subLink.'">'.$subTxt.'</a>';
					}
					$menuSub .= '</li>';
					$i++;
				}
			} else {
				$menuSub  = '<ul>';
				$i=1;
				foreach($sub as $subLink => $subTxt) {
					if(is_array($subTxt) && !empty($subTxt)) {
						$menuSub .= '<li>';
						$menuSub .= '<a href="#">'.$subLink.'</a>';
						$menuSub .= dropRecursivo($subTxt, $i);
					} else {
						$menuSub .= '<li>';
						$menuSub .= '<a href="'.$subLink.'">'.$subTxt.'</a>';
					}
					$menuSub .= '</li>';
					$i++;
				}
			}
			$menuSub .= '</ul>';
		}
		return $menuSub;
	}
	function getMenu($links, $navbar = true) {
		if($navbar == true) {
			$menuCtn  = '<nav class="navbar navbar-expand-lg">';
			$menuCtn .=	'	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false">';
			$menuCtn .=	'		<i class="fa fa-bars"></i>';
			$menuCtn .=	'	</button>';
			$menuCtn .=	'	<div class="collapse navbar-collapse" id="menuPrincipal">';
			$menuCtn .=	'		<ul class="navbar-nav ml-auto">';
			if(is_array($links) && !empty($links)) {
				$i=1;
				foreach($links as $link => $txt) {
					if(is_array($txt) && !empty($txt)) {
						$menuCtn .= '<li class="nav-item dropdown '.menuAtivo($link).'">';
						$menuCtn .= '<a data-target="dropdown'.$i.'" class="nav-link dropdown-toggle" href="#">'.$link.'</a>';
						$menuCtn .= dropRecursivo($txt, $i);
						$menuCtn .= '</li>';
					} else {
						$root = ($i == 1 && substr($_SERVER['REQUEST_URI'], -1) == '/') ? 'active' : menuAtivo($link);
						$menuCtn .= '<li class="nav-item '.$root.'">';
						$menuCtn .= '<a class="nav-link" href="'.$link.'">'.$txt.'</a>'; 
						$menuCtn .= '</li>';
					}
					$i++;
				}
			}
			$menuCtn .=	'		</ul>';
			$menuCtn .=	'	</div>';
			$menuCtn .=	'</nav>';

		} else {
			
			$menuCtn  =	'<ul>';
			if(is_array($links) && !empty($links)) {
				$i=1;
				foreach($links as $link => $txt) {
					if(is_array($txt) && !empty($txt)) {
						$menuCtn .= '<li>';
						$menuCtn .= '<a href="#">'.$link.'</a>';
						$menuCtn .= dropRecursivo($txt, $i, false);
						$menuCtn .= '</li>';
					} else {
						$menuCtn .= '<li>';
						$menuCtn .= '<a href="'.$link.'">'.$txt.'</a>'; 
						$menuCtn .= '</li>';
					}
					$i++;
				}
			}
			$menuCtn .=	'</ul>';
		}
		
		echo $menuCtn;
	}
?>
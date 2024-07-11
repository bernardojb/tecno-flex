<?php
# ------------------ #
# Author: Ubika Brasil #
# ------------------ #
header("Content-Type: text/html; charset=utf-8", true);

# ----------------------------------------
# Catch actual page
# ----------------------------------------
$activePage = basename($_SERVER['REQUEST_URI']);
if ($activePage == '') {
  $activePage = 'home';
}
# ----------------------------------------
# Cases
# ----------------------------------------
switch ($activePage) {
  case "home":
    $title = "Home";
    $description = "Conheça a Tecno-Flex";
    $activeHome = "active";
    break;
  case 'sobre-nos':
    $title = 'Sobre Nós';
    $description = 'Conheca mais sobre a Tecno-Flex e conheça mais sobre a nossa história. Clique aqui!';
    break;
  case 'contato':
    $title = 'Contato';
    $description = 'Entre em contato conosco, e tire suas dúvidas.';
    break;
  case 'mapa-do-site':
    $title = 'Mapa do Site';
    $description = 'Confira o nosso mapa do site, tenha acesso as todas nossas páginas e confira todos os nossos produtos.';
    break;
  case 'produtos':
    $title = 'Produtos';
    $description = 'Veja aqui nossos produtos, há 62 anos desenvolvendo tubos flexíveis com excelência.';
    break;
  case 'linha-asfalto':
    $title = 'Linha Asfalto';
    $description = 'Está em busca de Linha Asfalto? Conte com a Tecno-Flex que é especialista e oferece as melhores opções para quem busca por qualidade!';
    break;
  case 'linha-automotiva':
    $title = 'Linha Automotiva';
    $description = 'Já conhece nossa Linha Automotiva? A Tecno-Flex conta com anos de experiência para oferecer o melhor custo-benefício do mercado!';
    break;
  case 'linha-eletrica':
    $title = 'Linha Elétrica';
    $description = 'Precisando de Linha Elétrica? A Tecno-Flex é uma das melhores empresas nesse segmento! Clique aqui para entrar em contato.';
    break;
  case 'linha-industrial':
    $title = 'Linha Industrial';
    $description = 'Precisa de Linha Industrial? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'linha-eletro-industrial':
    $title = 'Linha Eletro Industrial';
    $description = 'Precisa de ? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'eletrodutos-metalicos-flexiveis-com-protecao-de-pvc':
    $title = 'Eletrodutos metálicos flexíveis com proteção de PVC';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'eletrodutos-metalicos-flexiveis-sem-protecao-de-pvc':
    $title = 'Eletrodutos metálicos flexíveis sem proteção de PVC';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'conectores-de-aluminio':
    $title = 'Conectores de alumínio';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'conectores-de-latao':
    $title = 'Conectores de latão';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'contra-porcas':
    $title = 'Contra Porcas';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'abracadeiras':
    $title = 'Abraçadeiras';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'flexiveis-para-escapamento':
    $title = 'Flexíveis para escapamento';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'tubo-agra-com-vedacao-de-metaramida-para-asfalto':
    $title = 'Tubo Agra com vedação de metaramida para asfalto';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'tubo-agra-de-inox-ou-zincado':
    $title = 'Tubo agra de inox ou zincado';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'mgp-p':
    $title = 'MGP-P';
    $description = 'Precisa de ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'linha-do-tempo':
    $title = 'Linha do tempo';
    $description = 'Já conhece nossa ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
  case 'mgp-p':
    $title = 'MGP-P';
    $description = 'Já conhece nossa ' . $title . '? Só na Tecno-Flex você encontra as melhores e mais completas opções de produtos. Clique aqui e confira.';
    break;
}
$keywords = "";

$proto = (isset($_SERVER['HTTPS']) === true) ? 'https' : 'http';
$canonical = $proto . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<!doctype html>
<html lang="pt-BR">
<!--
# ~~~~~~~~~~~~~~~~~~ #
# Author: Ubika Brasil #
# ~~~~~~~~~~~~~~~~~~ #
-->

<head>

  <!-- Sempre checar se está OK daqui para baixo -->
  <!-- <base href="https://www.tflx.com.br/"> -->

  <!-- <base href="https://www.tflx.com.br/"> -->

  <!-- Title -->
  <title><?= $title ?><?= $isHome = !isset($isHome) ? ' | Tecno-Flex' : ''; ?></title>
  <!-- Charset -->
  <meta charset="UTF-8">
  <!-- Meta Tags -->
  <meta name="description" content="<?= $description ?>">
  <meta name="keywords" content="<?= $keywords ?>">
  <!-- Canonical -->
  <link rel="canonical" href="<?= $canonical ?>" />
  <!-- OpenGraph -->
  <meta property="og:region" content="Brasil">
  <meta property="og:title" content="<?= $title ?>">
  <meta property="og:type" content="article">
  <meta property="og:description" content="<?= $description ?>">
  <meta property="og:site_name" content="<?= $title ?>">
  <meta property="og:keywords" content="<?= $keywords ?>">
  <meta property="og:canonical" content="<?= $canonical ?>">

  <meta name="author" content="Ubika Brasil">
  <meta name="fone" content="11 3673-7056 | 11 3864-6282" />
  <meta name="city" content="São Paulo" />

  <!-- Daqui para baixo é padrão, não mexer -->

  <meta name="country" content="Brasil" />
  <meta name="geo.region" content="-BR" />
  <meta name="copyright" content="Copyright " />
  <meta name="geo.position" content="-23.539351;-46.681925">
  <meta name="geo.placename" content="São Paulo-SP">
  <meta name="geo.region" content="SP-BR">
  <meta name="ICBM" content="-23.539351;-46.681925">
  <meta name="robots" content="index,follow">
  <meta name="rating" content="General">
  <meta name="revisit-after" content="2 days">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <!-- CDN -->
  <?php include 'inc/inc.cdn.php'; ?>
  <!-- CSS -->
  <?php include 'inc/inc.css.php'; ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-PZQTFRHPRQ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-PZQTFRHPRQ');
  </script>

  <!-- Google Tag Manager -->
  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WWSKGQ3');
  </script>
  <!-- End Google Tag Manager -->

  <script type="application/ld+json">
   {
      "@context": "https://schema.org/",
      "@type": "WebSite",
      "name": "Tecno-Flex",
      "url": "https://www.tflx.com.br/",
      "potentialAction": {
         "@type": "SearchAction",
         "target": "{search_term_string}",
         "query-input": "required name=search_term_string"
      }
   }
   </script>

  <script type="application/ld+json">
   {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Tecno-Flex",
      "image": "https://www.tflx.com.br/img/logo.svg",
      "@id": "",
      "url": "https://www.tflx.com.br/",
      "telephone": "(11) 5643-4600",
      "priceRange": "R$",
      "address": {
         "@type": "PostalAddress",
         "streetAddress": "Rua Plácido Vieira, 79 - Santo Amaro",
         "addressLocality": "São Paulo",
         "postalCode": "04754-080",
         "addressCountry": "BR"
      },
      "geo": {
         "@type": "GeoCoordinates",
         "latitude": -23.6487363,
         "longitude": -46.7122913
      },
      "openingHoursSpecification": {
         "@type": "OpeningHoursSpecification",
         "dayOfWeek": [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday"
         ],
         "opens": "08:00",
         "closes": "17:30"
      }
   }
   </script>


  <!-- LGPD -->
  <meta name="adopt-website-id" content="8e3b9455-7eb8-472a-b65a-a9075f7758aa" />
  <script src="//tag.goadopt.io/injector.js?website_code=8e3b9455-7eb8-472a-b65a-a9075f7758aa" class="adopt-injector">
  </script>
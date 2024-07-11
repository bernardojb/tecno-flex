<?php include 'inc/inc.seo.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

</head>

<body>

   <!--================Header Menu Area =================-->
   <?php include 'inc/inc.header.php'; ?>
   <!--================Header Menu Area =================-->

   <!--================Home Banner Area =================-->
   <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
         <div class="container">
            <div class="banner_content d-md-flex justify-content-between flex-direction-column">

               <div class="mb-3 mb-md-0">
                  <h1>Sobre</h1>
               </div>
               <div class="page_link">
                  <a href="home">Home</a>
                  <a href="sobre-nos">Sobre Nós</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================End Home Banner Area =================-->





   <!--================About  Area =================-->
   <section class="about-area mt-5">
      <div class="container">

         <div class="row justify-content-md-center mt-5">
            <div class="col-md-8 text-center">
               <h2 class='title4'>Política de Qualidade</h2>
               <ul>
                  <li>Busca do atendimento às necessidades dos clientes</li>
                  <li>Busca do atendimento dos requisitos aplicáveis</li>
                  <li>Melhoria contínua dos processos</li>
                  <li>Melhoria contínua dos produtos</li>
                  <li>Efetiva parceria com nossos colaboradores</li>
               </ul>
            </div>
         </div>
         <div class="row justify-content-md-center">
            <div class="col-md-7 text-justify">
               <h2 class='title2 text-center'>Missão</h2>
               <p>A Tecno-Flex tem como missão desenvolver soluções personalizadas que atendam às necessidades
                  específicas de cada cliente, maximizando resultados.</p>
            </div>
         </div>
         <div class="row justify-content-md-center mt-5">
            <div class="col-md-7 text-justify">
               <h2 class='title2 text-center'>Visão</h2>
               <p>Aumentar a participação no mercado global oferecendo o melhor pacote de valor, garantindo a máxima
                  satisfação dos clientes.</p>
            </div>
         </div>
         <div class="row justify-content-md-center mt-5">
            <div class="col-md-7 text-center">
               <h2 class='title3 text-center'>Valores</h2>
               <ul>
                  <li>Honestidade</li>
                  <li>Transparência</li>
                  <li>Ética</li>
                  <li>Satisfação dos consumidores</li>
                  <li>Respeito à natureza</li>
               </ul>
            </div>
         </div>

         <div class="row justify-content-md-center mt-5">
            <div class="col-md-7 text-justify">
               <h2 class='title2 text-center'>Certificado</h2>
               <h3 class="text-center">ISO-9001</h3>
               <!-- <p class="mb-4">A Tecno-Flex tem como maior preocupação a qualidade dos produtos oferecidos. Além de uma matéria prima selecionada, nosso desenvolvimento conta com todas as normas previstas no <b>ISO 9001:2015</b>, cumprindo rigorosamente todas as especificações necessárias de acordo com a ABNT NBR 16402 de 2015. </p> -->
               <a href="http://www.sgs.com/certifiedclients" target="_blank">
                  <img src="img/sgs.png" class="img-fluid d-block m-auto" alt="SGS" title="SGS" width='150'>
               </a>
               <div class="text-center mt-5 mb-3">
                  <a href="img/certificado.pdf" class='button button-contactForm' data-fancybox="gallery">Ver
                     certificado</a>
               </div>
            </div>
         </div>
      </div>
      <?php include 'counter.php';?>
   </section>
   <!--================About Area End =================-->

   <?php include 'inc/inc.footer.php'; ?>
   <?php include 'inc/inc.js.php'; ?>
   <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
   <script src="js/jquery.counterup.min.js"></script>
   <script src="js/counter.js"></script>
   <script>
   function formatarValor(valor) {
      return valor.toLocaleString('pt-BR');
   }
   document.querySelector('#km').innerText = formatarValor(<?=$finalNumber;?>)
   </script>
</body>

</html>
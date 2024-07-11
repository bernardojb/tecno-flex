<?php include 'inc/inc.seo.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
            <h1>Contato</h1>
          </div>
          <div class="page_link">
            <a href="home">Home</a>
            <a href="contato">Contato</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->


  <!-- ================ contact section start ================= -->
  <section class="contact-section area-padding">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Entre em Contato</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contato_envia.php" method="post" >
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" required name="name" id="name" type="text" placeholder="Nome">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" required name="email" id="email" type="email" placeholder="E-mail">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" required name="subject" id="subject" type="text" placeholder="Assunto">
                </div>
              </div>
              <input type="hidden" name="zoiao" value="">
              <div class="col-12">
                <div class="form-group">
                  <textarea class="form-control w-100" required name="message" id="message" cols="30" rows="9" placeholder="Mensagem"></textarea>
                </div>
              </div>
            </div>
            <div class="g-recaptcha" data-sitekey="6LegAlEbAAAAAPz9G3vEkOhsuaocnmdp3VHw3wNF"></div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm" id="botaoform">Enviar</button>
            </div>
          </form>


        </div>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fas fa-home"></i></span>
            <div class="media-body">
              <h3>Rua Plácido Vieira, 79 </h3>
              <p> Santo Amaro - São Paulo/SP </p>
              <a class="a-text" data-fancybox data-type="iframe" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3654.7671944095846!2d-46.712251!3d-23.648507!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x80015e111ed6e206!2sTecno%20Flex%20Ind%20Com%20Ltda!5e0!3m2!1spt-BR!2sbr!4v1622553685565!5m2!1spt-BR!2sbr" href="javascript:;">
                <img src='img/gmaps.png' class='icon-routes' alt="ícone google maps" title="ícone google maps" />
              </a>
              <!-- <a class="a-text" data-fancybox data-type="iframe" data-src="https://embed.waze.com/iframe?zoom=16&lat=-23.648439&lon=-46.712121&ct=livemap&pin=1&navigate=yes" href="javascript:;"> -->
              <!-- <a class="a-text" data-fancybox data-type="iframe" data-src="https://www.waze.com/ul?ll=-23.648439%2C-46.712121&navigate=yes&zoom=17" href="javascript:;"> -->
              <a class="a-text" href="https://www.waze.com/ul?ll=-23.648439%2C-46.712121&navigate=yes&zoom=17" target='_blank'>
                <img src='img/waze.png' class='icon-routes' alt="ícone waze" title="ícone waze" />
              </a>
            </div>
            
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fas fa-tablet-alt"></i></span>
            <div class="media-body">
              <h3><a href="tel:+551151814500">(11) 5181-4500</a></h3>
              <h3><a href="tel:+551156434600">(11) 5643-4600</a></h3>
              <p>Seg. a Sex: 08hs às 17:30</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fab fa-whatsapp"></i></span>
            <div class="media-body">
              <h3><a href="https://wa.me/5511944801963" target="_blank">(11) 94480-1963</a></h3>
              <p>Seg. a Sex: 08hs às 17:30</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fas fa-mail-bulk"></i></span>
            <div class="media-body">
              <h3><a href="mailto:contato@tflx.com.br">contato@tflx.com.br</a></h3>
              <p>Envie-nos um e-mail a qualquer momento!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-5 pb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2584.312475596877!2d-46.71237718374996!3d-23.648415422312773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce50ddee190ca7%3A0x80015e111ed6e206!2sTecno%20Flex%20Ind%20Com%20Ltda!5e0!3m2!1spt-BR!2sbr!4v1586978981147!5m2!1spt-BR!2sbr" width="100%" height="480" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->


  <?php include 'inc/inc.footer.php'; ?>
  <?php include 'inc/inc.js.php'; ?>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</body>

</html>
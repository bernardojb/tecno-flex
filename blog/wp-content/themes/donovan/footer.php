<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Donovan
 */

?>

	</div><!-- #content -->

	<?php do_action( 'donovan_before_footer' ); ?>

	<div id="footer" class="footer-wrap">

		<footer class="cem">
        <div class="flex">
            <div class="f1">
                <img src="https://www.tflx.com.br/blog/wp-content/uploads/2021/07/logo-branco-novo.png" alt="tecno-flex" title="tecno-flex">
                <p>
                    Há <?=date('Y') - 1959?> anos desenvolvendo soluções personalizadas que atendem às suas necessidades.
                </p>
            </div>
            <div class="f1">
                <h3>Institucional</h3>
                <ul>
                    <li><a href="https://www.tflx.com.br/home">Home</a></li>
                    <li><a href="https://www.tflx.com.br/sobre-nos">Sobre</a></li>
                    <li><a href="https://www.tflx.com.br/contato">Contato</a></li>
                    <li><a href="https://www.tflx.com.br/mapa-do-site">Mapa do site</a></li>

                </ul>
            </div>
            <div class="f1">
                <h3>Produtos e Serviços</h3>
                <ul>
                    <li><a href="https://www.tflx.com.br/linha-asfalto">Linha Asfalto</a></li>
                    <li><a href="https://www.tflx.com.br/linha-automotiva">Linha Automotiva</a></li>
                    <li><a href="https://www.tflx.com.br/linha-eletrica">Linha Elétrica</a></li>
                    <li><a href="https://www.tflx.com.br/linha-industrial">Linha Industrial</a></li>
                </ul>
            </div>
            <div class="f1">
                <h3>Contato</h3>
                <ul>
                    <li>
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        Rua Plácido Vieira, 79 <br> Santo Amaro - São Paulo/SP <br> CEP: 04754-080

                    </li>
                    <li>
                        <i class="fas fa-envelope mr-1"></i>
                        <a href="mailto:contato@tflx.com.br">contato@tflx.com.br</a>
                    </li>
                    <li>
                        <i class="fas fa-phone mr-1"></i>
                        <a href="tel:+551151814500">(11) 5181-4500</a>
                    </li>
                    <li>
                        <i class="fas fa-phone mr-1"></i>
                        <a href="tel:+551156434600">(11) 5643-4600</a>
                    </li>
                    <li>
                        <i class="fab fa-whatsapp mr-1"></i>
                        <a href="https://wa.me/5511944801963" target="_blank">(11) 94480-1963</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

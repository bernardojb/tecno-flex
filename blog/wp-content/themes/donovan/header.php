<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Donovan
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!-- <script type="text/javascript">(function(n,r,l,d){try{var h=r.head||r.getElementsByTagName("head")[0],s=r.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src",l);n.neuroleadId=d;h.appendChild(s);}catch(e){}})(window,document,"https://cdn.leadster.com.br/neurolead/neurolead.min.js", 24536);</script> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action('wp_body_open'); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'donovan'); ?></a>

		<?php do_action('donovan_header_bar'); ?>

		<header id="masthead" class="site-header clearfix" role="banner">

			<div class="header-main container clearfix">

				<div id="logo" class="site-branding clearfix">

					<?php donovan_site_logo(); ?>
					<?php donovan_site_title(); ?>
					<?php donovan_site_description(); ?>

				</div><!-- .site-branding -->

				<?php get_template_part('template-parts/header/navigation', 'social'); ?>

			</div><!-- .header-main -->

			<?php get_template_part('template-parts/header/navigation', 'main'); ?>

			<?php donovan_header_image(); ?>

			<?php donovan_breadcrumbs(); ?>

		</header><!-- #masthead -->

		<div id="content" class="site-content container">
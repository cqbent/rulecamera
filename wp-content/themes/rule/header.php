<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php storefront_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php
	do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" <?php if ( get_header_image() != '' ) { echo 'style="background-image: url(' . esc_url( get_header_image() ) . ');"'; } ?>>
		<div class="col-full">

			<?php
			/**
			 * @hooked storefront_skip_links - 0
			 * @hooked storefront_social_icons - 10
			 * @hooked storefront_site_branding - 20
			 * @hooked storefront_secondary_navigation - 30
			 * @hooked storefront_product_search - 40
			 * @hooked storefront_primary_navigation - 50
			 * @hooked storefront_header_cart - 60
			 */
			remove_action('storefront_header', 'storefront_primary_navigation',50);
			remove_action('storefront_header', 'storefront_site_branding',20);
			remove_action('storefront_header', 'storefront_header_cart',60);
			//add_action('storefront_header', 'rule_primary_navigation', 50)
			?>
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo '<img src="' . get_stylesheet_directory_uri() . '/images/rule_logo.png" />'; ?></a></h1>
			</div>
			<div class="site-header-content">
				<div class="contact">
					<span class="call">
						Call: 800.785.3266
					</span>
					<a href="#">Contact Us</a>
				</div>
				<?php
				do_action( 'rule_header_top' ); ?>
				<div class="social-links">
					<a class="twittersm" href="http://twitter.com/#!/rulebostoncam" target="_blank"><i class="fa fa-twitter-square"></i></a>
					<a class="facebooksm" href="http://www.facebook.com/pages/Rule-Boston-Camera/46957103796" target="_blank"><i class="fa fa-facebook-square"></i></a>
					<a class="linkedinsm" href="http://www.linkedin.com/groups?gid=1781545" target="_blank"><i class="fa fa-linkedin-square"></i></a>
					<a class="vimeosm" href="http://vimeo.com/channels/rulelearninglabseries" target="_blank"><i class="fa fa-vimeo-square"></i></a>
					<a class="instagram" href="http://instagram.com/rulebostoncamera" target="_blank"><i class="fa fa-instagram"></i></a>
					<a class="pinterest" href="http://www.pinterest.com/rulebostoncam/" target="_blank"><i class="fa fa-pinterest-square"></i></a>
					<a class="tumblr" href="http://rulebostoncamera.tumblr.com/" target="_blank"><i class="fa fa-tumblr-square"></i></a>
					<a class="googleplus" href="https://plus.google.com/103862733335946680123/posts" target="_blank"><i class="fa fa-google-plus-square"></i></a>
				</div>
			</div>
            <?php do_action( 'rule_header_bottom' ); ?>
		</div>
		<div class="col-full yellow">

		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' ); ?>

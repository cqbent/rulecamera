<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/**
			 * @hooked storefront_homepage_content - 10
			 * @hooked storefront_product_categories - 20
			 * @hooked storefront_recent_products - 30
			 * @hooked storefront_featured_products - 40
			 * @hooked storefront_popular_products - 50
			 * @hooked storefront_on_sale_products - 60
			 */
			//do_action( 'homepage' );

			/*
			 * banner image
			 * buy, rent, featured nav
			 * buy, rent, featured items
			 * news, events items
			 */

			?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

			<div class="home-banner">

			</div>
			

			<?php
				//dynamic_sidebar('content_area_widget');
				dynamic_sidebar( 'rule-content-sidebar' );

			?>



		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>

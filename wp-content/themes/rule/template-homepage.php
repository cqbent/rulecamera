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
			<div class="buy-rent-learn">
				<div class="col buy">
					<div class="box">
						<h3><a href="/product-category/sales"><img class="alignnone wp-image-2241 size-full" src="/wp-content/uploads/2015/10/home_buy_headline.png" alt="home_buy_headline" /></a></h3>
						<p>We are very choosy about what we sell, and we're happy to consult on the best gear for your needs.</p>
						<a href="/product-category/sales" class="button">Learn More</a>
					</div>
					<div class="feature">
						<?php
						echo do_shortcode('[featured_product_categories cats="12" per_cat="1" columns="1"]');
						?>
					</div>
				</div>
				<div class="col rent">
					<div class="box">
						<h3><a href="/product-category/rentals"><img class="alignnone size-full wp-image-2243" src="/wp-content/uploads/2015/10/home_rent_headline.png" alt="rent" /></a></h3>
						<p>We'll work with you to make sure you get what you neeed, froma  few pieces of gear to entire systems.</p>
						<a href="/product-category/rentals" class="button">Learn More</a>
					</div>
					<div class="feature">
						<?php
						echo do_shortcode('[featured_product_categories cats="8" per_cat="1" columns="1"]');
						?>
					</div>
				</div>
				<div class="col learn">
					<div class="box">
						<h3><img class="alignnone size-full wp-image-2242" src="/wp-content/uploads/2015/10/home_learn_headline.png" alt="learn" /></h3>
						<p>Check out our Learning Labs, Pub Nights, Sponsor Events, videos and lots of other useful resources.</p>
						<a href="/learn" class="button">Learn More</a>
					</div>
					<div class="feature">
						<h4>Upcoming Events</h4>
						<?php
						echo do_shortcode('[ecs-list-events limit="2"]');
						?>
						<a href="/events">View all Events</a>
					</div>
				</div>
			</div>

			<?php
				//dynamic_sidebar('content_area_widget');

			?>



		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>

<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


get_header( 'shop' );


?>

	<header class="archive-header rentals">

		<div class="entry-header-title">
			<h1 class="section-title">Sales</h1>
		</div>

	</header>

	<div class="content-container">


	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>


		<ul class="staff-list">
			<li>
				<div class="image">
					<img width="150" height="150" src="http://rulecamera/wp-content/uploads/2015/11/ChristinaOrtiz_Web-150x150.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="Christina Ortiz" srcset="http://rulecamera/wp-content/uploads/2015/11/ChristinaOrtiz_Web-150x150.jpg 150w, http://rulecamera/wp-content/uploads/2015/11/ChristinaOrtiz_Web-300x300.jpg 300w, http://rulecamera/wp-content/uploads/2015/11/ChristinaOrtiz_Web-1024x1024.jpg 1024w, http://rulecamera/wp-content/uploads/2015/11/ChristinaOrtiz_Web-180x180.jpg 180w, http://rulecamera/wp-content/uploads/2015/11/ChristinaOrtiz_Web-600x600.jpg 600w" sizes="(max-width: 150px) 100vw, 150px">
				</div>
				<div class="info">
					<span>Got a question?</span>
					<span class="tel" href="tel:800.785.3200">800.785.3200</span>
					<span class="email"><a href="mailto:info@rule.com">info@rule.com</a></span>
				</div>
			</li>
		</ul>
		<?php
			/**
			 * woocommerce_archive_description hook
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );

		?>

	<?php
		// show single featured product followed by 3 other featured products
		// show product categories
	?>

		<div class="feature">
			<h2>Featured Products</h2>
			<?php
			echo do_shortcode('[rule_featured_product_categories cats="12" per_cat="4" columns="3" excerpt=true]');
			?>
		</div>

		<div class="product-categories">
			<h2>Product Categories</h2>
			<ul>
				<?php print display_product_category_menu_list(12); ?>
			</ul>
		</div>

	<!-- close div tags -->
	</div></div>

	</div>

<?php get_footer( 'shop' ); ?>

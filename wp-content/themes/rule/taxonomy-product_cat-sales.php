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

	<header class="archive-header sales">

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
	</div>

	<?php get_sidebar('rule'); ?>

	</div>

	</div>

<?php get_footer( 'shop' ); ?>

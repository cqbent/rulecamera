<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>
	<?php
	remove_action('storefront_page', 'storefront_page_header');
	//add_action('rule_page', 'storefront_page_header');
	//do_action('rule_page');
	//print do_shortcode('[woof sid="rule_product_filter" autohide=0 price_filter=0]');
	?>
	<header class="entry-header">
		<?php
		$page_title = empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
		//the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' );
		echo '<h1 class="entry-title" itemprop="name">'.$page_title.'</h1>';
		?>
	</header><!-- .entry-header -->

	<div id="primary" class="content-area col-full">
		<h2 class="page-title"><?php the_title(); ?></h2>
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				do_action( 'storefront_page_before' );
				?>

				<?php do_action('storefront_page'); ?>

				<?php
				/**
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	$id = get_the_ID();
	if ($id == 2247) {
		do_action( 'storefront_sidebar' );
	}
	//do_action( 'storefront_sidebar' );
	echo do_shortcode('[sidebar_menu]');
	// right sidebar ???



?>
<?php get_footer(); ?>

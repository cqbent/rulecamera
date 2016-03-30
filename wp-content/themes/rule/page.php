<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template name: Rule Page
 *
 * @package storefront
 */

get_header(); ?>
	<?php
	remove_action('storefront_page', 'storefront_page_header');
	$parent = get_menu_parent(get_the_ID());
	//add_action('rule_page', 'storefront_page_header');
	//do_action('rule_page');
	//print do_shortcode('[woof sid="rule_product_filter" autohide=0 price_filter=0]');
	//$parents = get_post_ancestors($post->ID);
	//$parent = get_post($parents[count($parents)-1]);
	//$mpid = get_menu_parent_id('primary');
	//$parent = get_post($mpid);
	//$locations = get_nav_menu_locations();
	//$menu_id   = $locations['primary'];
	//var_dump(get_queried_object());
	//var_dump(wp_get_nav_menu_items($menu_id));

	//$page_title = empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );

	//the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' );
	//echo '<h1 class="entry-title" itemprop="name">'.$page_title.'</h1>';
	//var_dump(get_menu_parent_ID('primary'));
	?>
	<header class="entry-header <?php print $parent->post_name; ?>">

		<div class="entry-header-title">
			<h1 class="entry-title" itemprop="name"><?php echo $parent->post_title; ?></h1>
		</div>
	</header><!-- .entry-header -->
	<div class="content-container <?php print $post->post_name . ' '.$parent->post_name; ?>">

		<div id="primary" class="content-area col-full">
			<?php if ($post->post_parent) : ?>
				<h2 class="page-title"><?php the_title(); ?></h2>
			<?php endif; ?>

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
		if ($id == 2247) { // if this is the blog page then add right sidebar
			do_action( 'storefront_sidebar' );
		}
		//do_action( 'storefront_sidebar' );
		echo do_shortcode('[sidebar_menu child_of="'.$parent->post_title.'" parent_id="'.$parent->ID.'"]');
		// right sidebar ???

		get_sidebar('rule');
		?>

	</div>

<?php get_footer(); ?>

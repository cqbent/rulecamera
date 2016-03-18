<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template name: Rule Landing Page
 *
 * @package storefront
 */

get_header(); ?>
	<?php
	remove_action('storefront_page', 'storefront_page_header');
	$parent = get_menu_parent(get_the_ID());
	?>
	<header class="entry-header <?php print $parent->post_name; ?>">

		<div class="entry-header-title">
			<h1 class="entry-title" itemprop="name"><?php echo $parent->post_title; ?></h1>
		</div>
	</header><!-- .entry-header -->
	<div class="content-container">

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
		echo do_shortcode('[sidebar_menu]');
		// right sidebar ???
		?>

	</div>

<?php get_footer(); ?>

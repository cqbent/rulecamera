<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Template name: Archive
 *
 * @package storefront
 *
 */

get_header();

remove_action('storefront_page', 'storefront_page_header');
$terminfo = get_queried_object();
var_dump($terminfo);
?>
	<header class="entry-header <?php print $parent->post_name; ?>">

		<div class="entry-header-title">
			<h1 class="entry-title" itemprop="name"><?php echo $parent->post_title; ?></h1>
		</div>
	</header>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php the_archive_title(); ?>
				</h1>

				<?php the_archive_description(); ?>
			</header><!-- .page-header -->

			<?php get_template_part( 'loop' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php do_action( 'storefront_sidebar' ); ?>
<?php get_footer(); ?>

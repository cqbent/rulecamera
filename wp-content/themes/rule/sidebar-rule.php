<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package storefront
 */

if ( ! is_active_sidebar( 'rule-content-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="sidebar-right widget-area" role="complementary">
	<?php dynamic_sidebar( 'rule-content-sidebar' ); ?>
</div><!-- #secondary -->
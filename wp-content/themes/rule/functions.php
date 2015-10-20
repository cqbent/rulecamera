<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/1/15
 * Time: 3:05 PM
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function add_features_fields() {

    $content = '
        <div class="case-card"><label>Case Card</label>' . get_field('case_card') . '</div>
        <div class="features"><label>Features</label>' . get_field('features') . '</div>
        <div class="specs"><label>Specifications</label>' . get_field('specifications') . '</div>
        <div class="sale-quote"><label>Call for Sale Quote: </label>' . get_field('call_for_sale_quote') . '</div>
        <div class="model-id"><label>Manufacturer Model ID: </label>' . get_field('manufacturer_model_id') . '</div>
        <div class="product-number"><label>Product Number: </label>' . get_field('product_number') . '</div>
        <div class="rental-price"><label>Rental Price: </label>' . get_field('rental_price') . '</div>
        <div class="for-rent"><label>For Rent: </label>' . get_field('for_rent') . '</div>

    ';
    print $content;
}
add_action( 'woocommerce_after_single_product_summary', 'add_features_fields', 10 );

// register content widget area
function rule_widgets_init() {

    register_sidebar( array(
        'name'          => 'Rule Content Sidebar',
        'id'            => 'content_area_widget',
        'before_widget' => '<div class="content-area-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'rule_widgets_init' );

// show latest posts
function show_latest_posts() {
    $recent_posts = wp_get_recent_posts();
    foreach( $recent_posts as $recent ) {
        echo '<article>
            <h2><a href="' . get_permalink($recent['ID']) . '">' . $recent["post_title"] . '</a></h2>
            </article>';
    }
}

add_shortcode( 'latest_posts', 'show_latest_posts' );

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



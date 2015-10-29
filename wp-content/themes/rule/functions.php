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

// add custom manufacturer product category
/*
function product_manufacturer_categories() {
    $labels = array(

    );
    register_taxonomy(
        'manufacturers',
        'products',
        array(
            'label' => __( 'Manufacturers' ),
            'rewrite' => array( 'slug' => 'manufacturers' ),
            'hierarchical' => true,
        )
    )
}
*/

// add custom menu items
function rule_nav_menu_items($items) {
    $homelink = '<li class="home"><a href="' . home_url( '/' ) . '">' . __('Home') . '</a></li>';
    // add the home link to the end of the menu
    $items = $items . $homelink;
    return $items;
}

add_filter( 'wp_nav_menu_items', 'rule_nav_menu_items' );

function rule_primary_navigation() {
    ?>
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
        <button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false"><?php echo esc_attr( apply_filters( 'storefront_menu_toggle_text', __( 'Navigation', 'storefront' ) ) ); ?></button>
        <?php
        wp_nav_menu(
            array(
                'theme_location'	=> 'primary',
                'container_class'	=> 'primary-navigation',
                'walker'            => new Walker_Rule_Submenu,
            )
        );

        wp_nav_menu(
            array(
                'theme_location'	=> 'handheld',
                'container_class'	=> 'handheld-navigation',
                'walker'            => new Walker_Rule_Submenu,
            )
        );
        ?>
    </nav><!-- #site-navigation -->
    <?php
}
add_action('rule_header_top', 'storefront_product_search', 10);
add_action('rule_header_bottom', 'rule_primary_navigation', 10);

class Walker_Rule_Submenu extends Walker_Nav_Menu {
    function end_el(&$output, $item, $depth=0, $args=array()) {
        if( 'Rentals' == $item->title ){
            $output .= '<ul>'.display_product_categories(8).'</ul>';
        }
        else if( 'Sales' == $item->title ){
            $output .= '<ul>'.display_product_categories(12).'</ul>';
        }
        $output .= "</li>\n";
    }
}
//$items = wp_get_nav_menu_items('Main Menu');
//print_r($items);

function display_product_categories($id) {
    $args = array(
        'type' => 'product',
        'taxonomy' => 'product_cat',
        'parent' => $id,
    );
    $product_cat = get_categories($args);
    $output = '';
    for ($i=0; $i<count($product_cat); $i++) {
        $output .= '<li><a href="/rentals/'.$product_cat[$i]->slug.'">'.$product_cat[$i]->cat_name.'</a></li>';
    }
    return $output;
    //print($output);
}
//add_shortcode( 'product_cat', 'display_product_categories' );

// disable cart and checkout stuff
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );




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

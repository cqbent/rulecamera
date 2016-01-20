<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/1/15
 * Time: 3:05 PM
 */
add_filter('widget_text', 'do_shortcode');
add_action( 'wp_enqueue_scripts', 'rule_enqueue_styles' );
function rule_enqueue_styles() {
    //wp_dequeue_style('open-sans-css');
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'FontAwesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
    wp_enqueue_style('open-sans-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic');
    wp_enqueue_script('script.js', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'));
}

// remove storefront inline styles
add_filter( 'storefront_customizer_enabled', '__return_false' );



/*
function add_features_fields() {
    $content = '
        <div class="features"><label>Features</label>' . get_field('features') . '</div>
        <div class="specs"><label>Specifications</label>' . get_field('specifications') . '</div>
        <div class="rental-price"><label>Rental Price: </label>' . get_field('rental_price') . '</div>
        <div class="for-rent"><label>For Rent: </label>' . get_field('for_rent') . '</div>

    ';
    print $content;
}
add_action( 'woocommerce_after_single_product_summary', 'add_features_fields', 10 );
*/
// add custom manufacturer product category
function product_manufacturer_categories() {
    $labels = array(
        'name'                       => _x( 'Manufacturers', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Manufacturer', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Manufacturers', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'manufacturers', array( 'product' ), $args );

}
add_action( 'init', 'product_manufacturer_categories', 0 );

// create people post type
function create_post_type_people() {
    register_post_type( 'people',
        array(
            'labels' => array(
                'name' => __( 'People' ),
                'singular_name' => __( 'People' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'people', 'with_front' => false),
            'hierarchical' => true,
            'supports' => array('title','author','custom-fields','thumbnail','editor'),
            'taxonomies' => array('category'),
            'not-found' => __('Nothing was found. what to do?')
        )
    );
}
add_action( 'init', 'create_post_type_people' );

// add custom menu items
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
            $output .= '<ul class="sub-menu rentals">'.display_product_category_menu_list(8).'</ul>';
        }
        else if( 'Sales' == $item->title ){
            $output .= '<ul class="sub-menu sales">'.display_product_category_menu_list(12).'</ul>';
        }
        $output .= "</li>\n";
    }
}

function display_product_category_menu_list($id) {
    $args = array(
        'type' => 'product',
        'taxonomy' => 'product_cat',
        'child_of' => $id,
    );
    $cat_parent = get_term($id, 'product_cat');
    $product_cat = get_categories($args);
    $output = '';
    //print_r($product_cat);
    /*
    for ($i=0; $i<count($product_cat); $i++) {
        $output .= '<li><a href="/product-category/'.$cat_parent->slug.'/'.$product_cat[$i]->slug.'">'.$product_cat[$i]->cat_name.'</a></li>';
    }
    */
    $args2 = array(
        'title_li' => '',
        'taxonomy' => 'product_cat',
        'style' => 'list',
        'child_of' => $id,
        'echo' => 0
    );
    $output = wp_list_categories($args2);

    return $output;
}

// display product category and ancestors
function display_product_category_widget_list($atts) {
    //$cats = get_the_term_list($id, 'product_cat');
    //print 'this is the text: '.get_the_ID();
    //print $cats;
    $pcatts = shortcode_atts(array('taxonomy' => 'product_cat'), $atts);
    $id = get_the_ID();
    $taxonomy = $pcatts['taxonomy'];
    // get the term IDs assigned to post.
    $post_terms = wp_get_object_terms( $id, $taxonomy, array( 'fields' => 'ids' ) );
    // separator between links
    $separator = ', ';
    $terms = '';
    if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {
        $term_ids = implode( ',' , $post_terms );
        $terms .= wp_list_categories( 'title_li=&style=list&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
        // display post categories
    }
    return  '
        <div class="widget_product_categories">
            <ul class="product-categories">
            '. $terms .'
            </ul>
        </div>';
}

// add child menu
function child_menu_list() {
    // first get the menu id of the
    $post_id = get_the_ID();
    $menu = wp_get_nav_menu_items(362,array(
        'posts_per_page' => -1,
        'meta_key' => '_menu_item_object_id',
        'meta_value' => $post_id
        //'meta_key' => '_menu_item_menu_item_parent',
        //'meta_value' => 3454 // the currently displayed post
    ));
    var_dump($menu);
}

// custom menu configuration for sidebar menu: strip out all menu items that are not part of the current menu tree so it displays
// in similar fashion as menu block module
add_filter( 'wp_nav_menu_objects','custom_nav_menu_objects_sub_menu', 10, 2 );
function custom_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
    if ( isset( $args->sub_menu ) ) {
        $root_id = 0;
        // find the current menu item
        foreach ( $sorted_menu_items as $menu_item ) {
            if ( $menu_item->current ) {
                // set the root id based on whether the current menu item has a parent or not
                $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
                break;
            }
        }
        // find the top level parent
        if ( ! isset( $args->direct_parent ) ) {
            $prev_root_id = $root_id;
            while ( $prev_root_id != 0 ) {
                foreach ( $sorted_menu_items as $menu_item ) {
                    if ( $menu_item->ID == $prev_root_id ) {
                        $prev_root_id = $menu_item->menu_item_parent;
                        // don't set the root_id to 0 if we've reached the top of the menu
                        if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
                        break;
                    }
                }
            }
        }
        $menu_item_parents = array();
        foreach ( $sorted_menu_items as $key => $item ) {
            // init menu_item_parents
            if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
            if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
                // part of sub-tree: keep!
                $menu_item_parents[] = $item->ID;
            } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
                // not part of sub-tree: away with it!
                unset( $sorted_menu_items[$key] );
            }
        }

        return $sorted_menu_items;
    } else {
        return $sorted_menu_items;
    }
}


function get_sidebar_menu() {
    $sm = wp_nav_menu(
        array(
            'theme_location'	=> 'primary',
            'container_class'	=> 'sidebar-navigation',
            'menu_class'        => 'menu-sidebar-menu',
            'echo'              => false,
            'sub_menu'          => true,
        )
    );
    if ($sm) {
        $output = '
        <div class="sidebar-left aside">
            '.$sm.'
        </div>
        ';
    }
    return $output;
}

//add_action('sidebar_menu', 'get_sidebar_menu');
add_shortcode('sidebar_menu', 'get_sidebar_menu');


// get page parent
function footer_menu() {
    wp_nav_menu(
        array(
            'theme_location'	=> 'primary',
            'container_class'	=> 'sidebar-navigation',
            'menu_class'        => 'menu-footer-menu',
            'depth'             => 1
        )
    );
}
add_shortcode('footer_menu','footer_menu');

// add excerpt for product loop
/*
function display_product_excerpt() {
    ?>
    <div itemprop="description">
        <?php echo get_the_excerpt(); ?>
    </div>
    <?php
}
add_action( 'woocommerce_after_shop_loop_item_title', 'display_product_excerpt', 50 );
*/

function display_featured_products() {
    /*
    woocommerce_template_loop_product_thumbnail
    woocommerce_template_loop_product_title
    woocommerce_template_loop_price
    */
}




//add_action('woocommerce_after_single_product', 'display_product_category_ancestors');
add_shortcode( 'product_category_widget_list', 'display_product_category_widget_list' );


// disable cart and checkout stuff
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

// remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// alter price language
add_filter( 'woocommerce_price_html', 'filter_woocommerce_price_html', 10, 2 );
function filter_woocommerce_price_html($price, $instance) {
    return 'Buy for '.$price;
}

// add rental price
add_action('woocommerce_single_product_summary', 'rule_rental_price', 16);
add_action('woocommerce_after_shop_loop_item_title', 'rule_rental_price', 20);
function rule_rental_price() {
    if (get_field('rental_price')) {
        echo '<span class="price">Rent for $'.get_field('rental_price').' per day</span>';
    }
}

// remove popularity from sort options
// Options: menu_order, popularity, rating, date, price, price-desc
function rule_woocommerce_catalog_orderby( $orderby ) {
    unset($orderby["popularity"]);
    return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "rule_woocommerce_catalog_orderby", 20 );

// disable woocommerce tabs
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// add description
function product_description() {
    $desc = '<h3>Product Description</h3>' . get_the_content();
    print $desc;
}
//add_action( 'woocommerce_after_single_product_summary', 'product_description', 9 );

add_filter( 'woocommerce_product_tabs', 'rule_product_tabs' );
function rule_product_tabs( $tabs ) {
    // Adds the new tab
    $tabs['feature_tab'] = array(
        'title' 	=> __( 'Features', 'woocommerce' ),
        'priority' 	=> 50,
        'callback' 	=> 'rule_feature_tab_content'
    );
    $tabs['specs_tab'] = array(
        'title' 	=> __( 'Specifications', 'woocommerce' ),
        'priority' 	=> 50,
        'callback' 	=> 'rule_specs_tab_content'
    );

    return $tabs;

}
function rule_feature_tab_content() {
    echo '<h2>Features</h2>';
    echo get_field('features');
}
function rule_specs_tab_content() {
    echo '<h2>Specifications</h2>';
    echo get_field('specifications');
}



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


// create credits post type
function create_post_type_credits() {
    register_post_type( 'credits',
        array(
            'labels' => array(
                'name' => __( 'Credits' ),
                'singular_name' => __( 'Credit' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'credits', 'with_front' => false),
            'hierarchical' => true,
            'supports' => array('title','author','custom-fields','thumbnail','editor'),
            'taxonomies' => array('category'),
            'not-found' => __('Nothing was found. what to do?')
        )
    );
}
add_action( 'init', 'create_post_type_credits' );

function display_credits_list() {
    $args = array(
        'post_type' => 'credits',
        'posts_per_page' => 999,
        'order' => 'ASC'
    );
    $pp_query = new WP_Query( $args );
    $output = '';
    if ( $pp_query->have_posts() ) {
        $output .= '<ul class="credits-list">';
        while ( $pp_query->have_posts() ) {
            $pp_query->the_post();
            //$img_thumb = get_the_post_thumbnail(get_the_ID(), 'full');
            $thumb_id = get_post_thumbnail_id();
            //$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
            $thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
            $output .= '
                <li>
                    <a href="'.$thumb_url[0].'">'.wp_get_attachment_image($thumb_id, 'medium').'</a>
                    <div class="title">'.get_the_title().'</div>
                    <div class="description">'.get_the_content().'</div>
                </li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
    }
    return $output;
}
add_shortcode( 'credits_list', 'display_credits_list' );

add_image_size('square-image', 250, 250, array('left','top'));

function display_child_pages() {
    $id = get_the_ID();
    $args = array(
        'post_type' => 'page',
        'child_of' => $id,
        'orderby' => 'menu_order'
    );
    $pages_array = get_pages($args);
    $output = '<ul class="page-list">';
    foreach ($pages_array as $post) {
        $thumb_id = get_post_thumbnail_id($post->ID);
        $thumb_url = wp_get_attachment_thumb_url( $thumb_id );
        $img_url = wp_get_attachment_image_src( $thumb_id, 'medium' );
        $output .= '
            <li style="background-image:url('.$img_url[0].');">
                <a href="'.get_the_permalink($post->ID).'">
                    <div class="list-item">
                        <div class="title">'.get_the_title($post->ID).'</div>
                    </div>
                </a>
            </li>';
    }
    $output .= '</ul>';
    //print_r($pages_array);
    return $output;
}
add_shortcode( 'page_list', 'display_child_pages' );





// show latest posts

// show latest posts
/*
$args = array(
    'post_type'=> 'post',
    'numberposts'=>10,
    'order_by'=>'date',
    'order'=> 'DESC',
    'post_status'=>'publish'
);
//$recent_posts = get_posts($args);
$wp_query = null;
$wp_query = new WP_Query($args);

get_template_part( 'loop');
*/

function show_latest_posts($atts) {
    $a = shortcode_atts( array(
        'posts' => 10,
    ), $atts );
    $args = array(
        'numberposts'=>$a['posts'],
        'order_by'=>'date',
        'order'=> 'DESC',
        'post_status'=>'publish',
        'post_type'=>'post'
    );
    $recent_posts = get_posts($args);
    $output = '<div class="blog-post-list">';
    foreach( $recent_posts as $recent ) {
        setup_postdata($recent);
        $output .= '<article>
            <header>
                <span class="posted-on">'.get_the_date('m/d/Y',$recent->ID).'</span>
            </header>
            <h2><a href="' . get_permalink($recent->ID) . '">' . $recent->post_title . '</a></h2>
            <div class="excerpt">'.get_the_excerpt().'</div>
            </article>';
    }
    wp_reset_postdata();
    $output .= '</div>';
    return $output;
}

add_shortcode( 'latest_posts', 'show_latest_posts' );

// display people list
function display_people_list($id = null) {
    $args = array(
        'post_type' => 'people',
        'posts_per_page' => 999,
        'order' => 'ASC',
        'p' => $id
    );
    $pp_query = new WP_Query( $args );
    $output = '';
    if ( $pp_query->have_posts() ) {
        $output .= '<ul class="staff-list">';
        while ( $pp_query->have_posts() ) {
            $pp_query->the_post();
            $img_thumb = get_the_post_thumbnail(get_the_ID(), 'thumbnail');
            $output .= '
                <li>
                    <div class="image">
                        '.$img_thumb.'
                    </div>
                    <div class="info">
                        <span class="name">'.get_the_title().'</span>, <span class="position">'.get_field('position').'</span>
                        <span class="extension">x '.get_field('extension').'</span>
                        <span class="email"><a href="'.get_field('email').'">'.get_field('email').'</a></span>

                    </div>
                </li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
    }
    return $output;
}

add_shortcode('people_list', 'display_people_list');


// get root parent category
$termroot = '';
function get_term_top_most_parent( $id, $taxonomy = NULL ) {
    if ($taxonomy) {
        $parent  = get_term_by( 'id', $id, $taxonomy );
        while ( $parent->parent != 0 ){
            $parent  = get_term_by( 'id', $parent->parent, $taxonomy );
        }
    }
    else {
        $terms = wp_get_post_terms( $id, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
        $parent = $terms[count($terms)-1];
    }
    return $parent;
}



// get page menu root
function get_menu_parent_id($menu_name){
    if(!isset($menu_name)){
        return "No menu name provided in arguments";
    }
    $menu_slug = $menu_name;
    $locations = get_nav_menu_locations();
    $menu_id   = $locations[$menu_slug];
    $post_id        = get_the_ID();
    $menu_items     = wp_get_nav_menu_items($menu_id);
    $parent_item_id = wp_filter_object_list($menu_items,array('object_id'=>$post_id),'and','menu_item_parent');
    $parent_item_id = array_shift( $parent_item_id );
    function checkForParent($parent_item_id,$menu_items){
        $parent_post_id = wp_filter_object_list( $menu_items, array( 'ID' => $parent_item_id ), 'and', 'object_id' );
        $parent_item_id = wp_filter_object_list($menu_items,array('ID'=>$parent_item_id),'and','menu_item_parent');
        $parent_item_id = array_shift( $parent_item_id );
        if($parent_item_id=="0"){
            $parent_post_id = array_shift($parent_post_id);
            return $parent_post_id;
        }else{
            return checkForParent($parent_item_id,$menu_items);
        }
    }
    if(!empty($parent_item_id)){
        return checkForParent($parent_item_id,$menu_items);
    }else{
        return $post_id;
    }
}


// if post then get root post term and set cat slug and title
// if category then : if root then set cat slug/title and no subtitle display; if not root then get root and set cat and title


?>
<?php
/*
Plugin Name: Admin Filter By WooCommerce Featured Products
Description: adapted from http://wordpress.stackexchange.com/q/45436/2487. Allows you to show only Featured products, which will then allow for drag and drop sorting of Featured products, orig author at http://en.bainternet.info
Version: 1.0
Author: SYP Development
*/

add_action( 'restrict_manage_posts', 'wpse45436_admin_posts_filter_restrict_manage_posts' );
/**
 * First create the dropdown
 *
 * @author Ohad Raz
 *
 * @return void
 */
function wpse45436_admin_posts_filter_restrict_manage_posts(){
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }

    //only add filter to post type you want
    if ('product' == $type){
        //change this to the list of values you want to show
        //in 'label' => 'value' format
        $values = array(
            'Only Featured' => 'Yes',
            'Only Non-Featured' => 'No',
        );
        ?>
        <select name="Featured">
            <option value=""><?php _e('Featured/Non-Featured'); ?></option>
            <?php
            $current_v = isset($_GET['Featured'])? $_GET['Featured']:'';
            foreach ($values as $label => $value) {
                printf
                (
                    '<option value="%s"%s>%s</option>',
                    $value,
                    $value == $current_v? ' selected="selected"':'',
                    $label
                );
            }
            ?>
        </select>
        <?php
    }
}

add_filter( 'parse_query', 'wpse45436_posts_filter' );
/**
 * if submitted filter by post meta
 *
 * @author Ohad Raz
 * @param  (wp_query object) $query
 *
 * @return Void
 */
function wpse45436_posts_filter( $query ){
    global $pagenow;
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ( 'product' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['Featured']) && $_GET['Featured'] != '') {
        $query->query_vars['meta_key'] = '_featured';
        $query->query_vars['meta_value'] = $_GET['Featured'];
    }
}

?>
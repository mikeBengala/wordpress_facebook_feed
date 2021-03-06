<?php
/*
Plugin Name: GFN Facebook Feed
Plugin URI: http://gfn.pt/
Description: A facebook feed plugin combined with owl carousel
Version: 1.0
Author: Miguel Bengala - GFN
Author URI: http://gfn.pt/
*/

// includes ------------------------------------------------------------------->
include plugin_dir_path( __FILE__ ) . 'inc/options_page.php';
include plugin_dir_path( __FILE__ ) . 'inc/icomoon.php';
// end includes --------------------------------------------------------------->

// enqueues ------------------------------------------------------------------->
function gfn_fb_feed_scripts() {
    // Register scripts-------------------------------------------------------->
    wp_enqueue_script( 'fb_api', "https://connect.facebook.net/pt_PT/all.js", array()  );
    wp_enqueue_script( 'owl-carousel', plugins_url( '/js/owl.carousel.js', __FILE__ ), array( 'jquery')  );
    wp_enqueue_script( 'gfn_fb_feed_script', plugins_url( '/js/script.js', __FILE__ ), array( 'jquery', 'fb_api')  );
    // End Register scripts --------------------------------------------------->

    // Send a var to my script ------------------------------------------------>
    $gfn_fb_access_token = get_option('gfn_fb_access_token');
    $gfn_fb_page_id = get_option('gfn_fb_page_id');
    $gfn_fb_page_language = get_option('gfn_fb_language');

    $gfn_fb_settings = array(
        "access_token" => $gfn_fb_access_token,
        "page_id" => $gfn_fb_page_id,
        "language" => $gfn_fb_page_language
    );

    wp_localize_script( 'gfn_fb_feed_script', 'gfn_fb_settings', $gfn_fb_settings );
    // end Send a var to my script -------------------------------------------->

    // Register styles -------------------------------------------------------->
    wp_enqueue_style( 'owl-carousel', plugins_url( '/css/owl.carousel.min.css', __FILE__ ) );
    wp_enqueue_style( 'style-gfn-fb-feed', plugins_url( '/css/gfn_facebook_feed.min.css', __FILE__ ) );
    // End Register Styles ---------------------------------------------------->
}
add_action('wp_enqueue_scripts', 'gfn_fb_feed_scripts');
// end enqueues --------------------------------------------------------------->

// Setup shortcode ------------------------------------------------------------>
function gfn_fb_feed_shortcode(){
    include plugin_dir_path( __FILE__ ) . 'inc/htstructure.php';
}
add_shortcode( 'gfn_fb_feed', 'gfn_fb_feed_shortcode' );
// End Setup shortcode -------------------------------------------------------->
 ?>

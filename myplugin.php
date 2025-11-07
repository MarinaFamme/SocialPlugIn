<?php
/*
Plugin Name: My First Plugin
Description: This is my very first custom plugin!
Version: 1.0
Author: Marina Famme
Autor URI: www.design.hyggelicious.com
*Text domain: simple-social-sharing
*/

function sss_enqueue_assets() {
    wp_enqueue_style('sss-styles', plugin_dir_url(__FILE__) . 'css/myplugin-styles.css');
    wp_enqueue_script('sss-scripts',plugin_dir_url(__FILE__). 'js/myplugin.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'sss_enqueue_assets');

// Shortcode to display the social sharing buttons
function sss_share_buttons_shortcode() {
    // Get the current post/page URL and title
    $post_url = get_permalink();
    $post_title = get_the_title();

    ob_start(); ?>
    <div class="sss-share-bar">
        <!-- Facebook Copy Button -->
        <button class="sss-button sss-facebook" data-message="Awesome way of getting closer, Check it Out: <?php echo $post_title; ?> <?php echo $post_url; ?>">Share to Facebook Audience</button>
        
        <!-- X (Twitter) Copy Button -->
        <button class="sss-button sss-x" data-message="Retweet if you agree!: <?php echo $post_title; ?> <?php echo $post_url; ?>">Share to X Audience</button>
        
        <!-- LinkedIn Copy Button -->
        <button class="sss-button sss-linkedin" data-message="Getting closer to your goals with every cup: <?php echo $post_title; ?> <?php echo $post_url; ?>">Share to LinkedIn Audience</button>
    </div>
    <?php return ob_get_clean();
}
add_shortcode('sss_share_buttons', 'sss_share_buttons_shortcode');
<?php

/*

Plugin Name: Sliding Read More

Plugin URI: http://www.bluelayermedia.com

Description: Converts the read more tag into an expandable content area.

Author: BlueLayerMedia

Author URI: http://www.bluelayermedia.com

Version: 1.0

*/
register_activation_hook(__file__, 'sliding_read_more_install');

add_action('admin_menu', 'user_delete_add_page');

add_action( 'wp_head', 'sliding_wp_head' );

function sliding_read_more_install()
{
        update_option( 'slidingreadmore_readmore', 'Read More' );
	update_option( 'slidingreadmore_readless', 'Read Less' );
}

function sliding_wp_head() {

        echo '<script type="text/javascript">var showText=\''. get_option( 'slidingreadmore_readmore' ) .'\';var hideText=\''. get_option( 'slidingreadmore_readless' ) .'\';</script>';
	echo '<script type="text/javascript" src="' . WP_PLUGIN_URL . '/sliding-read-more/jquery-1.4.2.min.js"></script>';
	echo '<script type="text/javascript" src="' . WP_PLUGIN_URL . '/sliding-read-more/jslide.js"></script>';	
}

// Add menu page
function user_delete_add_page() {
	add_options_page('Sliding Read More', 'Sliding Read More', 'administrator', 'sliding_read_more', 'sliding_read_more_page');
}

function sliding_read_more_page() {
include('adminpanel.php');
}

function sliding_replace($posts) 
{
        $count = count($posts);
	for ($i = 0; $i < $count; ++$i) {
		$posts[$i]->post_content =  str_replace('<!--more-->','<!--slideandhide-->',$posts[$i]->post_content);
	}
	return $posts;
}


function sliding_excerpt($content) 
{
	
        if(!is_single()){
        if ( strpos($content,'<!--slideandhide-->') )
	{
		$output = explode('<!--slideandhide-->', $content);
		$content = $output[0] . '<div class="toggle">' . $output[1] . '</div>';
	}
        }

        return $content;
}

add_filter('the_content','sliding_excerpt');
add_filter('the_posts', 'sliding_replace');
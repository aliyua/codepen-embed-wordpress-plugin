<?php
/*
Plugin Name: CodePen Embed
Plugin URI: http://jawittdesigns.com
Description: Easily Include CodePen Embeds on your WordPress Blog
Version: 0.1.0 Beta
Author: Jason Witt
Author URI: http://jawittdesigns.com
*/
// Plugin Directory Constant
if ( !defined( 'PLUGIN_DIR' ) ){
	define( 'PLUGIN_DIR', WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__), "" ,plugin_basename(__FILE__)));
}
// Main Shortcode Function
if (!function_exists('codepen_shortcode')) {
	function codepen_shortcode( $atts ){
		// Get attibutes and set defaults
			extract(shortcode_atts(array(
				'href' => '',
				'user' => '',
				'show' => '',
				'height' => '300'
		   ), $atts));
		// Display info 
		$codepen_shortcode = '<pre class="codepen" data-height="'.$height.'" data-type="'.$show.'" data-href="'.$href.'" data-user="'.$user.'" data-safe="true"><code></code><a href="http://codepen.io/'.$user.'/pen/'.$href.'">Check out this Pen!</a></pre>
	<script async src="http://codepen.io/assets/embed/ei.js"></script>';
		return $codepen_shortcode;
	}
	add_shortcode('codepen', 'codepen_shortcode');
} else {
	die( 'The function codepen_shortcode() already exisits!' );
}
// Register TinyMCE Custom Button
if (!function_exists('register_codepen_buttons')) {
	function register_codepen_buttons($buttons) {
		array_push($buttons, "|", "codepen_embed");
		return $buttons;
	}
} else {
	die( 'The function register_codepen_buttons() already exisits!' );
}
// Filter the tinyMCE Buttons
if (!function_exists('add_codepen_button')) {
	function add_codepen_button() {
		// Doesn't work if user doesn't have permisions
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
		if ( get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", "add_codepen_plugin");
			add_filter('mce_buttons', 'register_codepen_buttons');
		}
	}
	add_action('init', 'add_codepen_button');
} else {
	die( 'The function add_codepen_button() already exisits!' );
}
// Add the Button to the tinyMCE Bar
if (!function_exists('add_codepen_plugin')) {
	function add_codepen_plugin($plugin_array) {
		global $ce_plugin_dir;
		$plugin_array['codepen_embed'] = PLUGIN_DIR . 'tinymce/codepen-tinymce.js';
		return $plugin_array;
	}
} else {
	die( 'The function add_codepen_plugin() already exisits!' );
}
?>
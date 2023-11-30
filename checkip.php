<?php

/**
 * Plugin Name: CheckIp
 * Description: Check user ip before he send comment
 * Author URI:  evsigneev
 * Author:      evsigneev
 * Version:     1.0
 *
 * Requires at least: 2.8
 * Requires PHP: 5.6
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

add_action( 'wp_enqueue_scripts', 'checkip_add_and_fill_hidden_field' );
add_filter( 'preprocess_comment', 'checkip_check_ip_user_before_send' );

function checkip_add_and_fill_hidden_field(){
	wp_enqueue_script( 'script', plugins_url( 'checkip/script.js' ));
	$ip = $_SERVER['REMOTE_ADDR'];
	wp_add_inline_script( 'script', 'var user_ip = ' . wp_json_encode( $ip )
	, 'before' );
}

function checkip_check_ip_user_before_send( $commentdata ){
	$user_ip = sanitize_text_field( $_POST['user-ip'] );

	if( $post_ip == $user_ip )
		wp_die('The visitor\'s IP does not match the IP received on this site');

	return $commentdata;
}
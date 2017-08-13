<?php

if ( ! class_exists( 'WPNonce' ) ) {
	require_once( 'WPNonce.php' );
}

add_shortcode( 'nonce', 'WPNonce::createNonce' );


function wp_nonce_cleanup() {
	WPNonce::clearNonces();
}

add_action( 'wp_nonce_cleanup', 'wp_nonce_cleanup' );


function wp_nonce_register_garbage_collection() {
	if ( ! wp_next_scheduled( 'wp_nonce_cleanup' ) ) {
		wp_schedule_event( time(), 'daily', 'wp_nonce_cleanup' );
	}
}

add_action( 'wp', 'wp_nonce_register_garbage_collection' );

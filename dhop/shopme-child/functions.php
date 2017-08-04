<?php
/**
 * ShopMe Child Theme functions and definitions
 *
 */

if (!function_exists('shopme_child_enqueue_styles')) {

	add_action( 'wp_enqueue_scripts', 'shopme_child_enqueue_styles', 1 );

	function shopme_child_enqueue_styles() {

		if (!is_admin()) {

			$parent_style = SHOPME_PREFIX . 'style';

			wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array( SHOPME_PREFIX . 'animate', SHOPME_PREFIX . 'fontello', SHOPME_PREFIX . 'bootstrap' ) );
			wp_enqueue_style( SHOPME_PREFIX . 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );

			if (is_rtl()) {
				wp_enqueue_style( SHOPME_PREFIX . 'child-style-rtl', get_stylesheet_directory_uri() . '/rtl.css' );
			}

		}

	}

}


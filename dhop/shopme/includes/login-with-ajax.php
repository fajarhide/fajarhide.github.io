<?php
/**
 * Custom functions that deal with the integration of Login with Ajax.
 * See: https://wordpress.org/plugins/login-with-ajax/
 *
 * @package Shopme
 */

function shopme_lwa_modal() {
	//double check just to be sure
	if ( shopme_using_login_with_ajax() ) {
		$atts = array(
			'profile_link' => true,
			'template'     => 'modal',
			'registration' => true,
			'redirect'     => false,
			'remember'     => true
		);

		return LoginWithAjax::shortcode( $atts );
	}

	return '';
}

function shopme_add_lwa_modal_in_footer() {

	if ( shopme_using_login_with_ajax() && ! is_user_logged_in() ) :

		echo '<div id="shopme-lwa-modal-holder">' . shopme_lwa_modal() . '</div>'; ?>

		<script type="text/javascript">
			jQuery( document ).ready( function( $ ) {
				$(window).load(function() {
					var $the_lwa_login_modal = $('.lwa-modal').eq(0);
					$('.to-login').each(function (i, e) {
						$(e).parents('.lwa').data('modal', $the_lwa_login_modal);
					});

					var $the_lwa_register_modal = $('.lwa-modal').eq(1);
					$('.to-register').each(function (i, e) {
						$(e).parents('.lwa').data('modal', $the_lwa_register_modal);
					});
				});
			});
		</script>

	<?php endif;
}

add_action( 'wp_footer', 'shopme_add_lwa_modal_in_footer' );
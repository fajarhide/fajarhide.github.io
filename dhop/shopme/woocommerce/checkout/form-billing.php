<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/** @global WC_Checkout $checkout */
?>
<div class="woocommerce-billing-fields">

	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3 class="row-title"><?php _e( 'Billing &amp; Shipping', 'shopme' ); ?></h3>

	<?php else : ?>

		<h3 class="row-title"><?php _e( 'Billing Details', 'shopme' ); ?></h3>

	<?php endif; ?>

	<div class="theme_box">

		<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

		<div class="row">

			<?php foreach ( $checkout->get_checkout_fields( 'billing' ) as $key => $field ) : ?>
				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
			<?php endforeach; ?>

		</div>

		<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>

		<div class="row">

			<div class="col-sm-12">

				<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>

					<?php if ( $checkout->enable_guest_checkout ) : ?>

						<p class="form-row form-row-wide create-account">
							<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
								<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ) ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'shopme' ); ?></span>
							</label>
						</p>

					<?php endif; ?>

					<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

					<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

						<div class="create-account">
							<?php foreach ( $checkout->get_checkout_fields( 'account' )  as $key => $field ) : ?>
								<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
							<?php endforeach; ?>
							<div class="clear"></div>
						</div>

					<?php endif; ?>

					<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

				<?php endif; ?>

			</div>

		</div>

	</div><!--/ .theme_box-->

</div>

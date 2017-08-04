<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $order ) : ?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'shopme' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				esc_html_e( 'Please attempt your purchase again or go to your account page.', 'shopme' );
			else
				esc_html_e( 'Please attempt your purchase again.', 'shopme' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'shopme' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php esc_html_e( 'My Account', 'shopme' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

		<p class="woocommerce-message"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'shopme' ), $order ); ?></p>

		<table class="shop_table order_details">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Order:', 'shopme' ); ?></th>
					<th><?php echo $order->get_order_number(); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php esc_html_e( 'Date:', 'shopme' ); ?></td>
					<td><?php echo wc_format_datetime( $order->get_date_created() ); ?></td>
				</tr>
				<tr>
					<td><?php esc_html_e( 'Total:', 'shopme' ); ?></td>
					<td><?php echo $order->get_formatted_order_total(); ?></td>
				</tr>

				<?php if ( $order->get_payment_method_title() ) : ?>

					<tr>
						<td><?php esc_html_e( 'Payment method:', 'shopme' ); ?></td>
						<td><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></td>
					</tr>

				<?php endif; ?>

			</tbody>
		</table>

		<div class="clear"></div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
	<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'shopme' ), null ); ?></p>

<?php endif; ?>
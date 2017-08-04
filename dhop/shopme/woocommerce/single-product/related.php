<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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

$woocommerce_loop['columns'] = $columns;
global $shopme_config;

if ( $related_products ) : ?>

	<section class="section_offset">

		<div class="related-holder">

			<h3 class="row-title"><?php esc_html_e( 'Related Products', 'shopme' ); ?></h3>

			<div data-sidebar="<?php echo esc_attr($shopme_config['sidebar_position']); ?>"
				 data-columns="<?php echo $woocommerce_loop['columns'] ?>" class="owl_carousel view-grid type_1 related_products <?php echo 'shop-columns-' . $woocommerce_loop['columns'] ?>">

				<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

				<?php endforeach; ?>

				<?php woocommerce_product_loop_end(); ?>

			</div><!--/ .related_products-->

		</div>

	</section><!--/ .section_offset-->

<?php endif;

wp_reset_postdata();

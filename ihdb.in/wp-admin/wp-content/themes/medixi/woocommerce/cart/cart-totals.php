<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="row justify-content-end <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
	<div class="col-md-8 col-lg-7 col-xl-6">
		<h2 class="h4 summary-title"><?php esc_html_e( 'Cart Totals', 'medixi' ); ?></h2>
		<table cellspacing="0" class="shop_table shop_table_responsive cart_totals">
			<tbody>
				<tr>
					<td><?php esc_html_e( 'Subtotal', 'medixi' ); ?></td>
					<td data-title="<?php esc_attr_e( 'Subtotal', 'medixi' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
				</tr>

				<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
					<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<td><?php wc_cart_totals_coupon_label( $coupon ); ?></td>
						<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
					</tr>
				<?php endforeach; ?>

				<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

					<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

					<?php wc_cart_totals_shipping_html(); ?>

					<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

				<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

					<tr class="shipping">
						<td><?php esc_html_e( 'Shipping', 'medixi' ); ?></td>
						<td data-title="<?php esc_attr_e( 'Shipping', 'medixi' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
					</tr>

				<?php endif; ?>

				<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
					<tr class="fee">
						<td><?php echo esc_html( $fee->name ); ?></td>
						<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
					</tr>
				<?php endforeach; ?>

				<?php
				if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
					$taxable_address = WC()->customer->get_taxable_address();
					$estimated_text  = '';

					if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
						/* translators: %s location. */
						$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'medixi' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
					}

					if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
						foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
							?>
							<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
								<td><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
								<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
							</tr>
							<?php
						}
					} else {
						?>
						<tr class="tax-total">
							<td><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
							<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
						</tr>
						<?php
					}
				}
				?>

				<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
			</tbody>
			<tfoot>
				<tr class="order-total">
					<td><?php esc_html_e( 'Order Total', 'medixi' ); ?></td>
					<td data-title="<?php esc_attr_e( 'Total', 'medixi' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
				</tr>
			</tfoot>
			<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

		</table>
		<div class="wc-proceed-to-checkout">
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>
	</div>


	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
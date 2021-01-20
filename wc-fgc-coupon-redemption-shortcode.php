<?php
/**
 * Plugin Name: WC Coupon Redemption Form Shortcode
 * Plugin URI: https://kathyisawesome.com/
 * Description: Display coupon form with [fgc_form] shortcode
 * Version: 1.0.0
 * Author: Kathy Darling
 * Author URI: https://kathyisawesome.com
 * WC requires at least: 4.0.0
 * WC tested up to: 4.7.0
 *
 * Text Domain: wc-fgc-coupon-redemption
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Shortcode to enter gift code
 */
function fgc_gift_claim_form() {
	
	if ( function_exists( 'wc_coupons_enabled' ) && wc_coupons_enabled() ) { ?>
		<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
			<div class="actions">
				<div class="coupon">
					<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'wc-fgc-coupon-redemption' ); ?></label> 
					<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'wc-fgc-coupon-redemption' ); ?>" /> 
					<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Claim free gift', 'wc-fgc-coupon-redemption' ); ?>"><?php esc_attr_e( 'Claim Free Gift', 'wc-fgc-coupon-redemption' ); ?></button>
					<?php do_action( 'woocommerce_cart_coupon' ); ?>
				</div>
			</div>
		</form>
	
	<?php } ?>

<?php
}
add_shortcode( 'fgc_form', 'fgc_gift_claim_form' );

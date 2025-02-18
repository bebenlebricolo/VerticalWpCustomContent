<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $flatsome_opt;

 wc_print_notices();

?>

<?php do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">


<div class="row">
<div class="large-8 small-12 columns">

<?php do_action( 'woocommerce_before_cart_table' ); ?>
<div class="cart-wrapper">
<table class="shop_table cart responsive" cellspacing="0">
	<thead>
		<tr>
			<th class="product-name" colspan="3"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
			<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		
		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
	
					<td class="remove-product">
						<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-close"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
							?>
						</td>

					<td class="product-thumbnail">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', str_replace( array( 'http:', 'https:' ), '', $_product->get_image() ), $cart_item, $cart_item_key );

							if ( ! $_product->is_visible() )
								echo $thumbnail;
							else
								printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
						?>
					</td>

					<td class="product-name">
						<?php
							if ( ! $_product->is_visible() )
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							else
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );

               				// Backorder notification
               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
               					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
						?>
					</td>

					<td class="product-price">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
					</td>

					<td class="product-quantity">
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
						?>
					</td>

					<td class="product-subtotal">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>



<?php do_action('woocommerce_cart_collaterals'); ?>


</div><!-- .cart-wrapper -->
</div><!-- .large-9 -->



<div class="large-4 small-12 columns">
<div class="cart-sidebar">


	<?php woocommerce_cart_totals(); ?>

	<input type="submit" class="button expand" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" /> 
	<input type="submit" class="checkout-button secondary expand button" name="proceed" value="<?php _e( 'Proceed to Checkout', 'woocommerce' ); ?>" />

	<?php wp_nonce_field( 'woocommerce-cart' ); ?>


	<?php if ( WC()->cart->coupons_enabled() ) { ?>
	<div class="coupon">
		<h3 class="widget-title"><?php _e( 'Coupon', 'woocommerce' ); ?></h3>
		<input type="text" name="coupon_code"  id="coupon_code" value="" placeholder="<?php _e( 'Enter Coupon', 'flatsome' ); ?>"/> 
		<input type="submit" class="button small expand" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
		<?php do_action('woocommerce_cart_coupon'); ?>

	</div>
	<?php } ?>

	<?php 
  		if ( version_compare( WOOCOMMERCE_VERSION, '2.3', '<' ) ) {
			woocommerce_shipping_calculator();
		}
	?>



</div><!-- .cart-sidebar -->

</div><!-- .large-3 -->
</div><!-- .row -->

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<?php do_action( 'woocommerce_after_cart' ); ?>
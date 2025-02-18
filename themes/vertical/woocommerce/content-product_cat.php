<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop, $flatsome_opt;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Increase loop count
$woocommerce_loop['loop']++;

// set cat style
if(isset($flatsome_opt['cat_style'])){
	if($flatsome_opt['cat_style'] && !isset($style)) $style = $flatsome_opt['cat_style'];
}
if(!isset($style)) $style = "text-badge";

?>

<li class="product-category ux-box text-center ux-<?php echo $style; ?>">
<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
<div class="inner">
  <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
    <div class="ux-box-image">
         <?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
		?>
    </div><!-- .ux-box-image -->
    <div class="ux-box-text  show-first">
       	<h3 class="uppercase header-title">
       	<?php 	echo $category->name; ?>
		</h3>
		<p class="smallest-font uppercase count"><?php if ( $category->count > 0 ) echo apply_filters( 'woocommerce_subcategory_count_html', ' ' . $category->count . ' '.__('Products','woocommerce').'', $category); ?></p>
		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>
       
    </div><!-- .ux-box-text-overlay -->
  </a>
</div>
<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
</li>
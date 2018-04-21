<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<?php
 global $post; 
 global $woocommerce; 

$rev_slider = get_post_meta(woocommerce_get_page_id( 'shop' ), '_horseclub_revs', true);								
				if ($rev_slider != '' && function_exists('putRevSlider') ) : ?>
				<div class="rev_slide"><?php echo putRevSlider($rev_slider); ?></div>								
				<?php  endif; ?>  

 <div id="content" class="container">
   		<div class="row">
      <div class="main <?php echo horseclub_main_class(); ?> shop-wrap" role="main">
 
	<?php

		do_action( 'woocommerce_before_main_content' );
	?>


		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php

				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php

				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php

		do_action( 'woocommerce_after_main_content' );
	?>
</div>

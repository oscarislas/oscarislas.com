<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 ?>
 <div id="content" class="container">
   		<div class="row">
       <div class="main <?php echo horseclub_main_class(); ?> shop-wrap" role="main">
	<?php
		do_action( 'woocommerce_before_main_content' );
	?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php

		do_action( 'woocommerce_after_main_content' );
	?>


</div>
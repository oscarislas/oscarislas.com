<?php
/*
Template Name: Blog Masonry
*/
?>
<script>
jQuery(document).ready(function($) {
  // or with jQuery
var $container = $('.js-masonry');
// initialize Masonry after all images have loaded  
$container.imagesLoaded( function() {
  $container.masonry();
});
});
</script>
<?php  wp_enqueue_script('horseclub_masonry_script');?>
		<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>

<?php endwhile; ?>
    <div id="content" class="container">
   		<div class="row">

      <div class="container js-masonry"
  data-masonry-options='{ "itemSelector": ".blogmasonry" }'>
      		<?php  global $post; $blog_category = get_post_meta( $post->ID, '_horseclub_blog_cat_masonry', true ); 
      				if($blog_category == '-1' || $blog_category == '') {
      					$blog_cat_slug = '';
					} else {
					$blog_cat = get_term_by ('id',$blog_category,'category');
					$blog_cat_slug = $blog_cat -> slug;
					}

					$blog_items = get_post_meta( $post->ID, '_horseclub_blog_items_masonry', true ); 
					if($blog_items == 'all') {$blog_items = '-1';} 

					$temp = $wp_query; 
					$wp_query = null; 
					$wp_query = new WP_Query();
					$wp_query->query(array(
						'paged' => $paged,
						'category_name'=>$blog_cat_slug,
						'posts_per_page' => $blog_items));
					$count =0;
					if ( $wp_query ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php 
						
								get_template_part('templates/content', 'masonrypost');
					
                    endwhile; else: ?>
						<li class="error-found"><?php esc_html_e('Sorry, no post found.', 'horseclub'); ?></li>
					<?php endif; ?>
       </div><!-- end .container -->
				<?php if ($wp_query->max_num_pages > 1) : ?>
				<?php if(function_exists('horseclub_wp_pagenavi')) { ?>
        			<?php horseclub_wp_pagenavi(); ?>   
        		<?php } else { ?>      
			        <nav class="post-nav">
		                <ul class="pager">
		                  <li class="previous"><?php next_posts_link(esc_html__('&larr; Older posts', 'horseclub')); ?></li>
		                  <li class="next"><?php previous_posts_link(esc_html__('Newer posts &rarr;', 'horseclub')); ?></li>
		                </ul>
		              </nav>
        		<?php } ?> 
				<?php endif; ?>
				<?php $wp_query = null; $wp_query = $temp;  // Reset ?>
				<?php wp_reset_postdata()  ?>
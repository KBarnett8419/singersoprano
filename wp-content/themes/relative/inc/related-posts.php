<?php
/**
 * Related Posts for full post
 * @package Relative
*/
?>


<?php $related_posts = relative_related_posts(); 
 if ( $related_posts->have_posts() ): ?>

<h4 class="related-posts-heading"><span><?php esc_html_e('You may also like these posts:', 'relative'); ?></span></h4>

<div class="related-posts clear">
<ul class="related-posts-wrapper">
   <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

   
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
   <li class="row align-items-center no-gutters">
   
      <?php if ( has_post_thumbnail() ): ?>
         <div class="related-posts-thumbnail col-sm-1">
           
               <?php the_post_thumbnail('relative_related'); ?>
         
         </div>
		 <?php else: ?>
		    <div class="related-posts-thumbnail col-sm-1">
           
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/no-related.png" alt="<?php esc_html_e( 'related-post', 'relative');?>"/>
          
         </div>
      <?php endif; ?>

      <div class="related-posts-content col-sm-11">

         <h3 class="related-posts-title">
            <?php the_title(); ?>
         </h3>

      </div>
</li>
</a>

   
   <?php endwhile; ?>
</ul>
</div>











<hr class="related-post-footer">

<?php endif; 
 wp_reset_query(); ?>
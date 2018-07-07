<?php
/**
 * Template part for displaying the grid blog style posts with sidebar
 * @package Relative
*/
 
$blogstyle = esc_attr(get_theme_mod( 'relative_blog_style', 'blog1' ));
?>



<div class="col-lg-6">


<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php esc_url(the_permalink()); ?>">			
				<?php the_post_thumbnail( 'relative_bloggrid' ); ?>
			</a>	
		</div>
	<?php endif; ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	
    <div class="card-body">
     	<header class="card-title entry-header">
		<?php if( is_sticky()  && esc_attr(get_theme_mod( 'relative_show_post_sticky', true ) ) ) : 
		echo '<div class="sticky-post"><span class="screen-reader-text">', esc_html_e('Featured', 'relative'), '</span><i class="fa fa-star-o" aria-hidden="true"></i></div>';
		endif; ?>
		<?php	
		if ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}		
	 ?>
	</header>
		<?php			
		if ( 'post' === get_post_type() && esc_attr(get_theme_mod( 'relative_show_summary_meta', 1 ))) : ?>
		<div class="entry-meta">
			<?php relative_time_link(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>	
     	<div class="entry-content">
			<?php	the_excerpt(); ?>
		</div>
	
		<footer class="entry-footer">
	
	</footer>
	
    </div>
	</article>
  </div>
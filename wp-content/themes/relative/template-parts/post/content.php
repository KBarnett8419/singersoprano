<?php
/**
 * Template part for displaying posts
 * @package Relative
*/
 
$blogstyle = esc_attr(get_theme_mod( 'relative_blog_style', 'blog1' ));
?>

	
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php esc_url(the_permalink()); ?>">			
				<?php 
				if ( $blogstyle == 'blog1' || $blogstyle == 'blog2')  :
					the_post_thumbnail( 'relative_blogmedium' ); 
				else :
					the_post_thumbnail( 'post-thumbnails' ); 
				endif;				
				?>
			</a>				
		</div>
	<?php endif; ?>	
	<div class="entry-content-wrapper">
	<header class="entry-header">
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
		<?php
		if ( esc_attr(get_theme_mod( 'relative_use_excerpt', 1 )) ) :
			the_excerpt();
		else :
			the_content( sprintf(
				wp_kses(
				/* translators: %s: post title */
					__( 'Continue Reading...<span class="screen-reader-text"> "%s"</span>', 'relative' ),
					array(
						'span' => array(
						'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		endif;
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'relative' ),
			'after'  => '</div>',
		) );
		?>
	</div>

	<footer class="entry-footer">

	</footer>
	</div>
</article>

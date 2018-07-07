<?php
/**
 * The default template for displaying the full post
 * @package Relative
*/
?>


	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
	<header class="entry-header">	
		<?php	the_title( '<h1 class="entry-title">', '</h1>' );	?>	
		<?php if ( esc_attr(get_theme_mod( 'relative_show_single_meta', 1 )) ) : ?>
		
		<?php 
			if ( 'post' === get_post_type() ) {
			echo '<ul class="entry-meta">';
					relative_single_posted_on();				
			echo '</ul>';
			};
		?>
	
	<?php endif; ?>
	</header>
	
	<?php
		if( esc_attr(get_theme_mod( 'relative_show_single_featured_image', 1 ) ) ) :  
			echo '<div class="post-thumbnail">';		
				the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => ''));
			echo '</div>';			
		endif; 
	?>
	
	<div class="entry-content">
		<?php	the_content();?>	
	</div>
	
<?php if ( esc_attr(get_theme_mod( 'relative_show_post_footer_group', 1 )) ) : ?>		
	<div class="entry-footer">
		<?php	relative_entry_footer();	?>		
		<?php 	// single post navigation
		if ( esc_attr(get_theme_mod( 'relative_show_post_nav', 1 )) ) :
			get_template_part( 'template-parts/navigation/navigation', 'post' );
		endif;
		?>
	</div>
<?php endif; ?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'post-inset' ); ?>

</article>
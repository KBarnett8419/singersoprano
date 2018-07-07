<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Relative
 */
 
$relative_single_style = get_theme_mod( 'relative_single_style', 'single1' );
get_header(); ?>

<?php if ( $relative_single_style == 'single3')  : ?>

<div class="container">

	<div class="row">
		<div class="col-lg-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main <?php echo esc_attr($relative_single_style); ?>">
<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>
					<?php				
					while ( have_posts() ) : the_post();	
						get_template_part( 'template-parts/post/content', 'single' );		

					  if( esc_attr(get_theme_mod( 'relative_show_related_posts', true ) ) ) :
						 get_template_part( 'inc/related-posts' );
					  endif;
					  
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;						
					endwhile; // End of the loop.
					?>

				</main>
			</div>
		</div>
	</div>
</div>

<?php elseif ( $relative_single_style == 'single2')  : ?>

<div class="container">

	<div class="row">
		<div class="col-lg-8 order-lg-2">
			<div id="primary" class="content-area">
				<main id="main" class="site-main <?php echo esc_attr($relative_single_style); ?>">
<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>
					<?php				
					while ( have_posts() ) : the_post();	
						get_template_part( 'template-parts/post/content', 'single' );
			
					  if( esc_attr(get_theme_mod( 'relative_show_related_posts', true ) ) ) :
						 get_template_part( 'inc/related-posts' );
					  endif;
					  
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;						
					endwhile; // End of the loop.
					?>

				</main>
			</div>	
		</div>
		<div class="col-lg-4 order-3 order-lg-1">
			<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>
		</div>
	</div>
</div>

<?php else : ?>

<div class="container">

	<div class="row">
		<div class="col-lg-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main <?php echo esc_attr($relative_single_style); ?>">
<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>
					<?php				
					while ( have_posts() ) : the_post();	
						get_template_part( 'template-parts/post/content', 'single' );
						
					  if( esc_attr(get_theme_mod( 'relative_show_related_posts', true ) ) ) :
						 get_template_part( 'inc/related-posts' );
					  endif;
							
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;						
					endwhile; // End of the loop.
					?>

				</main>
			</div>	
		</div>
		<div class="col-lg-4">
			<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
		</div>
	</div>
</div>

<?php endif; ?>	
	
	
<?php
get_footer();
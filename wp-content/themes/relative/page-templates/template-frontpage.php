<?php
/**
 * Template Name: Front Page
 * @package Relative
*/

get_header(); 
?>

<div id="primary" class="content-area">
	<div class="container">	

	<?php if (is_front_page() && ( esc_attr(get_theme_mod( 'relative_show_iconboxes', false ) ) ) ) :
	get_template_part( 'template-parts/frontpage/iconboxes' ); 
	endif; ?>

	<div class="row">

	<div class="col-lg-6">
		<main id="main" class="site-main">	

		<div id="frontpage-section2">

		<?php
		$relative_blog_section_heading = esc_attr(get_theme_mod('relative_blog_section_heading' ));
		if($relative_blog_section_heading != ''): 
			echo '<h2 class="section-title">' . esc_attr($relative_blog_section_heading) . '</h2>';
		endif; ?>

		<?php // Display blog posts on any page @ https://m0n.co/l
		$relative_blog_post_count = esc_attr(get_theme_mod('relative_blog_post_count', '3' ));
		$temp = $wp_query; $wp_query= null;
			$wp_query = new WP_Query( array( 
			'posts_per_page' => $relative_blog_post_count, 
			'ignore_sticky_posts' => 1,
		) );

		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
		<article class="fp-hentry">

			<?php 
			if ( has_post_thumbnail() && esc_attr(get_theme_mod( 'relative_show_fp_featured_image', false ) )) :        
				echo '<div class="fp-featured-image"><a class="featured-image-link" href="' . esc_url( get_permalink() ) . '" aria-hidden="true">';
			the_post_thumbnail( 'fpblog', array( 'alt' => the_title_attribute( 'echo=0' )));
				echo '</a></div>';			
			endif; ?>
			
			<header class="fp-entry-header">
				<?php the_title( sprintf( '<h2 class="fp-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header>
			
			<div class="fp-entry-content">
				<?php
				
				$relative_blog_fp_excerpt_size = esc_attr(get_theme_mod('relative_blog_fp_excerpt_size', '22' ));
				echo '<p>'. esc_attr(relative_excerpt( $relative_blog_fp_excerpt_size )) . '</p>';
				echo '<div class="fp-read-more"><a href="' . esc_url(get_permalink()) . '">' . esc_html__( 'Read More', 'relative' ) . '</a></div>';
				?>
				
			</div>
		</article>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		</div>

		</main>
	</div>

	<div class="col-lg-6">        
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'frontpage' ); ?>    
	</div>	

	</div>

	</div>
</div>

<?php 
get_footer();
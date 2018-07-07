<?php
/**
 * Template Name: Left &amp; Right Column
 * @package Relative
*/

get_header(); ?>

<div id="primary" class="content-area">
	<div class="container">
	
		<div class="row">

		<div class="col-lg-6 order-lg-2">
		
			<main id="main" class="site-main ">	
<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>			
				<?php while ( have_posts() ) : the_post(); 
				get_template_part( 'template-parts/page/content', 'page' ); 
				if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
				endwhile; ?>			
			</main>
			
		</div>

		<div class="col-lg-3 order-3 order-lg-1">        
			<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
		</div>
		
		<div class="col-lg-3 order-12">        
			<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>       
		</div>

		</div>
	</div>
</div>
		
<?php 
get_footer();
<?php
/**
 * Template Name: Left Column
 * @package Relative
*/

get_header(); ?>

<div id="primary" class="content-area">
	<div class="container">

		<div class="row">
			<div class="col-md-9 order-md-2">
			
				<main id="main" class="site-main">	
<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>				
				<?php while ( have_posts() ) : the_post(); 
				get_template_part( 'template-parts/page/content', 'page' ); 
				if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
				endwhile; ?>
				</main>	
				
			</div>

			<div class="col-md-3 order-3 order-md-1">
				<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
			</div>

		</div>
	</div>
</div>

<?php 
get_footer();
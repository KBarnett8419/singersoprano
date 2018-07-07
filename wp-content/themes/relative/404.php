<?php
/**
 * The template for displaying 404 pages (not found)
 * @package Relative
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<main id="main" class="site-main">

					<header class="entry-header">
						<h1><?php esc_html_e('Error 404', 'relative'); ?></h1>
					</header>
				                                                	            
			        <section class="entry-content">
			        	            
			            <p><?php esc_html_e('It seems like you have tried to open a page that doesn\'t exist. It could have been deleted, moved, or it never existed at all. You are welcome to search for what you are looking for with the form below.', 'relative') ?></p>
			            
			            <?php get_search_form(); ?>
			            
			        </section> 

			</main>
		</div>
	</div>
</div>

<?php
get_footer();

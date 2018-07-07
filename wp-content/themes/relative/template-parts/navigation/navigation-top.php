<?php
/**
 * Displays top navigation
 * @package Relative
 */

?>
			
	<div class="navigation-inner section-inner">				
		<div class="toggle-container hidden">			
			<div class="nav-toggle toggle">								
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>							
				<div class="clearfix"></div>						
			</div>
			
			<div class="search-toggle toggle">								
				<div class="metal"></div>
				<div class="glass"></div>
				<div class="handle"></div>						
			</div>
			
			<div class="clearfix"></div>					
		</div> <!-- /toggle-container -->
		
		<div class="blog-search hidden">					
			<?php get_search_form(); ?>					
		</div>
	
		<ul class="blog-menu clear">					
			<?php if ( has_nav_menu( 'primary' ) ) {																			
				wp_nav_menu( array( 							
					'container' => '', 
					'items_wrap' => '%3$s',
					'theme_location' => 'primary', 
					'walker' => new relative_nav_walker															
				) ); } else {						
				wp_list_pages( array(							
					'container' => '',
					'title_li' => ''							
				));							
			} ?>
															
		 </ul>
		 
		 <ul class="mobile-menu">					
			<?php if ( has_nav_menu( 'primary' ) ) {																			
				wp_nav_menu( array( 							
					'container' => '', 
					'items_wrap' => '%3$s',
					'theme_location' => 'primary', 
					'walker' => new relative_nav_walker
												
				) ); } else {
			
				wp_list_pages( array(							
					'container' => '',
					'title_li' => ''							
				));							
			} ?>
			
		 </ul>				 
	</div> <!-- /navigation-inner -->				

	
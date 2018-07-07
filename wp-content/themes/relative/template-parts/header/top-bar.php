<?php 
/*
 * Header top bar
 * @package Relative
 */
?>


<div class="container-fluid">
	<div class="row align-items-center">
			<div class="col-lg-2">
				<div id="topbar-left">
					<?php if( esc_attr(get_theme_mod( 'relative_show_topbar_left', false ) ) ) :					
					echo esc_html( get_theme_mod( 'relative_topbar_left' ) ); 
					endif; ?> 				
				</div>
			</div>
			<div class="col-lg-8">
				<div id="topbar-center">		
					<?php if( esc_attr(get_theme_mod( 'relative_show_topbar_center', false ) ) ) :
					echo esc_html( get_theme_mod( 'relative_topbar_center' ) ); 
					endif; ?> 	
				</div>
			</div>
			<div class="col-lg-2">
				<div id="topbar-right">			
					<?php if( esc_attr(get_theme_mod( 'relative_show_topbar_right', false ) ) ) :
					 get_template_part( 'template-parts/navigation/navigation', 'social' ); 
					 endif; ?>
				</div>
			</div>			
	</div>
</div>
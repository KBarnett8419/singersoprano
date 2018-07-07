<?php
/**
 * For the Front Page Sidebar
 * @package Relative
*/

if (   ! is_active_sidebar( 'fpsidebar'  )	)
		return;
	// If we get this far, we have widgets. Let do this.
?>


		<aside id="frontpage-sidebar" class="widget-area">		             
			<?php dynamic_sidebar( 'fpsidebar' ); ?> 	
		</aside> 

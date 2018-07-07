<?php
/**
 * For the Post Inset Sidebar
 * @package Relative
*/

if (   ! is_active_sidebar( 'postinset'  )	)
		return;
	// If we get this far, we have widgets. Let do this.
?>


		<aside id="post-inset" class="widget-area">		             
			<?php dynamic_sidebar( 'postinset' ); ?> 	
		</aside> 

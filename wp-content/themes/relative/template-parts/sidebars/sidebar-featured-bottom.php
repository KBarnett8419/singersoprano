<?php
/**
 * Displays the feature bottom sidebar group
 * @package Relative
*/

if (   ! is_active_sidebar( 'featuredbottom1'  )
	&& ! is_active_sidebar( 'featuredbottom2' )
	&& ! is_active_sidebar( 'featuredbottom3'  )		
	&& ! is_active_sidebar( 'featuredbottom4'  )	
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
   
<div id="featured-bottom"> 

<?php if( esc_attr(get_theme_mod( 'relative_featured_bottom_full', false ) ) ) : ?>  
<aside class="widget-area container-fluid">
		<div class="row no-gutters">	
<?php else : ?>
<aside class="widget-area container">
		<div class="row">
<?php endif; ?>	
	
			<?php if ( is_active_sidebar( 'featuredbottom1' ) ) : ?>
				<div id="featured-bottom1" <?php relative_featured_bottom(); ?>>
					<?php dynamic_sidebar( 'featuredbottom1' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'featuredbottom2' ) ) : ?>      
				<div id="featured-bottom2" <?php relative_featured_bottom(); ?>>
					<?php dynamic_sidebar( 'featuredbottom2' ); ?>
				</div>         
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'featuredbottom3' ) ) : ?>        
				<div id="featured-bottom3" <?php relative_featured_bottom(); ?>>
					<?php dynamic_sidebar( 'featuredbottom3' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'featuredbottom4' ) ) : ?>        
				<div id="featured-bottom4" <?php relative_featured_bottom(); ?>>
					<?php dynamic_sidebar( 'featuredbottom4' ); ?>
				</div>
			<?php endif; ?>		
		</div>

</aside>         
</div>
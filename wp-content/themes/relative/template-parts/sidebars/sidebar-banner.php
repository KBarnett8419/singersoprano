<?php
/**
 * For displaying banner
 * @package Relative
*/

if ( ! is_active_sidebar( 'banner' ) ) {
	return;
}
?>
	
<?php if ( is_active_sidebar( 'banner' ) ) : ?>
<div id="banner" class="container widget-area">
	<div class="row">
		<div class="col-lg-12">
			<?php dynamic_sidebar( 'banner' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>
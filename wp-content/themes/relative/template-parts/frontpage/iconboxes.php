<?php 
/**
 * Promo boxes for the front page
 * @package Relative
*/

 
$relative_iconbox1_icon = get_theme_mod('relative_iconbox1_icon','fab fa-apple' );
$relative_iconbox2_icon = get_theme_mod('relative_iconbox2_icon','fab fa-windows' );
$relative_iconbox3_icon = get_theme_mod('relative_iconbox3_icon','fab fa-android' );

$relative_iconbox1_text = get_theme_mod('relative_iconbox1_text','#fff' );
$relative_iconbox2_text = get_theme_mod('relative_iconbox2_text','#fff' );
$relative_iconbox3_text = get_theme_mod('relative_iconbox3_text','#fff' );

$relative_iconbox_btn = get_theme_mod('relative_iconbox_btn','#000' );
$relative_iconbox_btn_label = get_theme_mod('relative_iconbox_btn_label','#fff' );

$relative_iconbox1_button_label = get_theme_mod('relative_iconbox1_button_label' );
$relative_iconbox2_button_label = get_theme_mod('relative_iconbox2_button_label' );
$relative_iconbox3_button_label = get_theme_mod('relative_iconbox3_button_label' );

?>

<div id="frontpage-section1">	 
	<div class="row">

		<div class="rp-iconbox col-md-4 col-sm-12">
		<div class="rp-iconbox-inner" style="background-color: <?php echo esc_attr(get_theme_mod( 'relative_iconbox_inner1', '#bf8237' )); ?>">
			<div class="rp-iconbox-icon"><i class="<?php echo esc_attr($relative_iconbox1_icon); ?>" style="background-color: <?php echo esc_attr(get_theme_mod( 'relative_iconbox_icon1_bgcolour', '#d69e59' )); ?>; color: <?php echo esc_attr(get_theme_mod( 'relative_iconbox_icon1_colour', '#fff' )); ?>"></i>
			</div>			
			<h3 class="rp-iconbox-title" style="color: <?php echo esc_attr($relative_iconbox1_text); ?>"><?php echo esc_html(get_theme_mod('relative_iconbox1_title' )); ?></h3>			
			<div class="rp-iconbox-intro" style="color: <?php echo esc_attr($relative_iconbox1_text); ?>"><?php echo esc_html(get_theme_mod('relative_iconbox1_intro' )); ?></div>						 
			
			<?php if($relative_iconbox1_button_label != ''): ?>
			<div class="rp-iconbox-link"><a style="background-color: <?php echo esc_attr($relative_iconbox_btn); ?>; color: <?php echo esc_attr($relative_iconbox_btn_label); ?>;" href="<?php echo esc_url(get_theme_mod('relative_iconbox1_link' )); ?>"><?php echo esc_html(get_theme_mod('relative_iconbox1_button_label' )); ?></a></div>
			<?php endif; ?>		
		</div>
		</div>
				 
		<div class="rp-iconbox col-md-4 col-sm-12">
		<div class="rp-iconbox-inner" style="background-color: <?php echo esc_attr(get_theme_mod( 'relative_iconbox_inner2', '#985652' )); ?>">
			<div class="rp-iconbox-icon"><i class="<?php echo esc_attr($relative_iconbox2_icon); ?>" style="background-color: <?php echo esc_attr(get_theme_mod( 'relative_iconbox_icon2_bgcolour', '#b57672' )); ?>; color: <?php echo esc_attr(get_theme_mod( 'relative_iconbox_icon2_colour', '#fff' )); ?>"></i>
			</div>		
			<h3 class="rp-iconbox-title" style="color: <?php echo esc_attr($relative_iconbox2_text); ?>"><?php echo esc_html(get_theme_mod('relative_iconbox2_title' )); ?></h3>			
			<div class="rp-iconbox-intro" style="color: <?php echo esc_attr($relative_iconbox2_text); ?>"><?php echo esc_html(get_theme_mod('relative_iconbox2_intro' )); ?></div>			
			<?php if($relative_iconbox2_button_label != ''): ?>
			<div class="rp-iconbox-link"><a style="background-color: <?php echo esc_attr($relative_iconbox_btn); ?>; color: <?php echo esc_attr($relative_iconbox_btn_label); ?>;" href="<?php echo esc_url(get_theme_mod('relative_iconbox2_link' )); ?>"><?php echo esc_html(get_theme_mod('relative_iconbox2_button_label' )); ?></a></div>
			<?php endif; ?>
		</div>
		</div>
				 
		<div class="rp-iconbox col-md-4 col-sm-12">
		<div class="rp-iconbox-inner" style="background-color: <?php echo esc_attr(get_theme_mod( 'relative_iconbox_inner3', '#693363' )); ?>">
			<div class="rp-iconbox-icon"><i class="<?php echo esc_attr($relative_iconbox3_icon); ?>" style="background-color: <?php echo esc_attr(get_theme_mod( 'relative_iconbox_icon3_bgcolour', '#8a5784' )); ?>; color: <?php echo esc_attr(get_theme_mod( 'relative_iconbox_icon3_colour', '#fff' )); ?>"></i>
			</div>
			<h3 class="rp-iconbox-title" style="color: <?php echo esc_attr($relative_iconbox3_text); ?>"><?php echo esc_html(get_theme_mod('relative_iconbox3_title' )); ?></h3>
			<div class="rp-iconbox-intro" style="color: <?php echo esc_attr($relative_iconbox3_text); ?>"><?php echo esc_html(get_theme_mod('relative_iconbox3_intro' )); ?></div>			
			<?php if($relative_iconbox3_button_label != ''): ?>
			<div class="rp-iconbox-link"><a style="background-color: <?php echo esc_attr($relative_iconbox_btn); ?>; color: <?php echo esc_attr($relative_iconbox_btn_label); ?>;" href="<?php echo esc_url(get_theme_mod('relative_iconbox3_link' )); ?>"><?php echo esc_html(get_theme_mod('relative_iconbox3_button_label' )); ?></a></div>
			<?php endif; ?>
		</div>
		</div>
	 
	</div>
</div>

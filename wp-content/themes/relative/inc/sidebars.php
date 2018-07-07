<?php 
/**
 * Register theme sidebars
 * @package Relative
*/
 
function relative_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog Right Sidebar', 'relative' ),
		'id' => 'blogright',
		'description' => esc_html__( 'Right sidebar for the blog', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Blog Left Sidebar', 'relative' ),
		'id' => 'blogleft',
		'description' => esc_html__( 'Left sidebar for the blog', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'relative' ),
		'id' => 'pageright',
		'description' => esc_html__( 'Right sidebar for pages', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'relative' ),
		'id' => 'pageleft',
		'description' => esc_html__( 'Left sidebar for pages', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Banner', 'relative' ),
		'id' => 'banner',
		'description' => esc_html__( 'For Images and Sliders.', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Breadcrumbs', 'relative' ),
		'id' => 'breadcrumbs',
		'description' => esc_html__( 'For adding breadcrumb navigation if using a plugin, or you can add content here.', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Featured Bottom 1', 'relative' ),
		'id' => 'featuredbottom1',
		'description' => esc_html__( 'Featured Bottom 1 position', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Featured Bottom 2', 'relative' ),
		'id' => 'featuredbottom2',
		'description' => esc_html__( 'Featured Bottom 2 position', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Featured Bottom 3', 'relative' ),
		'id' => 'featuredbottom3',
		'description' => esc_html__( 'Featured Bottom 3 position', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Featured Bottom 4', 'relative' ),
		'id' => 'featuredbottom4',
		'description' => esc_html__( 'Featured Bottom 4 position', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'relative' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'Bottom 1 position', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'relative' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'Bottom 2 position', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'relative' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'Bottom 3 position', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'relative' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'Bottom 4 position', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	if( esc_attr(get_theme_mod( 'relative_enable_fp_template', false ) ) ) :
	register_sidebar( array(
		'name' => esc_html__( 'Front Page Sidebar', 'relative' ),
		'id' => 'fpsidebar',
		'description' => esc_html__( 'This is a sidebar column for your front page template.', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	endif;	
	register_sidebar( array(
		'name' => esc_html__( 'Post Inset', 'relative' ),
		'id' => 'postinset',
		'description' => esc_html__( 'This is a sidebar position that sits below your post or page content but above comments. Perfect for small banners or a newsletter signup widget.', 'relative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	// Register recent posts widget
	register_widget( 'Relative_Recent_Posts_Widget' );
	
}
add_action( 'widgets_init', 'relative_widgets_init' );


// Count the number of widgets to enable resizable widgets in the featured bottom group.
function relative_featured_bottom() {
	$count = 0;
	if ( is_active_sidebar( 'featuredbottom1' ) )
		$count++;
	if ( is_active_sidebar( 'featuredbottom2' ) )
		$count++;
	if ( is_active_sidebar( 'featuredbottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'featuredbottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-lg-12';
			break;
		case '2':
			$class = 'col-lg-6';
			break;
		case '3':
			$class = 'col-lg-4';
			break;
		case '4':
			$class = 'col-sm-12 col-md-6 col-lg-3';
			break;
	}
	if ( $class )
		echo 'class="' . esc_attr($class) . '"';
}
// Count the number of widgets to enable resizable widgets in the bottom group.
function relative_bottom() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-sm-12 col-md-6 col-lg-3';
			break;
	}
	if ( $class )
		echo 'class="' . esc_attr($class) . '"';
}
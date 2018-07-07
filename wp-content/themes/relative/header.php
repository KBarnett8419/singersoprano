<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Relative
 */
 
$blogstyle = get_theme_mod( 'relative_blog_style', 'blog1' );

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site <?php echo esc_attr(get_theme_mod( 'relative_boxed_layout', 'boxed1600' ) ) ; ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'relative' ); ?></a>

	<?php if( esc_attr(get_theme_mod( 'relative_show_topbar', true ) ) ) :
	echo '<div id="topbar">';
		get_template_part('template-parts/header/top-bar'); 
	echo '</div>';
	endif; ?>

	<header id="masthead" class="site-header">
		<div class="container <?php echo esc_attr($blogstyle); ?>">
		
 <div class="row no-gutters align-items-center">
    <div class="col-lg-4">
					<div class="site-branding">		
					<?php
					the_custom_logo();

					if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_attr($description); ?></p>
					<?php endif;
					?>
					</div>
    </div>	
	<div class="col-lg-8">
      <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
    </div>    

  </div>			
			
			
		</div>
	</header><!-- #masthead -->

	<?php if ( is_front_page() && esc_attr(get_theme_mod( 'relative_show_slider', false ) ) ) :
	$slider = relative_featured_slider();
	
		echo '<div id="slider-section">' . esc_attr($slider) . '</div>';
	 endif; ?>
	 
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'banner' );	?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'featured-top' ); ?>
	
	<div id="content" class="site-content">

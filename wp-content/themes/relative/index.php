<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Relative
 */

 $blogstyle = get_theme_mod( 'relative_blog_style', 'blog1' );
 
get_header(); ?>



<?php // blog grid layout with right sidebar
if ( $blogstyle == 'blog6')  : ?>
<div id="primary" class="container content-area <?php echo esc_attr($blogstyle); ?>">



<div class="row">
	<div class="col-lg-8">
	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'blog-banner' ); ?>

		<main id="main" class="site-main">
<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>
		<?php if ( is_home() || is_front_page() ) : ?>	
			<header id="page-header" class="screen-reader-text">
				<h2 class="page-title"><?php esc_html_e( 'Posts', 'relative' ); ?></h2>
			</header>
		<?php else : ?>
				<header id="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="description lead">', '</div>' );
				?>
			</header>	
		<?php endif; ?>
		
		<div class="row row-eq-height">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', 'grid-sidebar' );
				endwhile;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>
			</div>
			<?php get_template_part( 'template-parts/navigation/navigation', 'blog' ); ?>
		</main>
	</div>

	<div class="col-lg-4">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
	</div>	
	
</div></div>

<?php // blog grid layout with left sidebar
elseif ( $blogstyle == 'blog5')  : ?>
<div id="primary" class="container content-area <?php echo esc_attr($blogstyle); ?>">

<div class="row">
	<div class="col-lg-8 order-lg-2">
	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'blog-banner' ); ?>

		<main id="main" class="site-main">	
<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>		
		<?php if ( is_home() || is_front_page() ) : ?>	
			<header id="page-header" class="screen-reader-text">
				<h2 class="page-title"><?php esc_html_e( 'Posts', 'relative' ); ?></h2>
			</header>
		<?php else : ?>
				<header id="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="description lead">', '</div>' );
				?>
			</header>	
		<?php endif; ?>
		
		<div class="row row-eq-height">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', 'grid-sidebar' );
				endwhile;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>
			</div>
			<?php get_template_part( 'template-parts/navigation/navigation', 'blog' ); ?>
		</main>
	</div>

	<div class="col-lg-4 order-3 order-lg-1">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
	</div>	
	
</div></div>

<?php // blog grid layout
elseif ( $blogstyle == 'blog4')  : ?>
<div id="primary" class="container content-area <?php echo esc_attr($blogstyle); ?>">

<div class="row">
	<div class="col-lg-12">	

	<?php get_template_part( 'template-parts/sidebars/sidebar', 'blog-banner' ); ?>
	


		<main id="main" class="site-main">
<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>		
		<?php if ( is_home() || is_front_page() ) : ?>	
			<header id="page-header" class="screen-reader-text">
				<h2 class="page-title"><?php esc_html_e( 'Posts', 'relative' ); ?></h2>
			</header>
		<?php else : ?>
				<header id="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="description lead">', '</div>' );
				?>
			</header>	
		<?php endif; ?>		
		
		<div class="row row-eq-height">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', 'grid' );
				endwhile;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>
		
		</div>
		<?php get_template_part( 'template-parts/navigation/navigation', 'blog' ); ?>
		</main>
	
		</div>
		
	</div>
</div>

<?php // standard blog left sidebar
elseif ( $blogstyle == 'blog2')  : ?>	
	
<div id="primary" class="container content-area <?php echo esc_attr($blogstyle); ?>">

<div class="row">
	<div class="col-lg-8 order-lg-2">
	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'blog-banner' ); ?>

		<main id="main" class="site-main">
<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>
		<?php if ( is_home() || is_front_page() ) : ?>	
			<header id="page-header" class="screen-reader-text">
				<h2 class="page-title"><?php esc_html_e( 'Posts', 'relative' ); ?></h2>
			</header>
		<?php else : ?>
				<header id="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="description lead">', '</div>' );
				?>
			</header>	
		<?php endif; ?>
		
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', get_post_format() );
				endwhile;
					get_template_part( 'template-parts/navigation/navigation', 'blog' );
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>
		</main>
	</div>

	<div class="col-lg-4 order-3 order-lg-1">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
	</div>	
	
</div></div>	
		
<?php // standard blog right sidebar
else : ?>

<div id="primary" class="container content-area <?php echo esc_attr($blogstyle); ?>">

<div class="row">
	<div class="col-lg-8">

	<?php get_template_part( 'template-parts/sidebars/sidebar', 'blog-banner' ); ?>

		<main id="main" class="site-main">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>	
		<?php if ( is_home() || is_front_page() ) : ?>	
			<header id="page-header" class="screen-reader-text">
				<h2 class="page-title"><?php esc_html_e( 'Posts', 'relative' ); ?></h2>
			</header>
		<?php else : ?>
				<header id="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="description lead">', '</div>' );
				?>
			</header>	
		<?php endif; ?>

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', get_post_format() );
				endwhile;
					get_template_part( 'template-parts/navigation/navigation', 'blog' );
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>
		</main>
	</div>

	<div class="col-lg-4">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
	</div>
	
</div>
</div>
	
<?php endif; ?>	


<?php
get_footer();

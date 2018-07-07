<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Relative
 */

?>

	</div><!-- #content -->

	<?php get_template_part( 'template-parts/sidebars/sidebar', 'featured-bottom' ); ?>
	
	<div id="bottom">   	
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'bottom' ); ?>
	</div>
	
	<footer id="site-footer">
		<div class="container site-info">
		<div class="row align-items-center">
		<div class="col-md-6 footer-left">
		<?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>	
		
		<?php esc_html_e('Copyright &copy;', 'relative'); ?> 
		<?php echo date_i18n( esc_html__( 'Y', 'relative' ) );  // WPCS: XSS OK ?>
		<span id="copyright"><?php echo esc_html(get_theme_mod( 'relative_copyright' )); ?></span>. <?php esc_html_e('All rights reserved.', 'relative'); ?></div>
			<div class="col-md-6 footer-right">
			<?php get_template_part( 'template-parts/navigation/navigation', 'social' ); ?>
			</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
	<div id="back-to-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

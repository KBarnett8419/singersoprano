<?php
/**
 * Template part for displaying a message that posts cannot be found
 * @package Relative
*/

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'relative' ); ?></h1>
	</header>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( 
			/* translators: %s: add post link */
			wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'relative' ), esc_url( admin_url( 'post-new.php' ) ) ) ); ?></p>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'relative' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
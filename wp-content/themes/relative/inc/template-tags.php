<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Relative
 */

 /**
 * Gets a nicely formatted string for the published date.
 */
	if ( ! function_exists( 'relative_time_link' ) ) :
	function relative_time_link() {
		$bloglayout = esc_attr(get_theme_mod( 'relative_blog_layout', 'blog1' ));
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		
		$posted_on = sprintf(
			/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'relative' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );

		// Output the posted date
		echo '<li class="posted-on">' . $posted_on . '</li>'; // WPCS: XSS OK.	
		
		// Add the comments link to the post meta info
		if ( is_home() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'relative' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</li>';
		}
		
	}
endif;
 

/**
 * Prints HTML with meta information for the current post-date/time.
 */
	if ( ! function_exists( 'relative_posted_on' ) ) :
	function relative_posted_on() {
		$bloglayout = esc_attr(get_theme_mod( 'relative_blog_layout', 'blog1' ));
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<li class="entry-date"><time class="published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">' . __( '<span class="update-label">Updated</span>', 'relative') . ' %4$s</time></li>';
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
	
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'relative' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'	);
			echo '<li class="byline"> ' . $byline . '</li>'; // WPCS: XSS OK.
		
		$posted_on = sprintf(
			/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'relative' ),
		$time_string );

		// Output the posted date
		echo '<li class="posted-on">' . $posted_on . '</li>'; // WPCS: XSS OK.	

		
		// Add the comments link to the post meta info
		if ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'relative' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</li>';
		}
		
		// Add the edit link to the post meta info
		if ( esc_attr(get_theme_mod( 'relative_show_edit_link', false ) ) ) :
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'relative' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<li class="edit-link">',
			'</li>'
		);	
			endif;	
	}
endif;


/**
 * Prints HTML with meta information for the current post-date/time.
 */
	if ( ! function_exists( 'relative_single_posted_on' ) ) :
	function relative_single_posted_on() {
		$bloglayout = esc_attr(get_theme_mod( 'relative_blog_layout', 'blog1' ));
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
	
		$byline = sprintf(
			
			get_avatar( get_the_author_meta('ID'), 40) .
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'relative' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'	);
			echo '<li class="byline"> ' . $byline . '</li>'; // WPCS: XSS OK.

			
		$posted_on = sprintf(
			/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'relative' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );
	
		// Output the posted date
		echo '<li class="posted-on">' . $posted_on . '</li>'; // WPCS: XSS OK.	
		
		// Add the comments link to the post meta info
		if ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'relative' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</li>';
		}
		
		// Add the edit link to the post meta info
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'relative' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<li class="edit-link">',
			'</li>'
		);		
	}
endif;


// Gets a nicely formatted string for the published date.
 if ( ! function_exists( 'relative_time_link' ) ) :
function relative_time_link() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	return sprintf(
		/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'relative' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
}
endif;



if ( ! function_exists( 'relative_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function relative_entry_footer() {

	// Add categories to the post meta info
		$categories_list = get_the_category_list( esc_html__( ', ', 'relative' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<div class="cat-links">' . esc_html__( 'Categories - %1$s', 'relative' ) . '</div>', $categories_list ); // WPCS: XSS OK.
		}		
	
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'relative' ) );
			if ( $tags_list && esc_attr(get_theme_mod( 'relative_show_post_tags', true ))) {
				/* translators: 1: list of tags. */
				printf( '<div class="tags-links">' . esc_html__( 'Tagged - %1$s', 'relative' ) . '</div>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'relative' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
endif;

/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
if ( ! function_exists( 'relative_edit_link' ) ) :
function relative_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'relative' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


if ( ! function_exists( 'relative_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function relative_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
		?>
	</a>

	<?php endif; // End is_singular().
}
endif;
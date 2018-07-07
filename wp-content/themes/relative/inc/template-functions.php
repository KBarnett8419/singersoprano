<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 * @package Relative
 */


 // Menu walker adding "has-children" class to menu li's with children menu items
class relative_nav_walker extends Walker_Nav_Menu {
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( !empty( $children_elements[ $element->$id_field ] ) ) {
            $element->classes[] = 'has-children';
        }
        Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}
 
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function relative_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'relative_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function relative_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'relative_pingback_header' );


//	Move the Continue Reading link outside of the post summary paragraph	
	add_filter( 'the_content_more_link', 'relative_move_more_link' );
	function relative_move_more_link() {
	return '<p class="more-link-wrapper"><a class="more-link" href="'. esc_url(get_permalink()) . '">' . esc_html__( 'Continue reading', 'relative' ) . '</a></p>';
	}	
	
// Custom excerpt size
function relative_custom_excerpt_length( $length ) { 
	$relative_excerpt_size = esc_attr(get_theme_mod( 'relative_excerpt_size', '55' ));
	if ( is_admin() ) :
		return 55;		
	else: 	
		return $relative_excerpt_size;
	endif;
	}
add_filter( 'excerpt_length', 'relative_custom_excerpt_length', 999 );	
	

//	Add ... when using excerpts
	function relative_excerpt_more($more) {
		return '&hellip;';
	}
	add_filter('excerpt_more', 'relative_excerpt_more', 21 );

// Add a read more to excerpts
	
	function relative_excerpt_more_link( $readmore_excerpt ) {
		$post = get_post();
		$readmore_excerpt .= '<p class="more-link-wrapper"><a class="more-link" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__( 'Continue reading', 'relative' ) . '</a></p>';
		return $readmore_excerpt;
		}
	add_filter( 'the_excerpt', 'relative_excerpt_more_link', 21 );	


	
// Display the related posts
if ( ! function_exists( 'relative_related_posts' ) ) {

   function relative_related_posts() {
      wp_reset_postdata();
      global $post;

      // Define shared post arguments
      $args = array(
         'no_found_rows'            => true,
         'update_post_meta_cache'   => false,
         'update_post_term_cache'   => false,
         'ignore_sticky_posts'      => 1,
         'orderby'               => 'rand',
         'post__not_in'          => array($post->ID),
         'posts_per_page'        => 3
      );
      // Related by categories
      if ( get_theme_mod('relative_related_posts', 'categories') == 'categories' ) {

         $cats = get_post_meta($post->ID, 'related-posts', true);

         if ( !$cats ) {
            $cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));
            $args['category__in'] = $cats;
         } else {
            $args['cat'] = $cats;
         }
      }
      // Related by tags
      if ( get_theme_mod('relative_related_posts', 'categories') == 'tags' ) {

         $tags = get_post_meta($post->ID, 'related-posts', true);

         if ( !$tags ) {
            $tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
            $args['tag__in'] = $tags;
         } else {
            $args['tag_slug__in'] = explode(',', $tags);
         }
         if ( !$tags ) { $break = true; }
      }

      $query = !isset($break)?new WP_Query($args):new WP_Query;
      return $query;
   }

}


/**
 * REQUIRED for the featured post slider.
 * Featured image slider, displayed on front page for static page and blog. Recommend that you create a
 * featured category where you can create only featured posts to display in your slides.
 *
 * Function excerpt = custom excerpt length for our slides
 * Function featured slider = Second is our structure for building our slides.
 */

function relative_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }
      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
      return $excerpt;
} 


// Build the slides  
 if ( ! function_exists( 'relative_featured_slider' ) ) :
	function relative_featured_slider() {
		if ( ( is_home() || is_front_page() ) && get_theme_mod( 'relative_show_slider' ) == 1 ) {

			wp_enqueue_style( 'flexslider-css' );
			wp_enqueue_script( 'flexslider-js' );

			echo '<div class="container"><div class="row"><div class="col-lg-12"><div class="flexslider">';
			echo '<ul class="slides">';

			$slidecat = get_theme_mod( 'relative_featured_cat' );
			$slidelimit = get_theme_mod( 'relative_featured_limit', -1 );
			$slider_args = array(
				'cat' => $slidecat,
				'posts_per_page' => $slidelimit,
				'meta_query' => array(
					array(
						'key' => '_thumbnail_id',
						'compare' => 'EXISTS',
					),
				),
			);
			$query = new WP_Query( $slider_args );
			if ( $query->have_posts() ) :

				while ( $query->have_posts() ) : $query->the_post();
					if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) :
						echo '<li>';
						// Using Jetpack
						if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'photon' ) ) {
							$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'relative_slider' );
							$args = array(
								'resize' => '1100,550',
							);
							$photon_url = jetpack_photon_url( $feat_image_url[0], $args );
							echo '<img src="' . esc_attr($photon_url) . '">';
						} else {
							  echo get_the_post_thumbnail( get_the_ID(), 'relative_slider' );
						}
								echo '<div class="flex-caption">';
							 // echo get_the_category_list();
						if ( get_the_title() != '' ) { echo '<a href="' . esc_url(get_permalink()) . '"><h2 class="entry-title">' . get_the_title() . '</h2></a>';
						}
						$slide_excerpt = relative_excerpt(15);
						echo '<div  class="slide-excerpt">' . esc_attr($slide_excerpt) . '</div>';
								echo '</div>';
								echo '<a href="' . esc_url(get_permalink()) . '"><div class="slide-overlay"></div></a></li>';
						endif;
					endwhile;
				wp_reset_postdata();
			endif;
			echo '</ul>';
			echo ' </div></div></div></div>';
		}
	}
endif;
<?php
/**
 * Template part for displaying post navigation - next and previous posts
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Relative
*/

the_post_navigation( array(
	'next_text' => '<div class="meta-nav" aria-hidden="true">' . esc_html__( 'Next Post', 'relative' ) . '</div> ' .
		'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'relative' ) . '</span> ' .
		'<span class="post-title">%title</span>',
	'prev_text' => '<div class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous Post', 'relative' ) . '</div> ' .
		'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'relative' ) . '</span> ' .
		'<span class="post-title">%title</span>',
) );	
				
				
?>
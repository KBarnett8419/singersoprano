<?php
/**
 * Add inline styles to the head area
 * @package Relative
*/
 
 // Dynamic styles
function relative_inline_styles($custom) {
	
// BEGIN CUSTOM CSS	

// content
	$relative_topbar = get_theme_mod( 'relative_topbar', '#c28039' );
	$relative_body_text = get_theme_mod( 'relative_body_text', '#686868' );
	$relative_header_bg = get_theme_mod( 'relative_header_bg', '#fff' );
	$relative_sitetitle = get_theme_mod( 'relative_sitetitle', '#000' );
	$relative_sitetagline = get_theme_mod( 'relative_sitetagline', '#6d6d6d' );
	$relative_footer_bg = get_theme_mod( 'relative_footer_bg', '#000' );
	$relative_link_colour = get_theme_mod( 'relative_link_colour', '#c28039' );
	$relative_headings = get_theme_mod( 'relative_headings', '#000' );	
	$relative_related_bg = get_theme_mod( 'relative_related_bg', '#f8f8f8' );
	$relative_related_border = get_theme_mod( 'relative_related_border', '#ebebeb' );
	$relative_related_post_title = get_theme_mod( 'relative_related_post_title', '#656565' );
	$relative_post_nav_bg = get_theme_mod( 'relative_post_nav_bg', '#f8f8f8' );
	$relative_post_nav_text = get_theme_mod( 'relative_post_nav_text', '#686868' );
	$relative_image_viewer_bg = get_theme_mod( 'relative_image_viewer_bg', '#000' );
	$relative_featured_label = get_theme_mod( 'relative_featured_label', '#c28039' );
	$relative_text_selection_bg = get_theme_mod( 'relative_text_selection_bg', '#222' );
	$relative_text_selection_text = get_theme_mod( 'relative_text_selection_text', '#fff' );	
	$relative_content_column_lines = get_theme_mod( 'relative_content_column_lines', '#e0e0e0' );	
	$custom .= "#topbar {background-color:" . esc_attr($relative_topbar) . "}
	body {color:" . esc_attr($relative_body_text) . "}
	#masthead {background-color:" . esc_attr($relative_header_bg) . "}
	.site-title a, .site-title a:visited {color:" . esc_attr($relative_sitetitle) . ";}
	.site-description {color:" . esc_attr($relative_sitetagline) . ";}	
	a, a:visited {color:" . esc_attr($relative_link_colour) . "}
	h1,h2,h3,h4,h5,h6,.entry-title a,.entry-title a:visited {color:" . esc_attr($relative_headings) . ";}
	.related-posts-wrapper li {background-color:" . esc_attr($relative_related_bg) . "; border-color:" . esc_attr($relative_related_border) . "; }
	.related-posts-title {color:" . esc_attr($relative_related_post_title) . ";}
	.post-navigation {background-color:" . esc_attr($relative_post_nav_bg) . "; }
	.nav-links a, .nav-links a:visited {color:" . esc_attr($relative_post_nav_text) . "; }
	#site-footer {background-color:" . esc_attr($relative_footer_bg) . "; }
	#attachment-wrapper {background-color:" . esc_attr($relative_image_viewer_bg) . "; }
	::selection {background-color:" . esc_attr($relative_text_selection_bg) . "; color:" . esc_attr($relative_text_selection_text) . ";}
	.site-main, #left-sidebar, #right-sidebar {border-color:" . esc_attr($relative_content_column_lines) . "; }
	.sticky-post, .entry-meta a:hover,.entry-meta a:focus,.single-entry-meta a:hover,.single-entry-meta a:focus,.entry-format a, .entry-format a:visited {color:" . esc_attr($relative_featured_label) . "; } 
	"."\n";

// sidebars
	$relative_widget_title = get_theme_mod( 'relative_widget_title', '#000' );
	$relative_widget_title_line = get_theme_mod( 'relative_widget_title_line', '#e4aa6c' );
	$relative_bottom_widget_title_line = get_theme_mod( 'relative_bottom_widget_title_line', '#debe97' );
	$relative_bottom_bg = get_theme_mod( 'relative_bottom_bg', '#c28039' );
	$relative_bottom_sidebar_text = get_theme_mod( 'relative_bottom_sidebar_text', '#f9f4ee' );
	$custom .= ".widget-title {color:" . esc_attr($relative_widget_title) . "}	
	#bottom {background-color:" . esc_attr($relative_bottom_bg) . ";}
	#bottom, #bottom a, #bottom a:visited, #bottom .widget-title {color:" . esc_attr($relative_bottom_sidebar_text) . "}
	.widget-title::after {background-color:" . esc_attr($relative_widget_title_line) . ";}
	#bottom .widget-title::after {background-color:" . esc_attr($relative_bottom_widget_title_line) . ";}
	"."\n";	
	
// navigation
	$relative_breadcrumbs_text = get_theme_mod( 'relative_breadcrumbs_text', '#656565' );
	$relative_mobile_toggle_bg = get_theme_mod( 'relative_mobile_toggle_bg', '#000' );
	$relative_mobile_item = get_theme_mod( 'relative_mobile_item', '#000' );
	$relative_mobile_item_hover_bg = get_theme_mod( 'relative_mobile_item_hover_bg', '#c28039' );
	$relative_mobile_toggle_elements = get_theme_mod( 'relative_mobile_toggle_elements', '#c1c1c1' );
	$relative_menu_item = get_theme_mod( 'relative_menu_item', '#3a3a3a' );
	$relative_menu_active_item = get_theme_mod( 'relative_menu_active_item', '#e4aa6c' );		
	$relative_menu_submenu_bg = get_theme_mod( 'relative_menu_submenu_bg', '#c28039' );	
	$relative_menu_submenu_text = get_theme_mod( 'relative_menu_submenu_text', '#fff' );	
	$relative_social_text = get_theme_mod( 'relative_social_text', '#848484' );
	$relative_footer_text = get_theme_mod( 'relative_footer_text', '#c1c1c1' );	
	$relative_paging_hbg = get_theme_mod( 'relative_paging_hbg', '#c28039' );
	$relative_paging_htext = get_theme_mod( 'relative_paging_htext', '#fff' );	
	$custom .= "#breadcrumbs .widget, #breadcrumbs .widget a { color:" . esc_attr($relative_breadcrumbs_text) . ";}
	.mobile-menu a { color:" . esc_attr($relative_mobile_item) . ";}	
	.toggle-container, .search-toggle .glass {background-color:" . esc_attr($relative_mobile_toggle_bg) . ";}	
	.mobile-menu .home.current-menu-item a:hover,	.mobile-menu a:hover,.mobile-menu a:focus,.mobile-menu .current-menu-item a {background-color:" . esc_attr($relative_mobile_item_hover_bg) . ";}
	.nav-toggle .bar, .search-toggle .handle, .search-toggle .metal {background-color:" . esc_attr($relative_mobile_toggle_elements) . ";}
	.blog-menu a,.blog-menu a:visited  {color:" . esc_attr($relative_menu_item) . ";}	
	.blog-menu a:hover, .blog-menu a:focus, .blog-menu .current-menu-item > a, .blog-menu .current-menu-ancestor > a {border-color:" . esc_attr($relative_menu_active_item) . ";}
	ul.blog-menu .sub-menu {background-color:" . esc_attr($relative_menu_submenu_bg) . ";}
	.blog-menu .sub-menu a {color:" . esc_attr($relative_menu_submenu_text) . "}	
	.social-menu a, .social-menu a:visited {color:" . esc_attr($relative_social_text) . "}
	#site-footer, #site-footer a,#site-footer a:visited {color:" . esc_attr($relative_footer_text) . "}
	.woocommerce-pagination .page-numbers a:hover,.nav-links .page-numbers:hover,.woocommerce-pagination .page-numbers li span.current,.nav-links .page-numbers.current {background-color:" . esc_attr($relative_paging_hbg) . "; color:" . esc_attr($relative_paging_htext) . "}
	"."\n";


// forms
	$relative_button_bg = get_theme_mod( 'relative_button_bg', '#000' );
	$relative_button_hbg = get_theme_mod( 'relative_button_hbg', '#c28039' );
	$relative_button_text = get_theme_mod( 'relative_button_text', '#fff' );
	$custom .= ".btn, button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"] {background-color:" . esc_attr($relative_button_bg) . "; color:" . esc_attr($relative_button_text) . "}
	.btn:hover, button:hover, input[type=\"button\"]:hover, input[type=\"reset\"]:hover, input[type=\"submit\"]:hover {background-color:" . esc_attr($relative_button_hbg) . "; color:" . esc_attr($relative_button_text) . "}	"."\n";

// slider
	$relative_slider_btn = get_theme_mod( 'relative_slider_btn', '#c28039' );
	$relative_slider_btn_text = get_theme_mod( 'relative_slider_btn_text', '#fff' );
	$relative_slider_hbtn = get_theme_mod( 'relative_slider_hbtn', '#000' );
	$custom .= ".flex-caption .read-more a {background-color:" . esc_attr($relative_slider_btn) . "; color:" . esc_attr($relative_slider_btn_text) . "}
	.flex-caption .read-more a:hover {background-color:" . esc_attr($relative_slider_hbtn) . "; color:" . esc_attr($relative_slider_btn_text) . "}
	"."\n";	

// front page	
	$relative_iconbox_btn = get_theme_mod( 'relative_iconbox_btn', '#c28039' );
	$relative_iconbox_btn_label = get_theme_mod( 'relative_iconbox_btn_label', '#fff' );
	$relative_fp_readmore_bg = get_theme_mod( 'relative_fp_readmore_bg', '#c28039' );
	$relative_fp_readmore_label = get_theme_mod( 'relative_fp_readmore_label', '#fff' );
	$relative_fp_readmore_hover = get_theme_mod( 'relative_fp_readmore_hover', '#c28039' );
	$custom .= ".fp-read-more a, .fp-read-more a:visited {background-color:" . esc_attr($relative_fp_readmore_bg) . "; color:" . esc_attr($relative_fp_readmore_label) . "}
	.rp-iconbox-link a, .rp-iconbox-link a:visited {background-color:" . esc_attr($relative_iconbox_btn) . "; color:" . esc_attr($relative_iconbox_btn_label) . "}
	.fp-read-more a:hover {background-color:" . esc_attr($relative_fp_readmore_hover) . "; }
	"."\n";	
	
// dropcap		
	if( esc_attr(get_theme_mod( 'relative_show_dropcap', false ) ) ) :
		$relative_dropcap_colour = get_theme_mod( 'relative_dropcap_colour', '#333' );		
		$custom .= ".single-post .entry-content > p:first-of-type::first-letter {
		font-weight: 700;
		font-style: normal;
		font-family: \"Times New Roman\", Times, serif;
		font-size: 5.25rem;
		font-weight: normal;
		line-height: 0.8;
		float: left;
		margin: 4px 0 0;
		padding-right: 8px;
		text-transform: uppercase;
		}
		.single-post .entry-content h2 ~ p:first-of-type::first-letter {
			font-size: initial;	
			font-weight: initial;	
			line-height: initial; 
			float: initial;	
			margin-bottom: initial;	
			padding-right: initial;	
			text-transform: initial;
		}	
		.single-post .entry-content > p:first-of-type::first-letter {color:" . esc_attr($relative_dropcap_colour) . "}"."\n";
	endif;

// gradient		
	if( esc_attr(get_theme_mod( 'relative_show_gradient', true ) ) ) :	
	$custom .= "#topbar,#bottom {
		background: #bf8237;
		background: -moz-linear-gradient(left, #bf8237 0%, #70276c 100%);
		background: -webkit-linear-gradient(left, #bf8237 0%,#70276c 100%);
		background: linear-gradient(to right, #bf8237 0%,#70276c 100%); 
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bf8237', endColorstr='#70276c',GradientType=1 );	}"."\n";		
	endif;

 if ( is_active_sidebar('bottom1') ) : 
	$custom .= "#bottom {padding-bottom: 2rem;}
	@media (min-width: 992px) {#bottom {padding-bottom: 0;}}"."\n";
 endif;
	
// END CUSTOM CSS

//Output all the styles
	wp_add_inline_style( 'relative-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'relative_inline_styles' );	
<?php
/**
 * Theme Info Page
 * Special thanks to the Consulting theme by ThinkUpThemes for this info page to be used as a foundation.
 * @package Relative
 */
 
function relative_info() {    


	// About page instance
	// Get theme data
	$theme_data     = wp_get_theme();

	// Get name of parent theme

		$theme_name    = trim( ucwords( str_replace( ' (Lite)', '', $theme_data->get( 'Name' ) ) ) );
		$theme_slug    = trim( strtolower( str_replace( ' (Lite)', '-lite', $theme_data->get( 'Name' ) ) ) );
		$theme_version = $theme_data->get( 'Version' );

	$config = array(
		// translators: %1$s: menu title under appearance
		'menu_name'             => sprintf( esc_html__( 'About %1$s', 'relative' ), ucfirst( $theme_name ) ),
		// translators: %1$s: page name 
		'page_name'             => sprintf( esc_html__( 'About %1$s', 'relative' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome title 
		'welcome_title'         => sprintf( esc_html__( 'Welcome to %1$s - v', 'relative' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome content 
		'welcome_content'       => sprintf( esc_html__(  '%1$s is a vibrant and dynamic theme designed for unique and creative bloggers wanting a little modern style thrown in. With a choice of several blog layouts, 16 dynamic width sidebars, a post slider to showcase your featured posts of choice, unlimited colours if you want to really dig deep into personalization, our popular recent posts widget with thumbnails, and so much more! Relative provides all you need to quickly and easily create a stunning blog that you and your readers will love..', 'relative' ), ucfirst( $theme_name ) ),
		
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'tabs'                 => array(
			'getting_started'  => esc_html__( 'Getting Started', 'relative' ),
			'support_content'  => esc_html__( 'Support', 'relative' ),
			'theme_review'  => esc_html__( 'Reviews', 'relative' ),
			'changelog'           => esc_html__( 'Changelog', 'relative' ),
			'free_pro'         => esc_html__( 'Free VS PRO', 'relative' ),
		),
		// Getting started tab
		'getting_started' => array(
			'first' => array (
				'title'               => esc_html__( 'Setup Documentation', 'relative' ),
				'text'                => sprintf( esc_html__( 'To help you get started with the initial setup of this theme and to learn about the various features, you can check out detailed setup documentation.', 'relative' ) ),
				// translators: %1$s: theme name 
				'button_label'        => sprintf( esc_html__( 'View %1$s Tutorials', 'relative' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//www.bloggingthemestyles.com/setup-relative' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			'second' => array(
				'title'               => esc_html__( 'Go to Customizer', 'relative' ),
				'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'relative' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'relative' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			
			'third' => array(
				'title'               => esc_html__( 'Using a Child Theme', 'relative' ),
				'text'                => sprintf( esc_html__( 'If you plan to customize this theme, I recommend looking into using a child theme. To learn more about child themes and why it\'s important to use one, check out the WordPress documentation.', 'relative' ) ),
				'button_label'        => sprintf( esc_html__( 'Child Themes', 'relative' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//developer.wordpress.org/themes/advanced-topics/child-themes/' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),		
		),

		// Changelog content tab.
		'changelog'      => array(
			'first' => array (				
				'title'        => esc_html__( 'Changelog', 'relative' ),
				'text'         => esc_html__( 'I generally recommend you always read the CHANGELOG before updating so that you can see what was fixed, changed, deleted, or added to the theme.', 'relative' ),	
				'button_label' => '',
				'button_link'  => '',
				'is_button'    => false,
				'is_new_tab'   => false,				
				),
		),			
		// Support content tab.
		'support_content'      => array(
			'first' => array (
				'title'        => esc_html__( 'Free Support', 'relative' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'If you experience any problems, please post your questions to support and we will be more than happy to help you out.', 'relative' ),
				'button_label' => esc_html__( 'Get Free Support', 'relative' ),
				'button_link'  => esc_url( '//wordpress.org/support/theme/relative' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Common Problems', 'relative' ),
				'icon'         => 'dashicons dashicons-editor-help',
				'text'         => esc_html__( 'For quick answers to the most common problems, you can check out the tutorials which can provide instant solutions and answers.', 'relative' ),
				'button_label' => sprintf( esc_html__( 'Get Answers', 'relative' ) ),
				'button_link'  => '//www.bloggingthemestyles.com/support/common-problems',
				'is_button'    => true,
				'is_new_tab'   => true,
			),

		),
		// Review content tab.
		'theme_review'      => array(
			'first' => array (
				'title'        => esc_html__( 'Theme Review', 'relative' ),
				'icon'         => 'dashicons dashicons-thumbs-up',
				'text'         => esc_html__( 'We would love to request a 5-star rating from you! If so, please visit the theme page and add your review and your star rating. If you have suggestions to help improve this theme, please let us know. If you experience problems, request support and we will be happy to help you out.', 'relative' ),
				'button_label' => esc_html__( 'Add Your Star Rating', 'relative' ),
				'button_link'  => esc_url( '//wordpress.org/support/theme/relative/reviews/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
		),		
		// Free vs pro array.
		'free_pro'                => array(
			'free_theme_name'     => ucfirst( $theme_name ) . ' (free)',
			'pro_theme_name'      => esc_html__('Relative Pro','relative' ),
			'pro_theme_link'      => '//www.bloggingthemestyles.com/wordpress-themes/relative-pro/',
			'get_pro_theme_label' => sprintf( esc_html__( 'Get Relative Pro', 'relative' ) ),
			'features'            => array(
				array(
					'title'            => esc_html__( 'Mobile Friendly', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Unlimited Colours', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Boxed Layouts', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
			
				array(
					'title'            => esc_html__( 'Background Image', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Built-In Social Menu', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),			
				array(
					'title'            => esc_html__( 'Custom Error Page', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				
				array(
					'title'            => esc_html__( 'Blog Layouts', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '5',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '9',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Sidebar Positions', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '16',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '21',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Page Templates', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '5',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '5',
					'hidden'           => '',
				),

				array(
					'title'            => esc_html__( 'Recent Posts Widget with Thumbnails', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Related Posts with Thumbnails', 'relative' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Show or Hide Page Elements', 'relative' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Advanced',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Theme Options', 'relative' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Advanced',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Support', 'relative' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Premium',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Featured Post Slider', 'relative' ),
					'description'      => esc_html__('Showcase featured posts with an amazing built-in FlexSlider from WooCommerce that includes additional feature settings.', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					

				array(
					'title'            => esc_html__( 'Custom Blog Title &amp; Introduction', 'relative' ),
					'description'      => esc_html__('WordPress does not have this, but we have added a customizable blog title and intro option.', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Blog Thumbnail Creation', 'relative' ),
					'description'      => esc_html__('Automatically have post featured images cropped when uploading for up to 9 blog styled layouts.', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'WooCommerce', 'relative' ),
					'description'      => esc_html__('Includes WooCommerce with custom styling in the customizer.', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Custom Page Headers with Images &amp; Titles', 'relative' ),
					'description'      => esc_html__('Create amazing page headings with background images and titles and breadcrumb navigation', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Choice of Font Awesome Icons version 4 and 5', 'relative' ),
					'description'      => esc_html__('With added the option to use the new Font Awesome icon set version 5, or stay with v4.', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Image Box Widget', 'relative' ),
					'description'      => esc_html__('Create awesome photo boxes with an overlay with content and a button', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'Author Info Widget', 'relative' ),
					'description'      => esc_html__('Display the author information with photo, position, intro, and social icons.', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Image Box Widget', 'relative' ),
					'description'      => esc_html__('Create awesome photo boxes with an overlay with content and a button', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Icon Box Widget', 'relative' ),
					'description'      => esc_html__('Create icon boxes using Font Awesome icons and add content with a button', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'Add Google Fonts', 'relative' ),
					'description'      => esc_html__('Add up to 2 more Google Fonts.', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Typography Options', 'relative' ),
					'description'      => esc_html__('Includes basic settings for your main text and headings, and a few more items.', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),						
				array(
					'title'            => esc_html__( 'Custom Styled Archive Titles', 'relative' ),
					'description'      => esc_html__('We customized the style of archive titles for tags, categories, etc.', 'relative'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
		
				
			),
		),
	);
	relative_info_page::init( $config );

}

add_action('after_setup_theme', 'relative_info');

?>
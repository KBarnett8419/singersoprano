<?php
/**
 * Theme Customizer
 * @package Relative
 */


 /**
 * Control type for upgrade.
 * @access public
 * @var string
 */
if ( ! class_exists( 'Relative_Customize_Static_Text_Control' ) ){
	if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
		class Relative_Customize_Static_Text_Control extends WP_Customize_Control {
		public $type = 'static-text';
		public function esc_html__construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}
		protected function render_content() {
			if ( ! empty( $this->label ) ) :
				?><span class="relative-customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
			endif;
			if ( ! empty( $this->description ) ) :
				?><div class="relative-description relative-customize-control-description"><?php

				if( is_array( $this->description ) ) {
					echo '<p>' . implode( '</p><p>', wp_kses_post( $this->description )) . '</p>';
					
				} else {
					echo wp_kses_post( $this->description );
				}
				?>
							
			<h1><?php esc_html_e('Relative Pro', 'relative') ?></h1>
			<p><?php esc_html_e('Opt in for the pro version of Relative and enjoy many additional features that will add more options. Here is a sample of what you will get:','relative'); ?></p>
			<p style="font-weight: 700;"><?php esc_html_e('Pro Features:', 'relative') ?></p>
			<ul>
				<li><?php esc_html_e('&bull; 9 Blog Styles', 'relative')?></li>
				<li><?php esc_html_e('&bull; 21 Sidebar Positions', 'relative')?></li>
				<li><?php esc_html_e('&bull; Custom Styled WooCommerce', 'relative')?></li>
				<li><?php esc_html_e('&bull; Thumbnail Creation for the Blogs', 'relative')?></li>
				<li><?php esc_html_e('&bull; Added Features for the Featured Post Slider', 'relative')?></li>
				<li><?php esc_html_e('&bull; About Author Widget', 'relative')?></li>
				<li><?php esc_html_e('&bull; Image Box Widget with Overlay', 'relative')?></li>
				<li><?php esc_html_e('&bull; Icon Box Widget with Content', 'relative')?></li>
				<li><?php esc_html_e('&bull; Custom Page Title Headings with Background Image', 'relative')?></li>
				<li><?php esc_html_e('&bull; Choice of FontAwesome Icons v4 or v5', 'relative')?></li>
				<li><?php esc_html_e('&bull; Add More Google Fonts', 'relative')?></li>
				<li><?php esc_html_e('&bull; Typography Options', 'relative')?></li>
				<li><?php esc_html_e('&bull; Custom Styled Archive Titles', 'relative')?></li>
				<li><?php esc_html_e('&bull; Premium Support', 'relative')?></li>
			</ul>
			
			<p><a class="button" href="<?php echo esc_url('https://www.bloggingthemestyles.com/wordpress-themes/relative-pro'); ?>" target="_blank"><?php esc_html_e( 'Get the Pro', 'relative' ); ?></a></p>				
			<?php
			endif;
		}
	}
} 
 
 /*
 * This loads categories for our slider dropdown select
 */
function relative_cats() {
	$cats = array();
	$cats[0] = 'All';

	foreach ( get_categories() as $categories => $category ) {
		$cats[ $category->term_id ] = $category->name;
	}
	return $cats;
}

/**
 * Render the site title for the selective refresh partial.
 */
function relative_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function relative_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function relative_customize_preview_js() {
	wp_enqueue_script( 'relative-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'relative_customize_preview_js' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function relative_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'relative_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'relative_customize_partial_blogdescription',
	) );	

   // SECTION - UPGRADE
    $wp_customize->add_section( 'relative_upgrade', array(
        'title'       => esc_html__( 'Upgrade to Pro', 'relative' ),
        'priority'    => 0
    ) );
	
		$wp_customize->add_setting( 'relative_upgrade_pro', array(
			'default' => '',
			'sanitize_callback' => '__return_false'
		) );
		
		$wp_customize->add_control( new Relative_Customize_Static_Text_Control( $wp_customize, 'relative_upgrade_pro', array(
			'label'	=> esc_html__('Get The Pro Version:','relative'),
			'section'	=> 'relative_upgrade',
			'description' => array('')
		) ) );		
	
// SECTION - THEME OPTIONS
	$wp_customize->add_section( 'relative_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'relative' ),
		'priority' => 20, 
	) );	
	
	// Setting group for the boxed layout
	$wp_customize->add_setting( 'relative_boxed_layout', array(
		'default' => 'boxed1600',
		'sanitize_callback' => 'relative_sanitize_select',
	) );  
	$wp_customize->add_control( 'relative_boxed_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Boxed Layout', 'relative' ),
		  'section' => 'relative_theme_options',
		  'choices' => array(
			  'full' => esc_html__( 'Full Width', 'relative' ),
			  'boxed1800' => esc_html__( 'Boxed 1800px Width', 'relative' ),
			  'boxed1600' => esc_html__( 'Boxed 1600px Width', 'relative' ),
			  'boxed1400' => esc_html__( 'Boxed 1400px Width', 'relative' ),			 
	) ) );	

	// Setting group for blog style  
	$wp_customize->add_setting( 'relative_blog_style', array(
		'default' => 'blog1',
		'sanitize_callback' => 'relative_sanitize_select',
	) );  
	$wp_customize->add_control( 'relative_blog_style', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Blog Style', 'relative' ),
		  'section' => 'relative_theme_options',
		  'choices' => array(	
				'blog1' => esc_html__( 'Medium With Right Sidebar', 'relative' ),	  
				'blog2' => esc_html__( 'Medium With Left Sidebar', 'relative' ),			
				'blog4' => esc_html__( 'Grid With No Sidebar', 'relative' ),				
				'blog5' => esc_html__( 'Grid With Left Sidebar', 'relative' ),
				'blog6' => esc_html__( 'Grid With Right Sidebar', 'relative' ),							
		) ) );		

	// Setting group for full post (single) layout  
	$wp_customize->add_setting( 'relative_single_style', array(
		'default' => 'single1',
		'sanitize_callback' => 'relative_sanitize_select',
	) );  
	$wp_customize->add_control( 'relative_single_style', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Full Post Style', 'relative' ),
		  'section' => 'relative_theme_options',
		  'choices' => array(	
				'single1' => esc_html__( 'Single With Right Sidebar', 'relative' ),	 
				'single2' => esc_html__( 'Single With Left Sidebar', 'relative' ), 
				'single3' => esc_html__( 'Single With No Sidebars', 'relative' ),
		) ) );	

	 // Use excerpts for blog posts
	  $wp_customize->add_setting( 'relative_use_excerpt',  array(
		  'default' => 1,
		  'sanitize_callback' => 'relative_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'relative_use_excerpt', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Use Excerpts', 'relative' ),
		'description' => esc_html__( 'Use excerpts for your blog post summaries or uncheck the box to use the standard Read More tag. NOTE: Some blog styles only use excerpts.', 'relative' ),
		'section'  => 'relative_theme_options',
	  ) );

    // Excerpt size
    $wp_customize->add_setting( 'relative_excerpt_size',  array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        ) );
    $wp_customize->add_control( 'relative_excerpt_size', array(
        'type'        => 'number',
        'section'     => 'relative_theme_options',
        'label'       => esc_html__('Excerpt Size', 'relative'),
		'description' => esc_html__('You can change the size of your blog summary excerpts with increments of 5 words.', 'relative'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
        ),
    ) );	  

	// Use FontAwesome version 4
	$wp_customize->add_setting( 'relative_fa4',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_fa4', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Use FontAwesome 4', 'relative' ),
		'description' => esc_html__( 'This is enabled by default, but if you are using a Font Awesome plugin, you should disable this feature.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );
	
	// Show full post footer group
	$wp_customize->add_setting( 'relative_show_post_footer_group',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_post_footer_group', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Footer Group', 'relative' ),
		'description' => esc_html__( 'This lets you show or hide the full post footer group that includes the meta info, post nav, categories and tags list.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );
	// Show featured sticky icon
	$wp_customize->add_setting( 'relative_show_post_sticky',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_post_sticky', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Featured Post Icon', 'relative' ),
		'description' => esc_html__( 'This lets you show or hide the featured post sticky icon next to the post title.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );
	// Show post summary meta info
	$wp_customize->add_setting( 'relative_show_summary_meta',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_summary_meta', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Summary Meta Info', 'relative' ),
		'description' => esc_html__( 'This lets you show the post summary meta info such as date, author, comments, etc.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );

	// Show full post featured image
	$wp_customize->add_setting( 'relative_show_single_featured_image',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_single_featured_image', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Featured Image', 'relative' ),
		'description' => esc_html__( 'This lets you show or hide the full post featured image.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );
	
	// Show full post meta info
	$wp_customize->add_setting( 'relative_show_single_meta',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_single_meta', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Meta Info', 'relative' ),
		'description' => esc_html__( 'This lets you show the full post meta information like date, author, etc.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );
	
	// Show full post nav
	$wp_customize->add_setting( 'relative_show_post_nav',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_post_nav', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Navigation', 'relative' ),
		'description' => esc_html__( 'This lets you show the Next and Previous post navigation on the full post view.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );

	// Show full post tags
	$wp_customize->add_setting( 'relative_show_post_tags',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_post_tags', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Tags List', 'relative' ),
		'description' => esc_html__( 'This lets you show the post tags section on the full post.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );


	// Show related posts section
	$wp_customize->add_setting( 'relative_show_related_posts',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_related_posts', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Related Posts Section', 'relative' ),
		'description' => esc_html__( 'This lets you show the related posts section on the full article view.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );

	// Featured bottom widgets full
	$wp_customize->add_setting( 'relative_featured_bottom_full',	array(
		'default' => false,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_featured_bottom_full', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Featured Bottom Sidebars Full', 'relative' ),
		'description' => esc_html__( 'This lets you change the Featured Bottom widgets to go full width and no spaces.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );	
	
	// Show dropcaps
	$wp_customize->add_setting( 'relative_show_dropcap',	array(
		'default' => false,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_dropcap', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show Full Post Dropcap', 'relative' ),
		'description' => esc_html__( 'This lets you show the drop cap style on the first letter of the first paragraph.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );	
	
	// Enable FP Template Sidebar
	$wp_customize->add_setting( 'relative_enable_fp_template',	array(
		'default' => false,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_enable_fp_template', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable FrontPage Template Options', 'relative' ),
		'description' => esc_html__( 'This lets you enable the Front Page template sidebar and customizer settings.', 'relative' ),
		'section'  => 'relative_theme_options',
	) );
	
	// Related Posts
   $wp_customize->add_setting('relative_related_posts', array(
      'default' => 'categories',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'relative_sanitize_select'
   ));

   $wp_customize->add_control('relative_related_posts', array(
      'type' => 'radio',
      'label' => esc_html__('Related Posts Displayed From:', 'relative'),
      'section' => 'relative_theme_options',
      'settings' => 'relative_related_posts',
      'choices' => array(
         'categories' => esc_html__('Related Posts By Categories', 'relative'),
         'tags' => esc_html__('Related Posts By Tags', 'relative')
      )
   ));
   
	// Copyright
	$wp_customize->add_setting( 'relative_copyright', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'   => 'postMessage',
	) );
	$wp_customize->add_control( 'relative_copyright', array(
		'settings' => 'relative_copyright',
		'label'    => esc_html__( 'Your Copyright Name', 'relative' ),
		'section'  => 'relative_theme_options',		
		'type'     => 'text',
	) ); 	
		

// SECTION - TOP BAR		
	$wp_customize->add_section('relative_top_bar',array(
		'title'     => esc_html__('Top Bar Options', 'relative'),
		'priority' => 21,
	));

	// setting to show top bar
	$wp_customize->add_setting('relative_show_topbar',array(
		'default'     => true,
		'sanitize_callback'	=> 'relative_sanitize_checkbox'
	));
	$wp_customize->add_control( 'relative_show_topbar', array(
		'section'	=> 'relative_top_bar',
	    'label' => esc_html__('Show Top Bar','relative'),
		'type'	 => 'checkbox'
	) );

	$wp_customize->add_setting('relative_show_topbar_left',array(
		'default'     => false,
		'sanitize_callback'	=> 'relative_sanitize_checkbox'
	));
	$wp_customize->add_control( 'relative_show_topbar_left', array(
		'section'	=> 'relative_top_bar',
	    'label' => esc_html__('Show Top Bar Left','relative'),
		'type'	 => 'checkbox'
	) );
	
	$wp_customize->add_setting('relative_show_topbar_center',array(
		'default'     => false,
		'sanitize_callback'	=> 'relative_sanitize_checkbox'
	));
	$wp_customize->add_control( 'relative_show_topbar_center', array(
		'section'	=> 'relative_top_bar',
	    'label' => esc_html__('Show Top Bar Center','relative'),
		'type'	 => 'checkbox'
	) );
	
	// setting to show top bar social
	$wp_customize->add_setting('relative_show_topbar_right',array(
		'default'     => false,
		'sanitize_callback'	=> 'relative_sanitize_checkbox'
	));
	$wp_customize->add_control( 'relative_show_topbar_right', array(
		'section'	=> 'relative_top_bar',
	    'label' => esc_html__('Show Top Bar Social Menu','relative'),
		'type'	 => 'checkbox'
	) );	

	// setting for top bar left
	$wp_customize->add_setting('relative_topbar_left',array(
		'sanitize_callback'	=> 'relative_sanitize_textarea',
		'transport'   => 'postMessage',
	));	
	$wp_customize->add_control( 'relative_topbar_left', array(
		'section'	=> 'relative_top_bar',
	    'label' => esc_html__('Top Bar Left','relative'),
		'type'	 => 'textarea',
	) );
	
	// setting for top bar center
	$wp_customize->add_setting('relative_topbar_center',array(
		'sanitize_callback'	=> 'relative_sanitize_textarea',
		'transport'   => 'postMessage',
	));	
	$wp_customize->add_control( 'relative_topbar_center', array(
		'section'	=> 'relative_top_bar',
	    'label' => esc_html__('Top Bar Center','relative'),
		'type'	 => 'textarea',
	) );
	
	
// SECTION - THUMBNAILS		
	$wp_customize->add_section('relative_thumbnails',array(
		'title'     => esc_html__('Thumbnail Options', 'relative'),
		'priority' => 22,
	));	

	// Enable blog 1 and 2 post thumbnails
	$wp_customize->add_setting( 'relative_blogmedium_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_blogmedium_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Create Thumbnails for Blog 1 &amp; 2', 'relative' ),
		'description' => esc_html__( 'This will create featured images for the blog 1 and 2 styled layouts. Size = 775 x 400 pixels.', 'relative' ),
		'section'  => 'relative_thumbnails',
	) );	
			
	// Enable blog grid 4, 5, 6 post thumbnails
	$wp_customize->add_setting( 'relative_bloggrid_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_bloggrid_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Create Thumbnails for Blog 4, 5, &amp; 6', 'relative' ),
		'description' => esc_html__( 'This will create featured images for the blog grid 4, 5, and 6 styled layouts. Size = 500 x 400 pixels.', 'relative' ),
		'section'  => 'relative_thumbnails',
	) );	
	
// Add to the Colours SECTION

// Show gradient
	$wp_customize->add_setting( 'relative_show_gradient',	array(
		'default' => true,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'relative_show_gradient', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show Gradient Background', 'relative' ),
		'description' => esc_html__( 'This lets you show the gradient background for the page top bar and bottom widget area instead of a solid colour. If you want to use colour, uncheck this box.', 'relative' ),
		'section'  => 'colors',
		'priority' => 1
	) );

// top bar background
 	$wp_customize->add_setting( 'relative_topbar', array(
		'default'        => '#c28039',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_topbar', array(
		'label'   => esc_html__( 'Top Bar Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_topbar',
	) ) );	
	
// body text
 	$wp_customize->add_setting( 'relative_body_text', array(
		'default'        => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_body_text', array(
		'label'   => esc_html__( 'Body Text Colour', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_body_text',
	) ) );	
	
// header background
 	$wp_customize->add_setting( 'relative_header_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_header_bg', array(
		'label'   => esc_html__( 'Header Background Colour', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_header_bg',
	) ) );		
	
// site title
 	$wp_customize->add_setting( 'relative_sitetitle', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_sitetitle', array(
		'label'   => esc_html__( 'Site Title Colour', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_sitetitle',
	) ) );
// site description
 	$wp_customize->add_setting( 'relative_sitetagline', array(
		'default'        => '#6d6d6d',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_sitetagline', array(
		'label'   => esc_html__( 'Site Description Colour', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_sitetagline',
	) ) );	

	
// link colour
 	$wp_customize->add_setting( 'relative_link_colour', array(
		'default'        => '#c28039',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_link_colour', array(
		'label'   => esc_html__( 'Link Colour', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_link_colour',
	) ) );	

	
// mobile menu toggle background
 	$wp_customize->add_setting( 'relative_mobile_toggle_bg', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_mobile_toggle_bg', array(
		'label'   => esc_html__( 'Mobile Menu Toggle Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_mobile_toggle_bg',
	) ) );	
// mobile menu toggle elements
 	$wp_customize->add_setting( 'relative_mobile_toggle_elements', array(
		'default'        => '#c1c1c1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_mobile_toggle_elements', array(
		'label'   => esc_html__( 'Mobile Menu Toggle Elements', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_mobile_toggle_elements',
	) ) );		
// mobile menu item
 	$wp_customize->add_setting( 'relative_mobile_item', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_mobile_item', array(
		'label'   => esc_html__( 'Mobile Menu Item', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_mobile_item',
	) ) );	

// mobile menu item background
 	$wp_customize->add_setting( 'relative_mobile_item_hover_bg', array(
		'default'        => '#c28039',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_mobile_item_hover_bg', array(
		'label'   => esc_html__( 'Mobile Menu Item Hover Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_mobile_item_hover_bg',
	) ) );		
		
// main menu item
 	$wp_customize->add_setting( 'relative_menu_item', array(
		'default'        => '#3a3a3a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_menu_item', array(
		'label'   => esc_html__( 'Main Menu Item', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_menu_item',
	) ) );	

// main submenu background
 	$wp_customize->add_setting( 'relative_menu_submenu_bg', array(
		'default'        => '#c28039',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_menu_submenu_bg', array(
		'label'   => esc_html__( 'Main Menu Submenu Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_menu_submenu_bg',
	) ) );	

// main submenu text
 	$wp_customize->add_setting( 'relative_menu_submenu_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_menu_submenu_text', array(
		'label'   => esc_html__( 'Main Menu Submenu Text', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_menu_submenu_text',
	) ) );	
	
// main menu item active
 	$wp_customize->add_setting( 'relative_menu_active_item', array(
		'default'        => '#e4aa6c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_menu_active_item', array(
		'label'   => esc_html__( 'Main Menu Active Item', 'relative' ),
		'description' => esc_html__( 'This is the colour of the menu item line when active or hover', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_menu_active_item',
	) ) );

// social menu text
 	$wp_customize->add_setting( 'relative_social_text', array(
		'default'        => '#848484',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_social_text', array(
		'label'   => esc_html__( 'Social Menu Icon', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_social_text',
	) ) );


// breadcrumbs text
 	$wp_customize->add_setting( 'relative_breadcrumbs_text', array(
		'default'        => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_breadcrumbs_text', array(
		'label'   => esc_html__( 'Breadcrumbs Text Colour', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_breadcrumbs_text',
	) ) );		
	
// pagination background
 	$wp_customize->add_setting( 'relative_paging_hbg', array(
		'default'        => '#c28039',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_paging_hbg', array(
		'label'   => esc_html__( 'Pagination Hover &amp; Active Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_paging_hbg',
	) ) );		

// pagination text
 	$wp_customize->add_setting( 'relative_paging_htext', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_paging_htext', array(
		'label'   => esc_html__( 'Pagination Hover &amp; Active Text', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_paging_htext',
	) ) );	

// content column top line
 	$wp_customize->add_setting( 'relative_content_column_lines', array(
		'default'        => '#e0e0e0',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_content_column_lines', array(
		'label'   => esc_html__( 'Content Column Lines', 'relative' ),
		'description' => esc_html__( 'This is for the top line colour to the content, left, and right columns.', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_content_column_lines',
	) ) );
	
// sidebar titles
 	$wp_customize->add_setting( 'relative_widget_title', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_widget_title', array(
		'label'   => esc_html__( 'Sidebar Widget Titles', 'relative' ),
		'description' => esc_html__( 'This is your widget title colour.', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_widget_title',
	) ) );	

// sidebar title line
 	$wp_customize->add_setting( 'relative_widget_title_line', array(
		'default'        => '#e4aa6c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_widget_title_line', array(
		'label'   => esc_html__( 'Sidebar Widget Title Line', 'relative' ),
		'description' => esc_html__( 'This is your widget title line colour.', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_widget_title_line',
	) ) );	

// sidebar bottom widget title line
 	$wp_customize->add_setting( 'relative_bottom_widget_title_line', array(
		'default'        => '#debe97',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_bottom_widget_title_line', array(
		'label'   => esc_html__( 'Bottom Sidebar Widget Title Line', 'relative' ),
		'description' => esc_html__( 'This is your widget title line colour.', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_bottom_widget_title_line',
	) ) );
	
// content headings
 	$wp_customize->add_setting( 'relative_headings', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_headings', array(
		'label'   => esc_html__( 'Content Headings', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_headings',
	) ) );	
	
// featured label
 	$wp_customize->add_setting( 'relative_featured_label', array(
		'default'        => '#c28039',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_featured_label', array(
		'label'   => esc_html__( 'Post Summary Featured Label', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_featured_label',
	) ) );

// bottom sidebars background
 	$wp_customize->add_setting( 'relative_bottom_bg', array(
		'default'        => '#c28039',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_bottom_bg', array(
		'label'   => esc_html__( 'Bottom Sidebar Area Background', 'relative' ),
		'description' => esc_html__( 'This is the background colour for your bottom sidebar widget group just above the footer.', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_bottom_bg',
	) ) );	
// bottom sidebar text
 	$wp_customize->add_setting( 'relative_bottom_sidebar_text', array(
		'default'        => '#f9f4ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_bottom_sidebar_text', array(
		'label'   => esc_html__( 'Bottom Sidebar Text', 'relative' ),
		'description' => esc_html__( 'This is the text and link colour for your bottom sidebar widget group just above the footer.', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_bottom_sidebar_text',
	) ) );

// related posts background
 	$wp_customize->add_setting( 'relative_related_bg', array(
		'default'        => '#f8f8f8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_related_bg', array(
		'label'   => esc_html__( 'Related Posts Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_related_bg',
	) ) );		
// related posts border
 	$wp_customize->add_setting( 'relative_related_border', array(
		'default'        => '#ebebeb',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_related_border', array(
		'label'   => esc_html__( 'Related Posts Border', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_related_border',
	) ) );	
	
// related post titles
 	$wp_customize->add_setting( 'relative_related_post_title', array(
		'default'        => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_related_post_title', array(
		'label'   => esc_html__( 'Related Posts Titles', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_related_post_title',
	) ) );	

	
// post nav background
 	$wp_customize->add_setting( 'relative_post_nav_bg', array(
		'default'        => '#f8f8f8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_post_nav_bg', array(
		'label'   => esc_html__( 'Full Post Nav Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_post_nav_bg',
	) ) );	
// post nav text
 	$wp_customize->add_setting( 'relative_post_nav_text', array(
		'default'        => '#686868',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_post_nav_text', array(
		'label'   => esc_html__( 'Full Post Nav Text', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_post_nav_text',
	) ) );
	
// footer bg
 	$wp_customize->add_setting( 'relative_footer_bg', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_footer_bg', array(
		'label'   => esc_html__( 'Footer Background Colour', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_footer_bg',
	) ) );	
	
// footer text
 	$wp_customize->add_setting( 'relative_footer_text', array(
		'default'        => '#c1c1c1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_footer_text', array(
		'label'   => esc_html__( 'Footer Text &amp; Link Colour', 'relative' ),
		'description'   => esc_html__( 'This will set the colour for your footer text, link, and social icon colours', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_footer_text',
	) ) );		
	
// dropcap colour
 	$wp_customize->add_setting( 'relative_dropcap_colour', array(
		'default'        => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_dropcap_colour', array(
		'label'   => esc_html__( 'Dropcap Letter Colour', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_dropcap_colour',
	) ) );		


// image view background
 	$wp_customize->add_setting( 'relative_image_viewer_bg', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_image_viewer_bg', array(
		'label'   => esc_html__( 'Image Viewer Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_image_viewer_bg',
	) ) );	
	
// button background
 	$wp_customize->add_setting( 'relative_button_bg', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_button_bg', array(
		'label'   => esc_html__( 'Button Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_button_bg',
	) ) );	
	
// button hover background
 	$wp_customize->add_setting( 'relative_button_hbg', array(
		'default'        => '#c28039',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_button_hbg', array(
		'label'   => esc_html__( 'Button Hover Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_button_bg',
	) ) );
	

// button text
 	$wp_customize->add_setting( 'relative_button_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_button_text', array(
		'label'   => esc_html__( 'Button Text', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_button_text',
	) ) );	

// selecting content background
 	$wp_customize->add_setting( 'relative_text_selection_bg', array(
		'default'        => '#222',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_text_selection_bg', array(
		'label'   => esc_html__( 'Text Select Background', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_text_selection_bg',
	) ) );		
// selecting content text
 	$wp_customize->add_setting( 'relative_text_selection_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_text_selection_text', array(
		'label'   => esc_html__( 'Text Select Text Colour', 'relative' ),
		'section' => 'colors',
		'settings'   => 'relative_text_selection_text',
	) ) );		


// SECTION - FEATURED SLIDER
	$wp_customize->add_section( 'relative_featured_slider' , array(
		'title'      => esc_html__( 'Slider Options', 'relative' ),
		'priority' => 29,
	) );

	// Show Slider
	$wp_customize->add_setting( 'relative_show_slider', array(
		'default' => false,
		'sanitize_callback' => 'relative_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( 'relative_show_slider', array(
		'type'     => 'checkbox',
		'label'     => esc_html__( 'Show Slider', 'relative' ),
		'description' => esc_html__( 'This lets you show the post slider on the front page of your website.', 'relative' ),
		'section'   => 'relative_featured_slider',
	));	
	
	// Slider category
	$wp_customize->add_setting( 'relative_featured_cat', array(
		'default' => 0,
		'sanitize_callback' => 'relative_sanitize_slidecat',
	) );

	$wp_customize->add_control( 'relative_featured_cat', array(
		'type' => 'select',
		'label' => esc_html__( 'Choose a category', 'relative' ),
		'description' => esc_html__( 'Choose your category to load slides from. Make sure your posts have featured images and we recommend also that you create a special category just for featured slide posts.', 'relative' ),
		'choices' => relative_cats(),
		'section' => 'relative_featured_slider',
	) );
	
	// Slide count
	$wp_customize->add_setting( 'relative_featured_limit', array(
		'default' => -1,
		'sanitize_callback' => 'relative_sanitize_number',
	) );

	$wp_customize->add_control( 'relative_featured_limit', array(
		'type' => 'number',
		'label' => esc_html__( 'Limit posts', 'relative' ),
		'description' => esc_html__( 'This lets you select how many slides to show where -1 is all and any number above 0 will show based on what you select.', 'relative' ),
		'section' => 'relative_featured_slider',
	) );


	
// PANEL - FRONT PAGE TEMPLATE
if( esc_attr(get_theme_mod( 'relative_enable_fp_template', false ) ) ) :
$wp_customize->add_panel( 'frontpagetemplate', array(
  'title' => esc_html__( 'Front Page Template','relative'  ),
  'description' => esc_html__( 'Find front page template options here such as slider settings, icon boxes, etc.', 'relative' ),
  'priority' => 30, 
) );


// SECTION - ICON BOXES
	$wp_customize->add_section( 'relative_icon_boxes', array(
		'title'    => esc_html__( 'Icon Boxes', 'relative' ),
		'panel' => 'frontpagetemplate',
	) );

 	// show iconboxes 
  	$wp_customize->add_setting( 'relative_show_iconboxes',  array(
		'default' => false,
		'sanitize_callback' => 'relative_sanitize_checkbox',
   	 ) );  
 	 $wp_customize->add_control( 'relative_show_iconboxes', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Icon Boxes Section', 'relative' ),
		'description' => esc_html__( 'Check this box to show the image boxes section.', 'relative' ),
		'section'  => 'relative_icon_boxes',
 	 ) ); 
	 
	// icon box 1 icon
	$wp_customize->add_setting( 'relative_iconbox1_icon', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_iconbox1_icon', array(
		'settings' => 'relative_iconbox1_icon',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 1 Icon', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) ); 

	// icon box 2 icon
	$wp_customize->add_setting( 'relative_iconbox2_icon', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_iconbox2_icon', array(
		'settings' => 'relative_iconbox2_icon',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 2 Icon', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) ); 

	// icon box 3 icon
	$wp_customize->add_setting( 'relative_iconbox3_icon', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_iconbox3_icon', array(
		'settings' => 'relative_iconbox3_icon',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 3 Icon', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) );

// icon box 1 title
	$wp_customize->add_setting( 'relative_iconbox1_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_iconbox1_title', array(
		'settings' => 'relative_iconbox1_title',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 1 Title', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) ); 

// icon box 2 title
	$wp_customize->add_setting( 'relative_iconbox2_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_iconbox2_title', array(
		'settings' => 'relative_iconbox2_title',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 2 Title', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) ); 

// icon box 3 title
	$wp_customize->add_setting( 'relative_iconbox3_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_iconbox3_title', array(
		'settings' => 'relative_iconbox3_title',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 3 Title', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) ); 

	
	$wp_customize->add_setting( 'relative_iconbox1_intro', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'relative_iconbox1_intro', array(
	  'type' => 'textarea',
	  'section' => 'relative_icon_boxes', 
	  'label' => esc_html__( 'IconBox 1 Intro', 'relative' ),
	  'description' => esc_html__( 'This lets you add a small intro to your icon box.','relative'  ),
	) );	
		
	$wp_customize->add_setting( 'relative_iconbox2_intro', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'relative_iconbox2_intro', array(
	  'type' => 'textarea',
	  'section' => 'relative_icon_boxes', 
	  'label' => esc_html__( 'IconBox 2 Intro', 'relative' ),
	  'description' => esc_html__( 'This lets you add a small intro to your icon box.','relative'  ),
	) );		
		
	$wp_customize->add_setting( 'relative_iconbox3_intro', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'relative_iconbox3_intro', array(
	  'type' => 'textarea',
	  'section' => 'relative_icon_boxes', 
	  'label' => esc_html__( 'IconBox 3 Intro', 'relative' ),
	  'description' => esc_html__( 'This lets you add a small intro to your icon box.','relative' ),
	) );	
		

// Iconbox 1 background
 	$wp_customize->add_setting( 'relative_iconbox_inner1', array(
		'default'        => '#bf8237',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_inner1', array(
		'label'   => esc_html__( 'Iconbox 1 Background', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox_inner1',
	) ) );	

// Iconbox 2 background
 	$wp_customize->add_setting( 'relative_iconbox_inner2', array(
		'default'        => '#985652',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_inner2', array(
		'label'   => esc_html__( 'Iconbox 2 Background', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox_inner2',
	) ) );	

// Iconbox 3 background
 	$wp_customize->add_setting( 'relative_iconbox_inner3', array(
		'default'        => '#693363',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_inner3', array(
		'label'   => esc_html__( 'Iconbox 3 Background', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox_inner3',
	) ) );	
	
// Iconbox 1 icon colour
 	$wp_customize->add_setting( 'relative_iconbox_icon1_colour', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_icon1_colour', array(
		'label'   => esc_html__( 'Iconbox 1 Icon Colour', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox_icon1_colour',
	) ) );		
	
// Iconbox 2 icon colour
 	$wp_customize->add_setting( 'relative_iconbox_icon2_colour', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_icon2_colour', array(
		'label'   => esc_html__( 'Iconbox 2 Icon Colour', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox_icon2_colour',
	) ) );	

// Iconbox 3 icon colour
 	$wp_customize->add_setting( 'relative_iconbox_icon3_colour', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_icon3_colour', array(
		'label'   => esc_html__( 'Iconbox 3 Icon Colour', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox_icon3_colour',
	) ) );	

	
// Iconbox 1 icon bg colour
 	$wp_customize->add_setting( 'relative_iconbox_icon1_bgcolour', array(
		'default'        => '#d69e59',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_icon1_bgcolour', array(
		'label'   => esc_html__( 'Iconbox 1 Icon Background', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox_icon1_bgcolour',
	) ) );		
	
// Iconbox 2 icon bg colour
 	$wp_customize->add_setting( 'relative_iconbox_icon2_bgcolour', array(
		'default'        => '#b57672',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_icon2_bgcolour', array(
		'label'   => esc_html__( 'Iconbox 2 Icon Background', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox_icon2_bgcolour',
	) ) );		
	
// Iconbox 3 icon bg colour
 	$wp_customize->add_setting( 'relative_iconbox_icon3_bgcolour', array(
		'default'        => '#8a5784',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_icon3_bgcolour', array(
		'label'   => esc_html__( 'Iconbox 3 Icon Background', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox_icon3_bgcolour',
	) ) );	

// Iconbox 1 text colour
 	$wp_customize->add_setting( 'relative_iconbox1_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox1_text', array(
		'label'   => esc_html__( 'Iconbox 1 Text Colour', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox1_text',
	) ) );

// Iconbox 2 text colour
 	$wp_customize->add_setting( 'relative_iconbox2_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox2_text', array(
		'label'   => esc_html__( 'Iconbox 2 Text Colour', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox2_text',
	) ) );

// Iconbox 3 text colour
 	$wp_customize->add_setting( 'relative_iconbox3_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox3_text', array(
		'label'   => esc_html__( 'Iconbox 3 Text Colour', 'relative' ),
		'section' => 'relative_icon_boxes',
		'settings'   => 'relative_iconbox3_text',
	) ) );

	
// icon box 1 button label
	$wp_customize->add_setting( 'relative_iconbox1_button_label', array(
		
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_iconbox1_button_label', array(
		'settings' => 'relative_iconbox1_button_label',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 1 Button Label', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) ); 	
	
// icon box 2 button label
	$wp_customize->add_setting( 'relative_iconbox2_button_label', array(
		
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_iconbox2_button_label', array(
		'settings' => 'relative_iconbox2_button_label',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 2 Button Label', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) );	
	
// icon box 3 button label
	$wp_customize->add_setting( 'relative_iconbox3_button_label', array(
		
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_iconbox3_button_label', array(
		'settings' => 'relative_iconbox3_button_label',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 3 Button Label', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) );	
	
// icon box 1 link
	$wp_customize->add_setting( 'relative_iconbox1_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'relative_iconbox1_link', array(
		'settings' => 'relative_iconbox1_link',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 1 Link', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) ); 
	
// icon box 2 link
	$wp_customize->add_setting( 'relative_iconbox2_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'relative_iconbox2_link', array(
		'settings' => 'relative_iconbox2_link',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 2 Link', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) ); 	
	
// icon box 3 link
	$wp_customize->add_setting( 'relative_iconbox3_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'relative_iconbox3_link', array(
		'settings' => 'relative_iconbox3_link',
		'type'     => 'text',		
		'label'    => esc_html__( 'Icon Box 3 Link', 'relative' ),
		'section'  => 'relative_icon_boxes',				
	) ); 
	
// FP iconbox button background
 	$wp_customize->add_setting( 'relative_iconbox_btn', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_btn', array(
		'label'   => esc_html__( 'Front Page Iconbox Button', 'relative' ),
		'settings'   => 'relative_iconbox_btn',
		'section' => 'relative_icon_boxes',
	) ) );		
	
// FP iconbox button label
 	$wp_customize->add_setting( 'relative_iconbox_btn_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_iconbox_btn_label', array(
		'label'   => esc_html__( 'Front Page Iconbox Button Label', 'relative' ),
		'settings'   => 'relative_iconbox_btn_label',
		'section' => 'relative_icon_boxes',
	) ) );		

// SECTION - BLOG
	$wp_customize->add_section( 'relative_fp_blog', array(
		'title'    => esc_html__( 'Front Page Blog', 'relative' ),
		'panel' => 'frontpagetemplate',
	) );

	// Blog section heading
	$wp_customize->add_setting( 'relative_blog_section_heading', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'relative_blog_section_heading', array(
		'settings' => 'relative_blog_section_heading',
		'section'  => 'relative_fp_blog',
		'type'     => 'text',		
		'label'    => esc_html__( 'Front Page Blog Section Heading', 'relative' ),						
	) );
	
	// blog post count
	$wp_customize->add_setting( 'relative_blog_post_count', array(
		'default' => 3,
		'sanitize_callback' => 'relative_sanitize_number',
	) );

	$wp_customize->add_control( 'relative_blog_post_count', array(
		'type' => 'number',
		'label' => esc_html__( 'Blog Post Count', 'relative' ),
		'description' => esc_html__( 'This lets you select how many posts to display on your custom front page template.', 'relative' ),
		'section' => 'relative_fp_blog',
	) );
	
	// blog post excerpt size
	$wp_customize->add_setting( 'relative_blog_fp_excerpt_size', array(
		'default' => 22,
		'sanitize_callback' => 'relative_sanitize_number',
	) );

	$wp_customize->add_control( 'relative_blog_fp_excerpt_size', array(
		'type' => 'number',
		'label' => esc_html__( 'Front Page Blog Excerpt Size', 'relative' ),
		'description' => esc_html__( 'This lets you choose the excerpt size for your front page template blog section.', 'relative' ),
		'section' => 'relative_fp_blog',
	) );	
	
// FP Blog read more background
 	$wp_customize->add_setting( 'relative_fp_readmore_bg', array(
		'default'        => '#c28039',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_fp_readmore_bg', array(
		'label'   => esc_html__( 'Front Page Read More Background', 'relative' ),
		'settings'   => 'relative_fp_readmore_bg',
		'section' => 'relative_fp_blog',
	) ) );		

// FP Blog read more hover
 	$wp_customize->add_setting( 'relative_fp_readmore_hover', array(
		'default'        => '#70276b',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_fp_readmore_hover', array(
		'label'   => esc_html__( 'Front Page Read More Hover Background', 'relative' ),
		'settings'   => 'relative_fp_readmore_hover',
		'section' => 'relative_fp_blog',
	) ) );
	
// FP Blog read more label
 	$wp_customize->add_setting( 'relative_fp_readmore_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'relative_fp_readmore_label', array(
		'label'   => esc_html__( 'Front Page Read More Label', 'relative' ),
		'settings'   => 'relative_fp_readmore_label',
		'section' => 'relative_fp_blog',
	) ) );	
endif;	
	 
}
add_action( 'customize_register', 'relative_customize_register' );



/**
 * SANITIZATION
 * Required for cleaning up bad inputs
 */

 // Text Area
 function relative_sanitize_textarea($input){
	return wp_kses_post( $input );
}

// Strip Slashes
	function relative_sanitize_strip_slashes($input) {
		return wp_kses_stripslashes($input);
	}	
	
// Radio and Select	
	function relative_sanitize_select( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;
		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	 	
// Checkbox
	function relative_sanitize_checkbox( $input ) {
		// Boolean check 
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
// Array of valid image file types
	function relative_sanitize_image( $image, $setting ) {
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
		);
		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}


/**
 * Adds sanitization callback function: Slider Category
 * @package PostMagazine Pro
 */
function relative_sanitize_slidecat( $input ) {

	if ( array_key_exists( $input, relative_cats() ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Adds sanitization callback function: Number
 * @package PostMagazine Pro
 */
function relative_sanitize_number( $input ) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}


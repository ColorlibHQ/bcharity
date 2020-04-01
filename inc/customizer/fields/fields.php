<?php 
/**
 * @Packge     : Bcharity
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

 // Theme color field
Epsilon_Customizer::add_field(
    'bcharity_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'bcharity' ),
        'description' => esc_html__( 'Select the theme color.', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_general_section',
        'default'     => '#00c424',
    )
);


// Header booking button field
Epsilon_Customizer::add_field(
    'bcharity_header_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Header button show/hide', 'bcharity' ),
        'section'     => 'bcharity_header_section',
        'default'     => true
    )
);

// Booking button label
Epsilon_Customizer::add_field(
    'header_btn_label',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Header button label', 'bcharity' ),
        'section'           => 'bcharity_header_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Learn More'
    )
);

// Booking button url
Epsilon_Customizer::add_field(
    'booking_btn_url',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Header button url', 'bcharity' ),
        'section'           => 'bcharity_header_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '#',
    )
);

// Booking button background color
Epsilon_Customizer::add_field(
    'bcharity_booking_btn_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Button Hover BG Color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_header_section',
        'default'     => '#00c424'
    )
);

// Header color sections
Epsilon_Customizer::add_field(
    'header_color_section',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Color Section', 'bcharity' ),
        'section'     => 'bcharity_header_section',

    )
);

 
// Header background color field
Epsilon_Customizer::add_field(
    'bcharity_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header BG Color', 'bcharity' ),
        'description' => esc_html__( 'Select the header background color.', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_header_section',
        'default'     => 'rgba(13,16,29,0.8)',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'bcharity_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_header_section',
        'default'     => '#fff',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'bcharity_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_header_section',
        'default'     => '#00c424',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'bcharity_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_header_section',
        'default'     => '#000',
    )
);

// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'bcharity_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_header_section',
        'default'     => '#00c424',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'bcharity_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'bcharity' ),
        'description' => esc_html__( 'Set post excerpt length.', 'bcharity' ),
        'section'     => 'bcharity_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'bcharity_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'bcharity' ),
        'section'     => 'bcharity_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'bcharity_like_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Like Button show/hide', 'bcharity' ),
        'section'     => 'bcharity_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'bcharity_blog_share',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Share show/hide', 'bcharity' ),
        'section'     => 'bcharity_blog_section',
        'default'     => true
    )
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'bcharity_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'bcharity' ),
        'section'           => 'bcharity_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'bcharity_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'bcharity' ),
        'section'           => 'bcharity_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'bcharity_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'bcharity_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_fof_section',
        'default'     => '#656565',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'bcharity' ),
        'section'     => 'bcharity_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'bcharity_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'bcharity' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'bcharity' ),
        'section'     => 'bcharity_footer_section',
        'default'     => true,
    )
);

// Footer Copyright section
Epsilon_Customizer::add_field(
    'bcharity_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'bcharity' ),
        'section'     => 'bcharity_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'bcharity' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'bcharity_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'bcharity' ),
        'section'     => 'bcharity_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'bcharity_footer_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_footer_section',
        'default'     => '#0d101d',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'bcharity_footer_widget_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_footer_section',
        'default'     => '#777777',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'bcharity_footer_widget_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_footer_section',
        'default'     => '#ffffff',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'bcharity_footer_widget_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_footer_section',
        'default'     => '#00c424',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'bcharity_footer_widget_anchor_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'bcharity' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bcharity_footer_section',
        'default'     => '#00c424',
    )
);


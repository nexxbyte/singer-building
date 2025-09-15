<?php
/**
 * Singer Building Child Theme
 * 
 * Based on Twenty Twenty-Four
 * Version: 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function singer_building_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');

    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'singer-building'),
        'footer' => __('Footer Menu', 'singer-building'),
    ));
    
    // Image sizes
    add_image_size('hero-bg', 1920, 1080, true);
    add_image_size('portfolio-thumb', 400, 300, true);
    add_image_size('section-bg', 1200, 600, true);
}
add_action('after_setup_theme', 'singer_building_setup');

/**
 * Enqueue Styles and Scripts
 */
function singer_building_scripts() {
    // Parent theme styles
    wp_enqueue_style('twentytwentyfour-style', get_template_directory_uri() . '/style.css');
    
    // Child theme styles
    wp_enqueue_style('singer-building-style', 
        get_stylesheet_directory_uri() . '/style.css',
        array('twentytwentyfour-style'),
        wp_get_theme()->get('Version')
    );
    
    // Custom JavaScript
    wp_enqueue_script('singer-building-scripts',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );
    
    // Localize script for AJAX
    wp_localize_script('singer-building-scripts', 'singer_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('singer_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'singer_building_scripts');

/**
 * ACF Fields Registration
 */
function singer_building_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        
        // Hero Section (single background image)
        acf_add_local_field_group(array(
            'key' => 'group_hero_section',
            'title' => 'Hero Section',
            'fields' => array(
                array(
                    'key' => 'field_hero_image',
                    'label' => 'Hero Image',
                    'name' => 'hero_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ),
                ),
            ),
        ));

        // Why Singer Building Section
        acf_add_local_field_group(array(
            'key' => 'group_why_singer',
            'title' => 'Why Singer Building Section',
            'fields' => array(
                array(
                    'key' => 'field_why_title',
                    'label' => 'Title',
                    'name' => 'why_title',
                    'type' => 'text',
                    'default_value' => 'Why Singer Building?',
                ),
                array(
                    'key' => 'field_why_text',
                    'label' => 'Content',
                    'name' => 'why_text',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ),
                array(
                    'key' => 'field_why_image',
                    'label' => 'Side Image',
                    'name' => 'why_image',
                    'type' => 'image',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_why_button',
                    'label' => 'Button',
                    'name' => 'why_button',
                    'type' => 'link',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ),
                ),
            ),
        ));

        // Building Industry Section
        acf_add_local_field_group(array(
            'key' => 'group_building_industry',
            'title' => 'Building Industry Section',
            'fields' => array(
                array(
                    'key' => 'field_industry_title',
                    'label' => 'Title',
                    'name' => 'industry_title',
                    'type' => 'text',
                    'default_value' => 'Building Industry for Over 17 Years',
                ),
                array(
                    'key' => 'field_industry_text',
                    'label' => 'Content',
                    'name' => 'industry_text',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                ),
                array(
                    'key' => 'field_industry_bg',
                    'label' => 'Background Image',
                    'name' => 'industry_bg',
                    'type' => 'image',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_industry_button',
                    'label' => 'Button',
                    'name' => 'industry_button',
                    'type' => 'link',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ),
                ),
            ),
        ));

        // CTA Section
        acf_add_local_field_group(array(
            'key' => 'group_cta',
            'title' => 'CTA Section',
            'fields' => array(
                array(
                    'key' => 'field_cta_title',
                    'label' => 'Title',
                    'name' => 'cta_title',
                    'type' => 'text',
                    'default_value' => 'Need Any Help in Your Dream Project',
                ),
                array(
                    'key' => 'field_cta_text',
                    'label' => 'Text',
                    'name' => 'cta_text',
                    'type' => 'textarea',
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_cta_phone',
                    'label' => 'Phone Number',
                    'name' => 'cta_phone',
                    'type' => 'text',
                    'default_value' => '0410 984 873',
                ),
                array(
                    'key' => 'field_cta_button',
                    'label' => 'Button',
                    'name' => 'cta_button',
                    'type' => 'link',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'singer_building_acf_fields');


/**
 * Custom Post Types
 */
function singer_building_post_types() {
    // Portfolio Post Type
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio Item',
            'add_new_item' => 'Add New Portfolio Item',
            'edit_item' => 'Edit Portfolio Item',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => array('slug' => 'portfolio'),
    ));

    // Portfolio Categories
    register_taxonomy('portfolio_category', 'portfolio', array(
        'labels' => array(
            'name' => 'Portfolio Categories',
            'singular_name' => 'Portfolio Category',
        ),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'portfolio-category'),
        'show_admin_column' => true,
    ));
}
add_action('init', 'singer_building_post_types');


/**
 * Widgets
 */
function singer_building_widgets_init() {
    register_sidebar(array(
        'name' => 'Footer Widgets',
        'id' => 'footer-widgets',
        'description' => 'Appears in the footer area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'singer_building_widgets_init');

/**
 * Contact Form Handler
 */
function singer_building_handle_contact_form() {
    if (!wp_verify_nonce($_POST['nonce'], 'singer_nonce')) {
        wp_die('Security check failed');
    }
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Send email
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success('Message sent successfully!');
    } else {
        wp_send_json_error('Failed to send message.');
    }
}
add_action('wp_ajax_submit_contact_form', 'singer_building_handle_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'singer_building_handle_contact_form');

/**
 * Customizer
 */
function singer_building_customize_register($wp_customize) {
    // Site Identity Section
    $wp_customize->add_setting('contact_phone', array(
        'default' => '0410 984 873',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => 'Contact Phone',
        'section' => 'title_tagline',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'rhett@singerbuilding.com.au',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => 'Contact Email',
        'section' => 'title_tagline',
        'type' => 'email',
    ));
    
    // Colors
    $wp_customize->add_setting('primary_color', array(
        'default' => '#4ECDC4',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => 'Primary Color',
        'section' => 'colors',
    )));
}
add_action('customize_register', 'singer_building_customize_register');

/**
 * Custom CSS Variables
 */
function singer_building_css_variables() {
    $primary_color = get_theme_mod('primary_color', '#4ECDC4');
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --primary-dark: <?php echo esc_attr(singer_building_darken_color($primary_color, 20)); ?>;
            --text-dark: #333333;
            --text-light: #666666;
            --bg-light: #f8f9fa;
        }
    </style>
    <?php
}
add_action('wp_head', 'singer_building_css_variables');

/**
 * Utility function to darken color
 */
function singer_building_darken_color($hex, $percent) {
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    
    $r = max(0, min(255, $r - ($r * $percent / 100)));
    $g = max(0, min(255, $g - ($g * $percent / 100)));
    $b = max(0, min(255, $b - ($b * $percent / 100)));
    
    return sprintf('#%02x%02x%02x', $r, $g, $b);
}

/**
 * Skip link for accessibility
 */
function singer_building_skip_link() {
    echo '<a class="screen-reader-text" href="#main">Skip to content</a>';
}
add_action('wp_body_open', 'singer_building_skip_link');

/**
 * Performance optimizations
 */
function singer_building_performance_optimizations() {
    // Remove unnecessary WordPress features
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Disable emojis
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'singer_building_performance_optimizations');

/**
 * SEO Functions
 */
function singer_building_seo_head() {
    if (is_front_page()) {
        echo '<meta name="description" content="Singer Building - Professional building and construction services with over 17 years of industry experience. Commercial projects, domestic projects, and shop fit outs.">';
    }
}
add_action('wp_head', 'singer_building_seo_head');

/**
 * Schema.org structured data
 */
function singer_building_schema_org() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
            'telephone' => get_theme_mod('contact_phone', '0410 984 873'),
            'email' => get_theme_mod('contact_email', 'rhett@singerbuilding.com.au'),
            'url' => home_url(),
        );
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    }
}
add_action('wp_head', 'singer_building_schema_org');
?>
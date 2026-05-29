<?php
/**
 * Doç. Dr. Burhan Özalp WordPress Theme Functions & Definitions
 *
 * @package burhan-ozalp
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function burhan_ozalp_setup() {
    // Add theme supports
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    // Register navigation menus
    register_nav_menus( array(
        'header_menu'     => esc_html__( 'Header Menü', 'burhan-ozalp' ),
        'footer_menu'     => esc_html__( 'Footer Menü', 'burhan-ozalp' ),
        'bottom_bar_menu' => esc_html__( 'Bottom Bar Menü', 'burhan-ozalp' ),
    ) );
}
add_action( 'after_setup_theme', 'burhan_ozalp_setup' );

/**
 * Minimize WordPress Built-in Thumbnail Sizes to prevent excess files
 */
function burhan_ozalp_filter_image_sizes( $sizes ) {
    // Keep only core 'thumbnail' (usually 150x150) for dashboard lists and remove intermediate crops
    unset( $sizes['medium'] );
    unset( $sizes['medium_large'] );
    unset( $sizes['large'] );
    unset( $sizes['1536x1536'] );
    unset( $sizes['2048x2048'] );
    return $sizes;
}
// add_filter( 'intermediate_image_sizes_advanced', 'burhan_ozalp_filter_image_sizes' );

// Turn off thumbnail generation rules for custom sizes
function burhan_ozalp_disable_other_sizes() {
    // Prevent default size uploads from being generated if possible
    update_option( 'medium_size_w', 0 );
    update_option( 'medium_size_h', 0 );
    update_option( 'large_size_w', 0 );
    update_option( 'large_size_h', 0 );
}
// add_action( 'after_switch_theme', 'burhan_ozalp_disable_other_sizes' );

/**
 * Enqueue Styles and Scripts
 */
function burhan_ozalp_assets() {
    // Google Fonts: Cormorant Garamond & Montserrat
    wp_enqueue_style( 'burhan-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700;800&display=swap', array(), null );

    // FontAwesome Icons CSS CDN
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

    // Theme Tailwind Stylesheet
    wp_enqueue_style( 'burhan-theme-style', get_template_directory_uri() . '/assets/css/index.css', array(), '1.0.0' );

    // Theme WordPress Content Typography Stylesheet
    wp_enqueue_style( 'burhan-wp-styles', get_template_directory_uri() . '/assets/css/wp-styles.css', array(), '1.0.0' );

    // Standard scripts enqueuing
    wp_enqueue_script( 'burhan-theme-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );

    // Threaded comments replies standard script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'burhan_ozalp_assets' );

/**
 * Register ACF Options Page
 */
if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' => esc_html__( 'Site Options', 'burhan-ozalp' ),
        'menu_title' => esc_html__( 'Site Options', 'burhan-ozalp' ),
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ) );
}

/**
 * Helper to get site options (either localized or standard fallback)
 */
function burhan_get_option( $name, $default = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $name, 'option' );
        if ( ! empty( $val ) ) {
            return $val;
        }
    }
    return $default;
}

/**
 * Custom Comment Callback matching the HTML design precisely
 */
function burhan_comment_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li class="<?php echo $depth > 1 ? 'ml-12 md:ml-20' : ''; ?> comment flex space-x-6 <?php echo $depth > 1 ? 'border-l-2 border-gray-100 pl-6 md:pl-10 mt-6' : 'mt-12'; ?>" id="comment-<?php comment_ID(); ?>">
        <div class="flex-shrink-0">
            <?php echo get_avatar( $comment, 60, '', '', array( 'class' => 'avatar w-14 h-14 rounded-full border border-gray-100 shadow-sm' ) ); ?>
        </div>
        <div class="comment-body flex-grow text-left">
            <div class="comment-meta mb-2">
                <cite class="fn font-bold text-gray-800 not-italic uppercase tracking-wider"><?php comment_author(); ?></cite>
                <span class="text-xs text-gray-400 ml-4"><?php comment_date(); ?></span>
            </div>
            <div class="comment-content text-[#7b5f43] text-sm leading-relaxed mb-4">
                <?php comment_text(); ?>
            </div>
            <div class="reply">
                <?php 
                comment_reply_link( array_merge( $args, array(
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'reply_text' => esc_html__( 'Yanıtla', 'burhan-ozalp' ),
                ) ) ); 
                ?>
            </div>
        </div>
    <?php
}

/**
 * Include the ACF custom fields definitions file
 */
require_once get_template_directory() . '/acf-fields.php';

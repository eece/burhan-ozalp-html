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

    // Google Analytics (GA4) Tracking Enqueue
    $ga_id = burhan_get_option( 'google_analytics_id' );
    if ( ! empty( $ga_id ) ) {
        wp_enqueue_script( 'google-analytics', 'https://www.googletagmanager.com/gtag/js?id=' . esc_attr( $ga_id ), array(), null, false );
        wp_add_inline_script( 'google-analytics', "
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '" . esc_js( $ga_id ) . "');
        " );
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
 * Built with Polylang-aware transient caching and in-memory static caching to completely resolve update_meta_cache and option bottlenecks.
 */
function burhan_get_option( $name, $default = '' ) {
    static $burhan_options_static_cache = array();
    
    // Determine the active Polylang language slug to ensure the cache is 100% translatable and isolated
    $lang = 'default';
    if ( function_exists( 'pll_current_language' ) ) {
        $lang = pll_current_language( 'slug' );
    } elseif ( function_exists( 'get_locale' ) ) {
        $lang = get_locale();
    }
    
    // 1. Check extremely fast PHP in-memory (request-level) static cache
    if ( isset( $burhan_options_static_cache[$lang] ) && array_key_exists( $name, $burhan_options_static_cache[$lang] ) ) {
        return $burhan_options_static_cache[$lang][$name];
    }
    
    // 2. Check transient persistent cache
    $cache_key = 'burhan_opt_' . sanitize_key( $lang );
    $cached_options = get_transient( $cache_key );
    if ( ! is_array( $cached_options ) ) {
        $cached_options = array();
    }
    
    if ( array_key_exists( $name, $cached_options ) ) {
        $burhan_options_static_cache[$lang][$name] = $cached_options[$name];
        return $cached_options[$name];
    }
    
    // 3. Fallback to ACF / Standard WordPress option mapping
    $val = '';
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $name, 'option' );
    }
    
    if ( empty( $val ) ) {
        $val = $default;
    }
    
    // Save to transient & static runtime caches
    $cached_options[$name] = $val;
    set_transient( $cache_key, $cached_options, 12 * HOUR_IN_SECONDS );
    $burhan_options_static_cache[$lang][$name] = $val;
    
    return $val;
}

/**
 * Automagic Options Cache Flushing on ACF Option Saving
 * Fully supports Polylang by detecting all active languages and clearing their corresponding transients.
 */
function burhan_clear_options_caches( $post_id ) {
    if ( strpos( (string) $post_id, 'options' ) !== false ) {
        $languages = array( 'default' );
        
        // Find all active Polylang language codes
        if ( function_exists( 'pll_languages_list' ) ) {
            $languages = pll_languages_list( array( 'fields' => 'slug' ) );
        } elseif ( function_exists( 'get_locale' ) ) {
            $languages[] = get_locale();
        }
        
        // Purge transients for each language to reflect real-time updates instantly
        foreach ( $languages as $lang ) {
            delete_transient( 'burhan_opt_' . sanitize_key( $lang ) );
        }
    }
}
add_action( 'acf/save_post', 'burhan_clear_options_caches', 20 );

/**
 * Query Performance Optimizer: Bulk prime post caching and image metadata caching.
 * By intercepting queried posts lists, we fetch all relevant custom thumbnail IDs in ONE batch database trip,
 * avoiding recursive update_meta_cache and _prime_post_caches bottlenecks inside loops.
 */
function burhan_bulk_prime_thumbnail_caches( $posts, $query ) {
    if ( empty( $posts ) || ! is_array( $posts ) ) {
        return $posts;
    }
    
    $thumbnail_ids = array();
    foreach ( $posts as $post ) {
        if ( isset( $post->ID ) ) {
            $thumb_id = get_post_thumbnail_id( $post->ID );
            if ( $thumb_id ) {
                $thumbnail_ids[] = intval( $thumb_id );
            }
        }
    }
    
    if ( ! empty( $thumbnail_ids ) ) {
        // Batch prime both post objects and attachment metadata records in one unified query
        _prime_post_caches( $thumbnail_ids, true, true );
    }
    
    return $posts;
}
add_filter( 'the_posts', 'burhan_bulk_prime_thumbnail_caches', 10, 2 );

/**
 * Custom Comment Callback matching the HTML design precisely
 */
function burhan_comment_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li class="<?php echo $depth > 1 ? 'ml-12 md:ml-20 border-l-2 border-gray-100 pl-6 md:pl-10 mt-6' : 'mt-12'; ?> comment" id="comment-<?php comment_ID(); ?>">
        <div class="flex space-x-6">
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
        </div>
    <?php
}

/**
 * Include the ACF custom fields definitions file
 */
require_once get_template_directory() . '/acf-fields.php';

/**
 * Filter archive titles to remove prefixes like Category:, Tag:, Author:, etc.
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = get_the_author();
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
} );

/**
 * Programmatically register hardcoded theme strings to Polylang String Translation
 */
function burhan_register_polylang_strings() {
    if ( function_exists( 'pll_register_string' ) ) {
        $strings = array(
            'Numaranızı Bırakın Arayalım !' => 'burhan-ozalp',
            'MUAYENEHANE ADRESİ:' => 'burhan-ozalp',
            'Muayenehane Adresi:' => 'burhan-ozalp',
            'Telefonlar:' => 'burhan-ozalp',
            'YOL TARİFİ' => 'burhan-ozalp',
            'GÖNDER' => 'burhan-ozalp',
            'Randevu' => 'burhan-ozalp',
            'SSS' => 'burhan-ozalp',
            'Hakkımda' => 'burhan-ozalp',
            'Site Haritası' => 'burhan-ozalp',
            'İletişim' => 'burhan-ozalp',
            'KVKK' => 'burhan-ozalp',
            'Gizlilik Sözleşmesi' => 'burhan-ozalp',
            'Yazılar' => 'burhan-ozalp',
            'İşlem' => 'burhan-ozalp',
            'Detaylı Bilgi' => 'burhan-ozalp',
            'Henüz yazılmış bir içerik bulunamadı.' => 'burhan-ozalp',
            'Bu arşivde henüz bir içerik bulunamadı.' => 'burhan-ozalp',
            'Arama Sonuçları' => 'burhan-ozalp',
            'Kelime yazın ve arayın...' => 'burhan-ozalp',
            'ARA' => 'burhan-ozalp',
            'Aradığınız kelimeye ait sonuç bulunamadı.' => 'burhan-ozalp',
            'Lütfen farklı kelimelerle tekrar deneyiniz.' => 'burhan-ozalp',
            'Bir Yanıt Bırakın' => 'burhan-ozalp',
            'Yorumu Gönder' => 'burhan-ozalp',
            'Yanıtla' => 'burhan-ozalp',
            'İsim *' => 'burhan-ozalp',
            'E-mail *' => 'burhan-ozalp',
            'İnternet Sitesi' => 'burhan-ozalp',
            'Yorumunuz *' => 'burhan-ozalp',
            'Aradığınız Sayfa Bulunamadı' => 'burhan-ozalp',
            'Bizi Arayın:' => 'burhan-ozalp',
            '"%1$s" araması için 1 sonuç bulundu.' => 'burhan-ozalp',
            '"%1$s" araması için %2$s sonuç bulundu.' => 'burhan-ozalp',
            'Devamı &rarr;' => 'burhan-ozalp',
            'Ulaşmaya çalıştığınız sayfa silinmiş, ismi değiştirilmiş veya geçici olarak servis dışı kalmış olabilir. Aradığınız işlemi bulmak için aşağıdaki arama çubuğunu kullanabilir ya da doğrudan ana sayfaya dönebilirsiniz.' => 'burhan-ozalp',
            'Aramak istediğiniz kelime...' => 'burhan-ozalp',
            
            // Scanned and added strings
            'Ara' => 'burhan-ozalp',
            'Kapat' => 'burhan-ozalp',
            'Arama Yapın' => 'burhan-ozalp',
            'Merak ettiğiniz her şeyi arayın...' => 'burhan-ozalp',
            'HIZLI LİNKLER' => 'burhan-ozalp',
            'Ad Soyad*' => 'burhan-ozalp',
            'E-posta*' => 'burhan-ozalp',
            'Ülke*' => 'burhan-ozalp',
            'Telefon No*' => 'burhan-ozalp',
            'Telefon*' => 'burhan-ozalp',
            'Mesaj*' => 'burhan-ozalp',
            'Konu*' => 'burhan-ozalp',
            'İçerik bulunamadı.' => 'burhan-ozalp',
            '1 Yorum' => 'burhan-ozalp',
            '&larr; Eski Yorumlar' => 'burhan-ozalp',
            'Yeni Yorumlar &rarr;' => 'burhan-ozalp',
            'E-posta hesabınız yayımlanmayacak. Gerekli alanlar * ile işaretlenmiştir' => 'burhan-ozalp',
            '%s için Bir Yanıt Bırakın' => 'burhan-ozalp',
            'İptal Et' => 'burhan-ozalp',
            'Bir dahaki sefere yorum yaptığımda kullanılmak üzere adımı, e-posta adresimi ve web site adresimi bu tarayıcıya kaydet.' => 'burhan-ozalp',
            'Tarih:' => 'burhan-ozalp',
            'Etiketler:' => 'burhan-ozalp',
            'Devamını Oku' => 'burhan-ozalp',
            "Whatsapp'tan Yaz" => 'burhan-ozalp',
        );

        foreach ( $strings as $string => $context ) {
            pll_register_string( $string, $string, $context );
        }
    }
}
add_action( 'init', 'burhan_register_polylang_strings' );

/**
 * Automatically hook WordPress __() and _e() functions for 'burhan-ozalp' domain
 * to Polylang's dynamic string translations database.
 */
add_filter( 'gettext', function( $translation, $text, $domain ) {
    if ( 'burhan-ozalp' === $domain && function_exists( 'pll__' ) ) {
        $translated = pll__( $text );
        if ( $translated !== $text && ! empty( $translated ) ) {
            return $translated;
        }
    }
    return $translation;
}, 10, 3 );

/**
 * Automatically hook WordPress _x(), _ex(), esc_attr_x(), and esc_html_x() functions
 * for 'burhan-ozalp' domain to Polylang's dynamic string translations database.
 */
add_filter( 'gettext_with_context', function( $translation, $text, $context, $domain ) {
    if ( 'burhan-ozalp' === $domain && function_exists( 'pll__' ) ) {
        $translated = pll__( $text );
        if ( $translated !== $text && ! empty( $translated ) ) {
            return $translated;
        }
    }
    return $translation;
}, 10, 4 );

/**
 * Output Google Tag Manager script in <head>
 */
function burhan_gtm_head_script() {
    $gtm_id = burhan_get_option('google_tag_manager_id');
    if ( ! empty( $gtm_id ) ) {
        ?>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo esc_js( $gtm_id ); ?>');</script>
        <!-- End Google Tag Manager -->
        <?php
    }
}
add_action( 'wp_head', 'burhan_gtm_head_script', 1 );

/**
 * Output Google Tag Manager noscript right after <body> opens
 */
function burhan_gtm_noscript() {
    $gtm_id = burhan_get_option('google_tag_manager_id');
    if ( ! empty( $gtm_id ) ) {
        ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $gtm_id ); ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <?php
    }
}
add_action( 'wp_body_open', 'burhan_gtm_noscript' );

/**
 * Output JSON-LD Schema in <head>
 */
function burhan_json_ld_schema() {
    $schema = burhan_get_option('json_ld_schema');
    if ( ! empty( $schema ) ) {
        $trimmed = trim( $schema );
        if ( strpos( $trimmed, '<script' ) === 0 ) {
            echo $trimmed . "\n";
        } else {
            echo '<script type="application/ld+json">' . "\n" . $trimmed . "\n" . '</script>' . "\n";
        }
    }
}
add_action( 'wp_head', 'burhan_json_ld_schema', 10 );

/**
 * =========================================================================
 * WORDPRESS RENDER-BLOCKING PERFORMANCE OPTIMIZATION (NO-PLUGIN ARCHITECTURE)
 * =========================================================================
 */

/**
 * Phase 1: Asynchronous Third-Party Script Injection (Google Tag Manager & Analytics)
 * Prevents major tracking and script layers from blocking main-thread HTML parsing.
 */
function burhan_optimize_script_loading( $tag, $handle, $src ) {
    if ( is_admin() ) {
        return $tag;
    }
    
    // Inject async/defer on google-analytics and other tag manager components
    if ( strpos( $src, 'googletagmanager.com' ) !== false || strpos( $handle, 'google-analytics' ) !== false ) {
        if ( strpos( $tag, 'defer' ) === false && strpos( $tag, 'async' ) === false ) {
            return str_replace( '<script ', '<script async ', $tag );
        }
    }
    
    return $tag;
}
add_filter( 'script_loader_tag', 'burhan_optimize_script_loading', 10, 3 );

/**
 * Phase 2: Asynchronous Non-Critical CSS Loading
 * Defer redundant bloat (like block-library enqueues or CDN font-awesome links) while keeping critical styles immediate.
 */
function burhan_optimize_style_loading( $html, $handle, $href, $media ) {
    if ( is_admin() ) {
        return $html;
    }

    // Identify assets that should be non-blocking. Let's list non-critical style handles.
    $defer_styles = array(
        'font-awesome',
        'wp-block-library',
        'wp-block-library-theme',
        'wc-blocks-style',
        'classic-theme-styles',
        'global-styles'
    );

    $should_defer = false;
    foreach ( $defer_styles as $style_handle ) {
        if ( $handle === $style_handle || strpos( $href, $style_handle ) !== false ) {
            $should_defer = true;
            break;
        }
    }

    // Force defer cloudflare CDN styles
    if ( strpos( $href, 'cdnjs.cloudflare.com' ) !== false ) {
        $should_defer = true;
    }

    if ( $should_defer ) {
        $preloaded_html = sprintf(
            '<link rel="preload" id="%s-css-preload" href="%s" as="style" onload="this.onload=null;this.rel=\'stylesheet\'" media="%s" />' . "\n",
            esc_attr( $handle ),
            esc_url( $href ),
            esc_attr( $media )
        );
        $noscript_html = sprintf(
            '<noscript><link rel="stylesheet" id="%s-css-noscript" href="%s" media="%s" /></noscript>' . "\n",
            esc_attr( $handle ),
            esc_url( $href ),
            esc_attr( $media )
        );
        return $preloaded_html . $noscript_html;
    }

    return $html;
}
add_filter( 'style_loader_tag', 'burhan_optimize_style_loading', 10, 4 );

/**
 * Phase 3: Asset Inlining for Small Component Styles
 * Instruct WordPress to inline enqueued Gutenberg block styles / layouts smaller than 20KB for high-density performance.
 */
function burhan_styles_inline_size_limit( $bytes ) {
    return 20000; // Inline styles up to 20 KB to save RTT handshake delays
}
add_filter( 'styles_inline_size_limit', 'burhan_styles_inline_size_limit' );

/**
 * Phase 4: Network Preconnection Optimization
 * Preconnect DNS, TLS session layers for fonts early before fetching.
 */
function burhan_fonts_preconnect_optimization() {
    if ( is_admin() ) {
        return;
    }
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";
}
add_action( 'wp_head', 'burhan_fonts_preconnect_optimization', 2 );



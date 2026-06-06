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


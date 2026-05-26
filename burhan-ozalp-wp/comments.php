<?php
/**
 * The template for displaying comments.
 *
 * @package burhan-ozalp
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( post_password_required() ) {
    return;
}
?>

<section id="comments" class="py-24 bg-[#fcfaf7] border-t border-gray-100">
    <div class="container mx-auto px-4 max-w-5xl">
        
        <?php if ( have_comments() ) : ?>
            <h3 class="text-3xl font-['Cormorant_Garamond'] font-bold text-[#333] mb-12 uppercase tracking-widest">
                <?php
                $comment_count = get_comments_number();
                if ( 1 === $comment_count ) {
                    esc_html_e( '1 Yorum', 'burhan-ozalp' );
                } else {
                    printf( 
                        /* translators: 1: comment count number */
                        esc_html( _n( '%1$s Yorum', '%1$s Yorum', $comment_count, 'burhan-ozalp' ) ),
                        number_format_i18n( $comment_count )
                    );
                }
                ?>
            </h3>

            <!-- Comment List -->
            <ol class="comment-list space-y-12 mb-20 list-none pl-0">
                <?php
                wp_list_comments( array(
                    'callback' => 'burhan_comment_callback',
                    'style'    => 'ol',
                ) );
                ?>
            </ol>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                <nav class="comment-navigation flex justify-between uppercase font-bold tracking-widest text-xs py-4 mb-20 border-b border-gray-200" role="navigation">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Eski Yorumlar', 'burhan-ozalp' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Yeni Yorumlar &rarr;', 'burhan-ozalp' ) ); ?></div>
                </nav>
            <?php endif; ?>

        <?php endif; // have_comments() ?>

        <?php
        // Comment Fields Structure Customize
        $fields = array(
            'author' => '<div class="comment-form-author">
                            <label for="author" class="block text-xs font-bold uppercase tracking-widest mb-2 text-gray-500">' . esc_html__( 'İsim *', 'burhan-ozalp' ) . '</label>
                            <input id="author" name="author" type="text" value="" size="30" maxlength="245" required class="w-full bg-[#fcfaf7] border border-gray-200 p-4 focus:outline-none focus:border-[#8b6e4e] text-[#7b5f43] text-sm">
                        </div>',
            'email'  => '<div class="comment-form-email">
                            <label for="email" class="block text-xs font-bold uppercase tracking-widest mb-2 text-gray-500">' . esc_html__( 'E-mail *', 'burhan-ozalp' ) . '</label>
                            <input id="email" name="email" type="email" value="" size="30" maxlength="100" required class="w-full bg-[#fcfaf7] border border-gray-200 p-4 focus:outline-none focus:border-[#8b6e4e] text-[#7b5f43] text-sm">
                        </div>',
            'url'    => '<div class="comment-form-url">
                            <label for="url" class="block text-xs font-bold uppercase tracking-widest mb-2 text-gray-500">' . esc_html__( 'İnternet Sitesi', 'burhan-ozalp' ) . '</label>
                            <input id="url" name="url" type="url" value="" size="30" maxlength="200" class="w-full bg-[#fcfaf7] border border-gray-200 p-4 focus:outline-none focus:border-[#8b6e4e] text-[#7b5f43] text-sm">
                        </div>',
        );

        // Customize args
        $args = array(
            'fields'               => $fields,
            'comment_field'        => '<div class="comment-form-comment">
                                        <label for="comment" class="block text-xs font-bold uppercase tracking-widest mb-2 text-gray-500">' . esc_html__( 'Yorumunuz *', 'burhan-ozalp' ) . '</label>
                                        <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required class="w-full bg-[#fcfaf7] border border-gray-200 p-4 focus:outline-none focus:border-[#8b6e4e] text-[#7b5f43] text-sm resize-none"></textarea>
                                      </div>',
            'comment_notes_before' => '<p class="text-xs md:text-sm text-gray-400 mb-8 italic">' . esc_html__( 'E-posta hesabınız yayımlanmayacak. Gerekli alanlar * ile işaretlenmiştir', 'burhan-ozalp' ) . '</p>',
            'class_form'           => 'comment-form space-y-6',
            'class_submit'         => 'submit bg-[#8b6e4e] text-white px-12 py-4 font-bold tracking-widest uppercase hover:bg-opacity-90 transition-all rounded-sm shadow-md cursor-pointer inline-block border-none',
            'title_reply'          => esc_html__( 'Bir Yanıt Bırakın', 'burhan-ozalp' ),
            'title_reply_to'       => esc_html__( '%s için Bir Yanıt Bırakın', 'burhan-ozalp' ),
            'cancel_reply_link'    => esc_html__( 'İptal Et', 'burhan-ozalp' ),
            'label_submit'         => esc_html__( 'Yorumu Gönder', 'burhan-ozalp' ),
            'submit_button'        => '<p class="form-submit pt-6">%1$s %2$s</p>',
        );

        // Cookies checkbox custom output
        $fields['cookies'] = '<div class="comment-form-cookies-consent flex items-start space-x-3 pt-2">
                                <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" class="mt-1 accent-[#8b6e4e] cursor-pointer">
                                <label for="wp-comment-cookies-consent" class="text-[10px] md:text-xs text-gray-400 cursor-pointer italic leading-tight">' . esc_html__( 'Bir dahaki sefere yorum yaptığımda kullanılmak üzere adımı, e-posta adresimi ve web site adresimi bu tarayıcıya kaydet.', 'burhan-ozalp' ) . '</label>
                             </div>';

        $args['fields'] = $fields;

        comment_form( $args );
        ?>

    </div>
</section>

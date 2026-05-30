<?php
/**
 * The template for displaying the blog/posts index page.
 * All texts are translatable for Loco Translate.
 *
 * @package burhan-ozalp
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<!-- Page Header -->
<section class="bg-[#dcd0c0] py-16 text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-['Cormorant_Garamond'] font-medium tracking-widest text-[#2d2a26] mb-4 uppercase">
            <?php 
            $posts_page_id = get_option( 'page_for_posts' );
            if ( $posts_page_id ) {
                echo esc_html( get_the_title( $posts_page_id ) );
            } else {
                echo esc_html__( 'Yazılar', 'burhan-ozalp' );
            }
            ?>
        </h2>
        <div class="flex items-center justify-center space-x-2 text-xs md:text-sm font-bold uppercase tracking-widest text-[#5c4a37]">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="text-[#5c4a37] hover:text-[#2d2a26] transition-colors"><? echo esc_html__( 'ANA SAYFA', 'burhan-ozalp' ); ?></a>
            <span class="text-[#2d2a26]/40">-</span>
            <span class="text-[#2d2a26] uppercase">
                <?php 
                if ( $posts_page_id ) {
                    echo esc_html( get_the_title( $posts_page_id ) );
                } else {
                    echo esc_html__( 'YAZILAR', 'burhan-ozalp' );
                }
                ?>
            </span>
        </div>
    </div>
</section>

<!-- Blog Grid -->
<section class="py-24 bg-white text-[#333]">
    <div class="container mx-auto px-4">
        
        <?php if ( have_posts() ) : ?>
            <div class="services-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
                <?php
                while ( have_posts() ) : the_post();
                    // Get primary category of the post to show as label
                    $post_cats = get_the_category();
                    $primary_cat_name = ! empty( $post_cats ) ? $post_cats[0]->name : esc_html__( 'İşlem', 'burhan-ozalp' );
                ?>
                    <div class="service-card group cursor-pointer" onclick="window.location='<?php the_permalink(); ?>'">
                        <div class="overflow-hidden mb-6 rounded-sm aspect-[4/3] relative bg-gray-200">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110', 'onerror' => "this.style.display='none';" ) ); ?>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-all"></div>
                            <div class="absolute bottom-6 left-6">
                                <span class="bg-[#8b6e4e] text-white px-3 py-1 text-[10px] uppercase font-bold tracking-[0.2em]"><?php echo esc_html( $primary_cat_name ); ?></span>
                            </div>
                        </div>
                        <h3 class="text-2xl font-['Cormorant_Garamond'] text-[#333] mb-3 group-hover:text-[#8b6e4e] transition-colors leading-tight uppercase font-bold tracking-widest"><?php the_title(); ?></h3>
                        <p class="text-base text-[#7b5f43] mb-6 leading-relaxed"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 15, '...' ) ); ?></p>
                        <a href="<?php the_permalink(); ?>" class="text-base font-bold tracking-[0.2em] text-[#8b6e4e] border-b border-[#8b6e4e] pb-1 uppercase hover:opacity-70 transition-all inline-block"><?php echo esc_html__( 'Detaylı Bilgi', 'burhan-ozalp' ); ?></a>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination block -->
            <div class="flex justify-center space-x-2 mt-16 text-sm font-bold tracking-widest uppercase py-4">
                <?php
                echo paginate_links( array(
                    'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                    'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                ) );
                ?>
            </div>

        <?php else : ?>
            <p class="text-[#7b5f43] italic text-lg text-center"><?php echo esc_html__( 'Henüz yazılmış bir içerik bulunamadı.', 'burhan-ozalp' ); ?></p>
        <?php endif; ?>

    </div>
</section>

<?php get_footer();

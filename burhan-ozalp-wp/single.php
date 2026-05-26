<?php
/**
 * The template for displaying all single posts.
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
        <h2 class="text-4xl md:text-5xl font-['Cormorant_Garamond'] font-light tracking-widest text-white mb-4 uppercase"><?php the_title(); ?></h2>
        <div class="flex items-center justify-center space-x-2 text-xs md:text-sm font-bold uppercase tracking-widest text-[#8b6e4e]">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors"><?php echo esc_html__( 'ANA SAYFA', 'burhan-ozalp' ); ?></a>
            <span>-</span>
            <span class="text-white uppercase"><?php the_title(); ?></span>
        </div>
    </div>
</section>

<!-- Detail Content Container -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4 max-w-5xl">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-16' ); ?>>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="rounded-sm overflow-hidden mb-12 shadow-xl">
                            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="prose max-w-none text-[#7b5f43] leading-relaxed text-lg">
                        <?php the_content(); ?>
                    </div>

                    <!-- Meta Tags -->
                    <div class="border-t border-b border-gray-100 py-4 my-10 flex flex-wrap justify-between text-xs font-bold uppercase tracking-widest text-gray-400">
                        <div>
                            <span><?php echo esc_html__( 'Tarih:', 'burhan-ozalp' ); ?></span>
                            <span class="text-[#8b6e4e] ml-2"><?php echo get_the_date(); ?></span>
                        </div>
                        <?php if ( has_tag() ) : ?>
                            <div>
                                <span><?php echo esc_html__( 'Etiketler:', 'burhan-ozalp' ); ?></span>
                                <span class="text-[#8b6e4e] ml-2"><?php the_tags( '', ', ' ); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                </article>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

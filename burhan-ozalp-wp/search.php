<?php
/**
 * The template for displaying search results pages.
 *
 * @package burhan-ozalp
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<main role="main">

<!-- Page Header -->
<section class="bg-[#dcd0c0] py-16 text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-['Cormorant_Garamond'] font-medium tracking-widest text-[#2d2a26] uppercase break-words" style="word-break: break-word;">
            <?php echo esc_html__( 'Arama Sonuçları', 'burhan-ozalp' ); ?>
        </h2>
    </div>
</section>

<!-- Search Section -->
<section class="py-24 bg-white min-h-[500px] text-[#333]">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <!-- Search field inside search.php -->
        <div class="mb-16">
            <form action="<?php echo esc_url( home_url('/') ); ?>" method="GET" class="flex flex-col md:flex-row shadow-sm rounded-sm overflow-hidden border border-gray-100">
                <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Kelime yazın ve arayın...', 'burhan-ozalp' ); ?>" class="flex-grow bg-[#fcfaf7] px-6 py-4 text-base focus:outline-none focus:border-[#8b6e4e] text-gray-700 font-medium border-0">
                <button type="submit" class="bg-[#8b6e4e] text-white px-10 py-4 font-bold tracking-widest uppercase hover:bg-[#7b5f43] transition-all cursor-pointer border-0"><?php echo esc_html__( 'ARA', 'burhan-ozalp' ); ?></button>
            </form>
        </div>

        <!-- Results List -->
        <div class="space-y-8">
            <?php if ( get_search_query() ) : ?>
                <div class="text-sm text-gray-400 italic mb-6">
                    <?php printf( esc_html__( 'Şunu aradınız: "%s"', 'burhan-ozalp' ), get_search_query() ); ?>
                </div>
            <?php endif; ?>
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="p-8 bg-[#fcfaf7] hover:bg-[#f8f6f3] border border-gray-100 rounded-sm transition-all text-left">
                        <h3 class="text-2xl font-['Cormorant_Garamond'] text-[#333] mb-2 font-bold uppercase tracking-wide">
                            <a href="<?php the_permalink(); ?>" class="hover:text-[#8b6e4e] transition-colors"><?php the_title(); ?></a>
                        </h3>
                        <p class="text-base text-[#7b5f43] leading-relaxed mb-4">
                            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 30, '...' ) ); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="text-sm font-bold tracking-[0.2em] text-[#8b6e4e] uppercase hover:underline inline-block"><?php echo esc_html__( 'Devamı &rarr;', 'burhan-ozalp' ); ?></a>
                    </div>
                <?php endwhile; ?>

                <!-- Pagination block -->
                <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                    <div class="flex justify-center space-x-2 mt-16 text-sm font-bold tracking-widest uppercase py-4">
                        <?php
                        echo paginate_links( array(
                            'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                            'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                        ) );
                        ?>
                    </div>
                <?php endif; ?>

            <?php else : ?>
                <!-- No results screen -->
                <div class="text-center py-20 bg-[#fcfaf7] rounded-sm p-10 border border-gray-100">
                    <i class="fa-solid fa-folder-open text-4xl text-gray-300 mb-6"></i>
                    <p class="text-lg text-gray-500 font-medium mb-4"><?php echo esc_html__( 'Aradığınız kelimeye ait sonuç bulunamadı.', 'burhan-ozalp' ); ?></p>
                    <p class="text-sm text-gray-400"><?php echo esc_html__( 'Lütfen farklı kelimelerle tekrar deneyiniz.', 'burhan-ozalp' ); ?></p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

</main>

<?php get_footer(); ?>

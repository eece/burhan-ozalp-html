<?php
/**
 * Main index template fallback.
 *
 * @package burhan-ozalp
 */

get_header(); ?>

<!-- Main Wrapper -->
<main role="main" class="py-16">
    <div class="container mx-auto px-4 max-w-5xl bg-white p-10 shadow-xl rounded-sm">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('prose max-w-none text-[#7b5f43] leading-relaxed'); ?>>
                    <h1 class="text-4xl md:text-5xl font-['Cormorant_Garamond'] text-[#333] mb-6 uppercase tracking-wider"><?php the_title(); ?></h1>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="mb-8 rounded-sm overflow-hidden shadow-md">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content text-base">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e( 'İçerik bulunamadı.', 'burhan-ozalp' ); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>

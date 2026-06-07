<?php
/**
 * The template for displaying all pages.
 *
 * @package burhan-ozalp
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Show/Hide Page Title setting
$hide_title = get_field('hide_page_title');
?>
<main role="main">
<?php
if ( ! $hide_title ) :
    ?>
    <!-- Page Header block with breadcrumbs -->
    <section class="bg-[#dcd0c0] py-16 text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-['Cormorant_Garamond'] font-medium tracking-widest text-[#2d2a26] uppercase break-words" style="word-break: break-word;"><?php the_title(); ?></h2>
        </div>
    </section>
<?php endif; ?>

<?php
// Main Content Slices Renderer
if ( have_rows('flexible_sections') ) :
    while ( have_rows('flexible_sections') ) : the_row();
        $layout = get_row_layout();
        
        // Include specific template part matching layout name
        get_template_part( 'template-parts/content', $layout );
    endwhile;
else :
    // Fallback if no ACF Flexible content exists: render standard Gutenberg editor content
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            ?>
            <section class="py-24 bg-white">
                <div class="container mx-auto px-4 max-w-5xl">
                    <div class="prose max-w-none text-[#7b5f43] leading-relaxed entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>
            <?php
        endwhile;
    endif;
endif;
?>
</main>

<?php get_footer(); ?>

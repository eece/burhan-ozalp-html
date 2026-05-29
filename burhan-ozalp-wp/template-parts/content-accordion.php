<?php
/**
 * Template part for displaying Accordion ACF layout.
 *
 * @package burhan-ozalp
 */

$title = get_sub_field('title');
?>

<!-- Accordion Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <?php if ( ! empty( $title ) ) : ?>
            <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] text-center text-[#8b6e4e] italic mb-12 tracking-wide">
                <?php echo esc_html( $title ); ?>
            </h2>
        <?php endif; ?>

        <?php if ( have_rows('accordion_items') ) : ?>
            <div class="accordion-group divide-y divide-gray-100 border-y border-gray-100">
                <?php while ( have_rows('accordion_items') ) : the_row(); 
                    $item_title = get_sub_field('title');
                    $item_content = get_sub_field('content');
                    if ( empty($item_title) ) continue;
                ?>
                    <div class="accordion-item py-4 transition-all duration-300">
                        <button class="accordion-trigger w-full flex items-center justify-between text-left group cursor-pointer focus:outline-none py-2">
                            <span class="text-base md:text-lg font-[#2d2a26] group-hover:text-[#8b6e4e] transition-colors duration-200 uppercase tracking-wider font-semibold">
                                <?php echo esc_html( $item_title ); ?>
                            </span>
                            <span class="accordion-icon ml-4 flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full border border-gray-200 group-hover:border-[#8b6e4e] group-hover:bg-[#f8f6f3] text-gray-400 group-hover:text-[#8b6e4e] transition-all duration-300">
                                <i class="fa-solid fa-plus text-xs transition-transform duration-300"></i>
                            </span>
                        </button>
                        <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="pt-4 pb-2 text-[#7b5f43] leading-relaxed prose max-w-none text-sm md:text-base entry-content">
                                <?php echo wp_kses_post( $item_content ); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
/**
 * Template part for displaying Rich Text ACF layout.
 *
 * @package burhan-ozalp
 */

$content = get_sub_field('editor_content');
if ( ! empty( $content ) ) :
?>
    <!-- Rich Text Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 max-w-5xl">
            <div class="prose max-w-none text-[#7b5f43] leading-relaxed">
                <?php echo wp_kses_post( $content ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

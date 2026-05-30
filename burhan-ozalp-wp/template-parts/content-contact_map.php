<?php
/**
 * Template part for displaying Contact Map ACF layout.
 *
 * @package burhan-ozalp
 */

$embed_url = get_sub_field('embed_url');
if ( ! empty( $embed_url ) ) :
?>
    <!-- Map Section -->
    <section class="w-full h-[450px] bg-gray-200">
        <iframe 
            src="<?php echo esc_url( $embed_url ); ?>" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>
<?php endif; ?>

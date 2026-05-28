<?php
/**
 * Template part for displaying Callback Bar block.
 *
 * @package burhan-ozalp
 */

$title = get_sub_field('title');
if ( empty( $title ) ) {
    $title = esc_html__( 'Numaranızı Bırakın Arayalım', 'burhan-ozalp' );
}

$cf7_shortcode = get_sub_field('cf7_shortcode');
?>

<!-- Callback Bar -->
<section class="bg-brand-light border-y border-gray-100 py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6 text-center lg:text-left">
            <h3 class="text-xl md:text-2xl font-['Cormorant_Garamond'] text-brand italic"><?php echo esc_html( $title ); ?></h3>
            <?php if ( ! empty( $cf7_shortcode ) ) : ?>
                <div class="w-full lg:w-auto">
                    <?php echo do_shortcode( $cf7_shortcode ); ?>
                </div>
            <?php else : ?>
                <form class="flex flex-wrap items-center gap-4 justify-center">
                    <input type="text" placeholder="<?php echo esc_attr__( 'Ad Soyad*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full sm:w-48 focus:outline-none focus:border-brand">
                    <input type="email" placeholder="<?php echo esc_attr__( 'E-posta*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full sm:w-44 focus:outline-none focus:border-brand">
                    <input type="text" placeholder="<?php echo esc_attr__( 'Ülke*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full sm:w-36 focus:outline-none focus:border-brand">
                    <input type="tel" placeholder="<?php echo esc_attr__( 'Telefon*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full sm:w-36 focus:outline-none focus:border-brand">
                    <select class="bg-white border-b border-gray-200 px-4 py-2.5 text-base text-gray-400 focus:outline-none w-full sm:w-36">
                        <option><?php echo esc_html__( 'Konu*', 'burhan-ozalp' ); ?></option>
                        <option><?php echo esc_html__( 'Burun Estetiği', 'burhan-ozalp' ); ?></option>
                        <option><?php echo esc_html__( 'Vücut Estetiği', 'burhan-ozalp' ); ?></option>
                    </select>
                    <button class="bg-brand text-white px-8 py-3 text-base font-bold tracking-widest hover:bg-opacity-90 transition-all uppercase rounded-sm cursor-pointer"><?php echo esc_html__( 'GÖNDER', 'burhan-ozalp' ); ?></button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

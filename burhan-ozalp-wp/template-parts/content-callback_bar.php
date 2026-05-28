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
?>

<!-- Callback Bar -->
<section class="bg-[#f8f6f3] border-y border-gray-100 py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6 text-center lg:text-left">
            <h3 class="text-xl md:text-2xl font-['Cormorant_Garamond'] text-[#8b6e4e] italic"><?php echo esc_html( $title ); ?></h3>
            <form class="flex flex-wrap items-center gap-4 justify-center">
                <input type="text" placeholder="<?php echo esc_attr__( 'Ad Soyad*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full sm:w-48 focus:outline-none focus:border-[#8b6e4e]">
                <input type="email" placeholder="<?php echo esc_attr__( 'E-posta*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full sm:w-44 focus:outline-none focus:border-[#8b6e4e]">
                <input type="text" placeholder="<?php echo esc_attr__( 'Ülke*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full sm:w-36 focus:outline-none focus:border-[#8b6e4e]">
                <input type="tel" placeholder="<?php echo esc_attr__( 'Telefon*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full sm:w-36 focus:outline-none focus:border-[#8b6e4e]">
                <select class="bg-white border-b border-gray-200 px-4 py-2.5 text-base text-gray-400 focus:outline-none w-full sm:w-36">
                    <option><?php echo esc_html__( 'Konu*', 'burhan-ozalp' ); ?></option>
                    <option><?php echo esc_html__( 'Burun Estetiği', 'burhan-ozalp' ); ?></option>
                    <option><?php echo esc_html__( 'Vücut Estetiği', 'burhan-ozalp' ); ?></option>
                </select>
                <button class="bg-[#8b6e4e] text-white px-8 py-3 text-base font-bold tracking-widest hover:bg-opacity-90 transition-all uppercase rounded-sm cursor-pointer"><?php echo esc_html__( 'GÖNDER', 'burhan-ozalp' ); ?></button>
            </form>
        </div>
    </div>
</section>

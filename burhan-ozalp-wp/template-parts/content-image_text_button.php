<?php
/**
 * Template part for displaying Biography block.
 *
 * @package burhan-ozalp
 */

$label = get_sub_field('label');
$bio_title = get_sub_field('title');
$image = get_sub_field('image');
$content = get_sub_field('content');
$button_link = get_sub_field('button_link');
$image_position = get_sub_field('image_position');

// Sane default fallbacks
if ( empty( $label ) ) $label = esc_html__( 'BİYOGRAFİ', 'burhan-ozalp' );
if ( empty( $bio_title ) ) $bio_title = esc_html__( 'DOÇ. DR. BURHAN ÖZALP', 'burhan-ozalp' );
if ( empty( $image ) ) $image = 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&q=80&w=800';
if ( empty( $image_position ) ) $image_position = 'left';

$btn_url = '#';
$btn_text = esc_html__( 'BİYOGRAFİ', 'burhan-ozalp' );
$btn_target = '_self';

if ( ! empty( $button_link ) && is_array( $button_link ) ) {
    $btn_url = ! empty( $button_link['url'] ) ? $button_link['url'] : '#';
    $btn_text = ! empty( $button_link['title'] ) ? $button_link['title'] : esc_html__( 'BİYOGRAFİ', 'burhan-ozalp' );
    $btn_target = ! empty( $button_link['target'] ) ? $button_link['target'] : '_self';
}

$row_class = 'container mx-auto px-4 flex flex-col lg:flex-row items-center gap-16';
if ( $image_position === 'right' ) {
    $row_class = 'container mx-auto px-4 flex flex-col lg:flex-row-reverse items-center gap-16';
}
?>

<!-- Biography Section -->
<section class="py-24 bg-white relative overflow-hidden text-center lg:text-left">
    <div class="<?php echo esc_attr( $row_class ); ?>">
        <div class="w-full lg:w-1/2 relative z-10">
            <div class="relative inline-block">
                <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $bio_title ); ?>" class="rounded-sm shadow-2xl relative z-10 max-w-full h-auto">
                <div class="absolute -top-10 -left-10 w-full h-full bg-[#f8f6f3] -z-10 rounded-sm"></div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 animate-fade-in text-left">
            <span class="text-base uppercase font-bold tracking-[0.4em] text-[#8b6e4e] mb-4 block text-center lg:text-left"><?php echo esc_html( $label ); ?></span>
            <h2 class="text-4xl md:text-6xl font-light font-['Cormorant_Garamond'] text-[#333] mb-8 tracking-wider text-center lg:text-left"><?php echo esc_html( $bio_title ); ?></h2>
            <div class="prose text-[#7b5f43] leading-relaxed max-w-lg mb-10 mx-auto lg:mx-0 text-lg">
                <?php 
                if ( ! empty( $content ) ) {
                    echo wp_kses_post( $content );
                } else {
                    echo '<p class="mb-4">' . esc_html__( "Neo Estetik İstanbul Cerrahi Kliniği'nin kurucusu DOÇ. DR. BURHAN ÖZALP 1980 yılında İstanbul'da doğmuştur. İlk, orta ve lise eğitimini İstanbul'da tamamladıktan sonra girdiği üniversite sınavında üstün başarı elde ederek tıp camiasının en köklü ve saygın kurumlarından olan İstanbul Tıp Fakültesi'nde (Çapa Tıp Fakültesi) tıp eğitimine başlamış ve 2004 yılında tıp doktoru ünvanını almıştır.", 'burhan-ozalp' ) . '</p>';
                }
                ?>
            </div>
            <div class="text-center lg:text-left">
                <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="inline-block px-10 py-3 border-2 border-[#8b6e4e] text-[#8b6e4e] text-base font-black tracking-[0.2em] transform hover:bg-[#8b6e4e] hover:text-white transition-all uppercase rounded-sm"><?php echo esc_html( $btn_text ); ?></a>
            </div>
        </div>
    </div>
    <!-- Hexagon pattern background -->
    <div class="absolute right-0 bottom-0 opacity-5 -z-0 pointer-events-none">
         <svg width="400" height="400" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M50 0L93.3013 25V75L50 100L6.69873 75V25L50 0Z" stroke="currentColor" stroke-width="0.5"/>
            <path d="M50 20L75.9808 35V65L50 80L24.0192 65V35L50 20Z" stroke="currentColor" stroke-width="0.5"/>
         </svg>
    </div>
</section>

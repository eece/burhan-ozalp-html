<?php
/**
 * Template part for displaying Hero Slider ACF layout.
 *
 * @package burhan-ozalp
 */

if ( have_rows('slides') ) :
?>
    <!-- Hero Slider Slayt Gösterisi Seksiyonu -->
    <section class="relative h-[400px] md:h-[600px] bg-gray-200 overflow-hidden">
        <div class="hero-slider relative h-full">
            <?php 
            $slide_index = 0;
            while ( have_rows('slides') ) : the_row();
                $image = get_sub_field('image');
                $subtitle = get_sub_field('subtitle');
                $title = get_sub_field('title');
                $btn_text = get_sub_field('btn_text');
                $btn_url = get_sub_field('btn_url');
                
                // Fallback default sample images
                if ( empty($image) ) {
                    $image = 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&q=80&w=2000';
                }
            ?>
                <!-- Slide <?php echo $slide_index + 1; ?> -->
                <div class="slide absolute inset-0 <?php echo $slide_index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?> transition-opacity duration-1000">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url( $image ); ?>');"></div>
                    <div class="absolute inset-0 bg-gradient-to-l from-black/40 via-black/20 to-transparent"></div>
                    <div class="container mx-auto h-full px-4 flex flex-col justify-center items-end text-right relative z-10">
                        <div class="max-w-xl animate-fade-in-right">
                            <?php if ( ! empty( $subtitle ) ) : ?>
                                <span class="block text-2xl md:text-3xl font-medium text-white tracking-widest font-['Cormorant_Garamond'] mb-4 drop-shadow-md"><?php echo esc_html( $subtitle ); ?></span>
                            <?php endif; ?>
                            <?php if ( ! empty( $title ) ) : ?>
                                <h2 class="text-4xl md:text-7xl font-bold font-['Cormorant_Garamond'] text-white leading-tight mb-8 uppercase drop-shadow-lg"><?php echo nl2br( esc_html( $title ) ); ?></h2>
                            <?php endif; ?>
                            <?php if ( ! empty( $btn_text ) ) : ?>
                                <a href="<?php echo esc_url( $btn_url ); ?>" class="inline-block px-10 py-3 bg-[#8b6e4e] text-white text-base font-bold tracking-[0.2em] transform hover:bg-[#7b5f43] hover:scale-105 transition-all uppercase rounded-sm shadow-xl"><?php echo esc_html( $btn_text ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php 
                $slide_index++;
            endwhile; 
            ?>
        </div>
        
        <?php if ( $slide_index > 1 ) : ?>
            <button class="slider-prev absolute left-4 md:left-8 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-[#8b6e4e] hover:text-white p-3 text-[#8b6e4e] rounded-full shadow-lg transition-all cursor-pointer z-35">
                <i class="fa-solid fa-chevron-left text-lg"></i>
            </button>
            <button class="slider-next absolute right-4 md:right-8 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-[#8b6e4e] hover:text-white p-3 text-[#8b6e4e] rounded-full shadow-lg transition-all cursor-pointer z-35">
                <i class="fa-solid fa-chevron-right text-lg"></i>
            </button>

            <!-- Slider Dots -->
            <div class="slider-dots absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3 z-30">
                <?php for ( $i = 0; $i < $slide_index; $i++ ) : ?>
                    <div class="dot w-3 h-3 border border-[#8b6e4e] rounded-full cursor-pointer transition-all <?php echo $i === 0 ? 'bg-[#8b6e4e]' : 'hover:bg-[#8b6e4e]/50'; ?>"></div>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>

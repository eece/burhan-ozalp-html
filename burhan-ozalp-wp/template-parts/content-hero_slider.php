<?php
/**
 * Template part for displaying Hero Slider ACF layout.
 *
 * @package burhan-ozalp
 */

if ( have_rows('slides') ) :
?>
    <!-- Hero Slider Slayt Gösterisi Seksiyonu -->
    <section class="relative h-[400px] md:h-[600px] bg-lightBrown overflow-hidden">
        <div class="hero-slider relative h-full">
            <?php 
            $slide_index = 0;
            while ( have_rows('slides') ) : the_row();
                $image_desktop = get_sub_field('image');
                $image_mobile = get_sub_field('image_mobile');
                $subtitle = get_sub_field('subtitle');
                $title = get_sub_field('title');
                $btn_text = get_sub_field('btn_text');
                $btn_url_field = get_sub_field('btn_url');
                $btn_url = '#';
                $btn_target = '_self';
                
                if ( ! empty( $btn_url_field ) ) {
                    if ( is_array( $btn_url_field ) ) {
                        $btn_url = ! empty( $btn_url_field['url'] ) ? $btn_url_field['url'] : '#';
                        $btn_target = ! empty( $btn_url_field['target'] ) ? $btn_url_field['target'] : '_self';
                        if ( empty( $btn_text ) && ! empty( $btn_url_field['title'] ) ) {
                            $btn_text = $btn_url_field['title'];
                        }
                    } else {
                        $btn_url = $btn_url_field;
                    }
                }
                
                // Fallback default sample images
                if ( empty($image_desktop) ) {
                    $image_desktop = 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&q=80&w=2000';
                }
                if ( empty($image_mobile) ) {
                    $image_mobile = $image_desktop;
                }
            ?>
                <!-- Slide <?php echo $slide_index + 1; ?> -->
                <div class="slide absolute inset-0 <?php echo $slide_index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?> transition-opacity duration-1000">
                    <!-- Desktop background image -->
                    <div class="absolute inset-y-0 left-0 w-full md:max-w-[55%] bg-cover bg-center hidden md:block" style="background-image: url('<?php echo esc_url( $image_desktop ); ?>');"></div>
                    <!-- Mobile background image -->
                    <div class="absolute inset-0 bg-cover bg-center md:hidden" style="background-image: url('<?php echo esc_url( $image_mobile ); ?>');"></div>
                    <div class="container mx-auto h-full px-4 flex flex-col justify-center items-end rtl:items-start text-right rtl:text-right relative z-10">
                        <div class="max-w-xl animate-fade-in-right text-right rtl:text-right">
                            <?php if ( ! empty( $subtitle ) ) : ?>
                                <span class="block text-lg md:text-3xl font-medium text-white tracking-widest font-['Cormorant_Garamond'] mb-4 drop-shadow-md [text-shadow:_0_2px_10px_rgba(0,0,0,0.95)] text-right rtl:text-right"><?php echo esc_html( $subtitle ); ?></span>
                            <?php endif; ?>
                            <?php if ( ! empty( $title ) ) : ?>
                                <h2 class="text-2xl sm:text-4xl md:text-7xl font-bold font-['Cormorant_Garamond'] text-white leading-tight mb-8 uppercase drop-shadow-lg [text-shadow:_0_2px_15px_rgba(0,0,0,0.95)] text-right rtl:text-right"><?php echo nl2br( esc_html( $title ) ); ?></h2>
                            <?php endif; ?>
                            <?php if ( ! empty( $btn_text ) ) : ?>
                                <div class="text-right rtl:text-right">
                                    <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="inline-block px-10 py-3 bg-[#8b6e4e] text-white text-base font-bold tracking-[0.2em] transform hover:bg-[#7b5f43] hover:scale-105 transition-all uppercase rounded-sm shadow-xl"><?php echo esc_html( $btn_text ); ?></a>
                                </div>
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
            <button class="hidden md:block slider-prev absolute left-4 md:left-8 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-[#8b6e4e] hover:text-white p-3 text-[#8b6e4e] rounded-full shadow-lg transition-all cursor-pointer z-35" aria-label="<?php echo esc_attr__( 'Önceki slayt', 'burhan-ozalp' ); ?>">
                <i class="fa-solid fa-chevron-left text-lg"></i>
            </button>
            <button class="hidden md:block slider-next absolute right-4 md:right-8 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-[#8b6e4e] hover:text-white p-3 text-[#8b6e4e] rounded-full shadow-lg transition-all cursor-pointer z-35" aria-label="<?php echo esc_attr__( 'Sonraki slayt', 'burhan-ozalp' ); ?>">
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

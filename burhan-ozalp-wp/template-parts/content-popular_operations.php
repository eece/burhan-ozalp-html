<?php
/**
 * Template part for displaying Popular Operations block.
 *
 * @package burhan-ozalp
 */

$title = get_sub_field('title');
if ( empty( $title ) ) {
    $title = esc_html__( 'POPÜLER ESTETİK OPERASYONLAR', 'burhan-ozalp' );
}
?>

<!-- Popular Operations -->
<section class="py-24 bg-[#7b5f43]">
    <div class="container mx-auto px-4">
        <h2 class="text-center text-white text-3xl font-['Cormorant_Garamond'] tracking-widest mb-16 uppercase"><?php echo esc_html( $title ); ?></h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <?php 
            if ( have_rows('items') ) :
                while ( have_rows('items') ) : the_row();
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
                    $op_title = '';
                    $link_url = '#';
                    $link_target = '_self';
                    if ( ! empty( $link ) && is_array( $link ) ) {
                        $link_url    = $link['url'];
                        $op_title    = ! empty( $link['title'] ) ? $link['title'] : '';
                        $link_target = ! empty( $link['target'] ) ? $link['target'] : '_self';
                    } elseif ( ! empty( $link ) && is_string( $link ) ) {
                        $link_url    = $link;
                    }
                    
                    // Fallback if ACF row image is empty
                    if ( empty($image) ) {
                        $image = 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&q=80&w=300';
                    }
            ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="bg-white border border-white/5 group p-10 flex flex-col items-center justify-center text-center transition-all hover:shadow-2xl hover:border-[#8b6e4e]/40 hover:-translate-y-2">
                        <div class="w-20 h-20 mb-6 flex items-center justify-center overflow-hidden rounded-full border border-gray-100 bg-gray-50 transform transition-transform group-hover:scale-110 duration-300">
                            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $op_title ); ?>" class="w-full h-full object-cover">
                        </div>
                        <span class="text-sm font-bold tracking-widest text-[#333] group-hover:text-[#8b6e4e] transition-colors uppercase"><?php echo esc_html( $op_title ); ?></span>
                    </a>
            <?php 
                endwhile;
            else :
                // Fallback static list matching HTML index.html
                $fallbacks = array(
                    array('image' => 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&q=80&w=300', 'title' => 'BURUN ESTETİĞİ', 'link' => '#'),
                    array('image' => 'https://images.unsplash.com/photo-1518310383802-640c2de311b2?auto=format&fit=crop&q=80&w=300', 'title' => 'LİPOSUCTİON', 'link' => '#'),
                    array('image' => 'https://images.unsplash.com/photo-1583424185161-0ae796d8c2bd?auto=format&fit=crop&q=80&w=300', 'title' => 'GÖĞÜS ESTETİĞİ', 'link' => '#'),
                    array('image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&q=80&w=300', 'title' => 'KARIN GERME', 'link' => '#'),
                    array('image' => 'https://images.unsplash.com/photo-1511556532299-8f662fc26c06?auto=format&fit=crop&q=80&w=300', 'title' => 'GÖZ KAPAĞI', 'link' => '#'),
                    array('image' => 'https://images.unsplash.com/photo-1506152983158-b4a74a01c721?auto=format&fit=crop&q=80&w=300', 'title' => 'JİNEKOMASTİ', 'link' => '#'),
                    array('image' => 'https://images.unsplash.com/photo-1519699047748-de8e457a634e?auto=format&fit=crop&q=80&w=300', 'title' => 'BBL - POPU', 'link' => '#'),
                    array('image' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&q=80&w=300', 'title' => 'YÜZ GERME', 'link' => '#'),
                    array('image' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&q=80&w=300', 'title' => 'KEPÇE KULAK', 'link' => '#'),
                    array('image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&q=80&w=300', 'title' => 'YAĞ ENJEKSİYONU', 'link' => '#'),
                );
                foreach ( $fallbacks as $fb ) :
            ?>
                    <a href="<?php echo esc_url( $fb['link'] ); ?>" class="bg-white border border-white/5 group p-10 flex flex-col items-center justify-center text-center transition-all hover:shadow-2xl hover:border-[#8b6e4e]/40 hover:-translate-y-2">
                        <div class="w-20 h-20 mb-6 flex items-center justify-center overflow-hidden rounded-full border border-gray-100 bg-gray-50 transform transition-transform group-hover:scale-110 duration-300">
                            <img src="<?php echo esc_url( $fb['image'] ); ?>" alt="<?php echo esc_attr( $fb['title'] ); ?>" class="w-full h-full object-cover">
                        </div>
                        <span class="text-sm font-bold tracking-widest text-[#333] group-hover:text-[#8b6e4e] transition-colors uppercase"><?php echo esc_html( $fb['title'] ); ?></span>
                    </a>
            <?php 
                endforeach;
            endif; 
            ?>
        </div>
    </div>
</section>

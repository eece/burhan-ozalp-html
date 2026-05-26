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
                    $icon = get_sub_field('icon_class');
                    $op_title = get_sub_field('title');
                    $link = get_sub_field('link');
            ?>
                    <a href="<?php echo esc_url( $link ); ?>" class="bg-white border border-white/5 group p-10 flex flex-col items-center justify-center text-center transition-all hover:shadow-2xl hover:border-[#8b6e4e]/40 hover:-translate-y-2">
                        <div class="w-16 h-16 mb-6 flex items-center justify-center transform transition-transform">
                            <i class="fa-solid <?php echo esc_attr( $icon ); ?> text-5xl text-[#7b5f43] transition-colors"></i>
                        </div>
                        <span class="text-sm font-bold tracking-widest text-[#333] group-hover:text-[#8b6e4e] transition-colors uppercase"><?php echo esc_html( $op_title ); ?></span>
                    </a>
            <?php 
                endwhile;
            else :
                // Fallback static list matching HTML index.html
                $fallbacks = array(
                    array('icon' => 'fa-face-smile', 'title' => 'BURUN ESTETİĞİ', 'link' => '#'),
                    array('icon' => 'fa-person', 'title' => 'LİPOSUCTİON', 'link' => '#'),
                    array('icon' => 'fa-venus', 'title' => 'GÖĞÜS ESTETİĞİ', 'link' => '#'),
                    array('icon' => 'fa-child', 'title' => 'KARIN GERME', 'link' => '#'),
                    array('icon' => 'fa-eye', 'title' => 'GÖZ KAPAĞI', 'link' => '#'),
                    array('icon' => 'fa-mars', 'title' => 'JİNEKOMASTİ', 'link' => '#'),
                    array('icon' => 'fa-person-rays', 'title' => 'BBL - POPU', 'link' => '#'),
                    array('icon' => 'fa-face-smile-beam', 'title' => 'YÜZ GERME', 'link' => '#'),
                    array('icon' => 'fa-ear-listen', 'title' => 'KEPÇE KULAK', 'link' => '#'),
                    array('icon' => 'fa-droplet', 'title' => 'YAĞ ENJEKSİYONU', 'link' => '#'),
                );
                foreach ( $fallbacks as $fb ) :
            ?>
                    <a href="<?php echo esc_url( $fb['link'] ); ?>" class="bg-white border border-white/5 group p-10 flex flex-col items-center justify-center text-center transition-all hover:shadow-2xl hover:border-[#8b6e4e]/40 hover:-translate-y-2">
                        <div class="w-16 h-16 mb-6 flex items-center justify-center transform transition-transform">
                            <i class="fa-solid <?php echo esc_attr( $fb['icon'] ); ?> text-5xl text-[#7b5f43] transition-colors"></i>
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

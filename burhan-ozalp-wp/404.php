<?php
/**
 * The template for displaying 404 pages (Not Found).
 * All texts are translatable for Loco Translate.
 *
 * @package burhan-ozalp
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<!-- Error Hero -->
<section class="py-24 bg-white flex flex-col items-center justify-center min-h-[600px] border-b border-gray-100 text-[#333]">
    <div class="container mx-auto px-4 max-w-xl text-center">
        <!-- 404 display label -->
        <div class="text-[120px] md:text-[180px] font-['Cormorant_Garamond'] font-light text-[#8b6e4e] leading-none mb-4 select-none animate-pulse-slow">
            404
        </div>
        
        <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-bold text-[#333] tracking-widest uppercase mb-6 leading-snug">
            <?php esc_html_e( 'Aradığınız Sayfa Bulunamadı', 'burhan-ozalp' ); ?>
        </h2>
        
        <p class="text-base text-[#7b5f43] leading-relaxed mb-10 font-medium">
            <?php esc_html_e( 'Ulaşmaya çalıştığınız sayfa silinmiş, ismi değiştirilmiş veya geçici olarak servis dışı kalmış olabilir. Aradığınız işlemi bulmak için aşağıdaki arama çubuğunu kullanabilir ya da doğrudan ana sayfaya dönebilirsiniz.', 'burhan-ozalp' ); ?>
        </p>

        <!-- 404 inline Search Box -->
        <div class="mb-12">
            <form action="<?php echo esc_url( home_url('/') ); ?>" method="GET" class="flex shadow-sm rounded-sm overflow-hidden border border-gray-100">
                <input type="text" name="s" placeholder="<?php echo esc_attr__( 'Aramak istediğiniz kelime...', 'burhan-ozalp' ); ?>" class="flex-grow bg-[#fcfaf7] px-5 py-3.5 text-sm focus:outline-none focus:border-[#8b6e4e] text-gray-700 font-medium border-0">
                <button type="submit" class="bg-[#8b6e4e] text-white px-8 font-bold tracking-widest uppercase hover:bg-[#7b5f43] transition-all cursor-pointer border-0"><?php esc_html_e( 'ARA', 'burhan-ozalp' ); ?></button>
            </form>
        </div>


    </div>
</section>

<?php get_footer(); ?>

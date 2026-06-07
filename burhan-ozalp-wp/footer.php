<?php
/**
 * Doç. Dr. Burhan Özalp WordPress Theme Footer
 *
 * @package burhan-ozalp
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get Option values
$address = burhan_get_option('office_address', 'Hamidiye, Cendere Cad. Kordon İstanbul Güzelyalı Sitesi No: 49, 34038 Kağıthane/İstanbul');
$logo_title = burhan_get_option('logo_title', 'BURHAN ÖZALP');
$logo_subtitle = burhan_get_option('logo_subtitle', 'Doc.Dr.');
$phone = burhan_get_option('phone_number', '+90 532 157 05 77');
$sec_phone = burhan_get_option('secondary_phone', '+90 212 261 12 12');
$directions_url = burhan_get_option('directions_url', '#');
$whatsapp_phone = burhan_get_option('whatsapp_number', '905321570577');
$copyright = burhan_get_option('copyright_text', '© 2025 Tüm Hakları Doç. Dr. Burhan Özalp\'a Aittir.');
$disclaimer = burhan_get_option('disclaimer_text', 'Bu sitede yer alan makaleler tamamen bilgilendirme amaçlı olup, tanı ve tedavi amacıyla kullanılamaz. Tüm sağlık sorunları için doktorunuza başvurunuz.');

$facebook = burhan_get_option('facebook_url', '#');
$instagram = burhan_get_option('instagram_url', '#');
$youtube = burhan_get_option('youtube_url', '#');

$footer_menu_title = esc_html__( 'HIZLI LİNKLER', 'burhan-ozalp' );
$locations = get_nav_menu_locations();
if ( isset( $locations['footer_menu'] ) ) {
    $menu_id = $locations['footer_menu'];
    $menu_object = wp_get_nav_menu_object( $menu_id );
    if ( $menu_object && ! empty( $menu_object->name ) ) {
        $footer_menu_title = $menu_object->name;
    }
}
?>

    <!-- Footer -->
    <footer role="contentinfo" class="bg-white pt-24 pb-12 border-t border-gray-100 text-[#333]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 mb-20 text-center lg:text-left rtl:lg:text-right">
                <!-- Branding & Address -->
                <div class="w-full flex flex-col items-center lg:items-start rtl:lg:items-start rtl:items-start">
                   <h2 class="w-full text-3xl font-['Cormorant_Garamond'] tracking-widest text-[#333] font-light leading-none mb-10 text-center lg:text-left rtl:lg:text-right rtl:text-right" dir="ltr">
                        <span class="block text-base font-['Montserrat'] font-semibold text-[#8b6e4e] tracking-[0.3em] mb-1 uppercase text-center lg:text-left rtl:lg:text-right rtl:text-right"><?php echo esc_html( $logo_subtitle ); ?></span>
                        <span class="block text-center lg:text-left rtl:lg:text-right rtl:text-right"><?php echo esc_html( $logo_title ); ?></span>
                    </h2>
                    <div class="text-base text-gray-800 space-y-6 leading-relaxed w-full flex flex-col items-center lg:items-start rtl:lg:items-start rtl:items-start text-center lg:text-left rtl:lg:text-right rtl:text-right">
                        <div class="w-full flex flex-col lg:flex-row items-center lg:items-start rtl:items-start rtl:lg:items-start text-center lg:text-left rtl:lg:text-right rtl:text-right">
                            <i class="fa-solid fa-location-dot text-sm mb-2 lg:mb-0 lg:mr-3 rtl:lg:mr-0 rtl:lg:ml-3 text-[#8b6e4e] mt-0.5 shrink-0"></i>
                            <div class="w-full">
                                <span class="block font-bold mb-1 uppercase text-gray-800"><?php echo esc_html__( 'Muayenehane Adresi:', 'burhan-ozalp' ); ?></span>
                                <span class="text-gray-700 font-medium"><?php echo esc_html( $address ); ?></span>
                            </div>
                        </div>
                        <div class="w-full flex flex-col lg:flex-row items-center lg:items-start rtl:items-start rtl:lg:items-start text-center lg:text-left rtl:lg:text-right rtl:text-right">
                            <i class="fa-solid fa-phone text-sm mb-2 lg:mb-0 lg:mr-3 rtl:lg:mr-0 rtl:lg:ml-3 text-[#8b6e4e] mt-0.5 shrink-0"></i>
                            <div class="w-full">
                                <span class="block font-bold mb-1 uppercase text-gray-800"><?php echo esc_html__( 'Telefonlar:', 'burhan-ozalp' ); ?></span>
                                <div class="flex flex-col items-center lg:items-start rtl:lg:items-start text-gray-800 font-bold gap-1 text-base" dir="ltr">
                                    <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $phone) ); ?>" class="hover:text-[#8b6e4e] text-gray-800 transition-colors inline-block"><?php echo esc_html( $phone ); ?></a>
                                    <?php if ( ! empty( $sec_phone ) ) : ?>
                                        <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $sec_phone) ); ?>" class="hover:text-[#8b6e4e] text-gray-800 transition-colors inline-block"><?php echo esc_html($sec_phone); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4 w-full flex justify-center lg:justify-start rtl:justify-start rtl:lg:justify-start">
                            <a href="<?php echo esc_url( $directions_url ); ?>" target="_blank" class="bg-brandGreen text-white px-8 py-3 rounded-sm flex items-center justify-center w-full sm:w-auto font-bold tracking-widest uppercase hover:bg-opacity-90 transition-all text-xs">
                                <i class="fa-solid fa-check text-xs mr-2 rtl:mr-0 rtl:ml-2"></i> <?php echo esc_html__( 'YOL TARİFİ', 'burhan-ozalp' ); ?>
                            </a>
                        </div>
                        <div class="w-full flex gap-4 pt-4 justify-center lg:justify-start rtl:justify-start rtl:lg:justify-start">
                            <?php if ( ! empty( $facebook ) ) : ?>
                                <a href="<?php echo esc_url( $facebook ); ?>" class="w-10 h-10 border border-gray-200 rounded-full flex items-center justify-center hover:bg-[#8b6e4e] hover:text-white hover:border-[#8b6e4e] transition-all" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f text-lg"></i></a>
                            <?php endif; ?>
                            <?php if ( ! empty( $instagram ) ) : ?>
                                <a href="<?php echo esc_url( $instagram ); ?>" class="w-10 h-10 border border-gray-200 rounded-full flex items-center justify-center hover:bg-[#8b6e4e] hover:text-white hover:border-[#8b6e4e] transition-all" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram text-lg"></i></a>
                            <?php endif; ?>
                            <?php if ( ! empty( $youtube ) ) : ?>
                                <a href="<?php echo esc_url( $youtube ); ?>" class="w-10 h-10 border border-gray-200 rounded-full flex items-center justify-center hover:bg-[#8b6e4e] hover:text-white hover:border-[#8b6e4e] transition-all" target="_blank" aria-label="YouTube"><i class="fa-brands fa-youtube text-lg"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Quick Services -->
                <div class="flex flex-col">
                    <h4 class="text-base font-bold tracking-[0.2em] text-[#8b6e4e] mb-6 uppercase text-center lg:text-left rtl:lg:text-right rtl:text-right"><?php echo esc_html($footer_menu_title); ?></h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-center lg:text-left rtl:lg:text-right rtl:text-right">
                        <?php
                        $footer_menu_items = array();
                        $locations = get_nav_menu_locations();
                        if ( isset( $locations['footer_menu'] ) ) {
                            $menu_id = $locations['footer_menu'];
                            $raw_footer_items = wp_get_nav_menu_items( $menu_id );
                            if ( ! empty( $raw_footer_items ) ) {
                                foreach ( $raw_footer_items as $item ) {
                                    $footer_menu_items[] = array(
                                        'title'  => $item->title,
                                        'url'    => $item->url,
                                        'target' => ! empty( $item->target ) ? $item->target : '_self',
                                    );
                                }
                            }
                        }

                        // If a menu is registered in WP, split it into two lists
                        if ( ! empty( $footer_menu_items ) ) {
                            $count = count( $footer_menu_items );
                            $half = ceil( $count / 2 );
                            $footer_col1_rendered_links = array_slice( $footer_menu_items, 0, $half );
                            $footer_col2_rendered_links = array_slice( $footer_menu_items, $half );
                        } else {
                            // Fall back to static values
                            $footer_col1_rendered_links = array();
                            // Static fallbacks for column 1
                            $static_c1 = array(
                                __('Burun Estetiği', 'burhan-ozalp'),
                                __('Göğüs Estetiği', 'burhan-ozalp'),
                                __('Göğüs Büyütme', 'burhan-ozalp'),
                                __('Jinekomasti', 'burhan-ozalp'),
                                __('Karın Germe', 'burhan-ozalp')
                             );
                            foreach ($static_c1 as $title) {
                                $footer_col1_rendered_links[] = array('title' => $title, 'url' => '#', 'target' => '_self');
                            }

                            $footer_col2_rendered_links = array();
                            // Static fallbacks for column 2
                            $static_c2 = array(
                                __('Brezilya Poposu', 'burhan-ozalp'),
                                __('Boyun Germe', 'burhan-ozalp'),
                                __('Faça / Jilet İzi', 'burhan-ozalp'),
                                __('Kepçe Kulak Estetiği', 'burhan-ozalp'),
                                __('Yağ Enjeksiyonu', 'burhan-ozalp')
                            );
                            foreach ($static_c2 as $title) {
                                $footer_col2_rendered_links[] = array('title' => $title, 'url' => '#', 'target' => '_self');
                            }
                        }
                        ?>
                        <div>
                            <ul class="text-base font-semibold text-gray-700 uppercase tracking-wider space-y-4 list-none pl-0 pr-0">
                                <?php foreach ( $footer_col1_rendered_links as $link ) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" class="hover:text-[#8b6e4e] inline-block lg:inline-flex lg:items-center lg:justify-start rtl:lg:justify-start transition-all text-gray-700 hover:text-[#8b6e4e]">
                                            <i class="fa-solid fa-chevron-right text-[10px] mr-2 rtl:mr-0 rtl:ml-2 rtl:!hidden text-[#8b6e4e] inline-block align-middle mb-0.5"></i>
                                            <i class="fa-solid fa-chevron-left text-[10px] ml-2 !hidden rtl:!inline-block text-[#8b6e4e] inline-block align-middle mb-0.5"></i>
                                            <span class="inline align-middle"><?php echo esc_html($link['title']); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div>
                            <ul class="text-base font-semibold text-gray-700 uppercase tracking-wider space-y-4 list-none pl-0 pr-0">
                                <?php foreach ( $footer_col2_rendered_links as $link ) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" class="hover:text-[#8b6e4e] inline-block lg:inline-flex lg:items-center lg:justify-start rtl:lg:justify-start transition-all text-gray-700 hover:text-[#8b6e4e]">
                                            <i class="fa-solid fa-chevron-right text-[10px] mr-2 rtl:mr-0 rtl:ml-2 rtl:!hidden text-[#8b6e4e] inline-block align-middle mb-0.5"></i>
                                            <i class="fa-solid fa-chevron-left text-[10px] ml-2 !hidden rtl:!inline-block text-[#8b6e4e] inline-block align-middle mb-0.5"></i>
                                            <span class="inline align-middle"><?php echo esc_html($link['title']); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Footer -->
                <div class="bg-[#f8f6f3] p-8 rounded-sm text-center lg:text-left rtl:lg:text-right rtl:text-right">
                    <h4 class="text-base font-bold tracking-[0.2em] text-[#8b6e4e] mb-6 uppercase text-center lg:text-left rtl:lg:text-right rtl:text-right"><?php echo esc_html__( 'Numaranızı Bırakın Arayalım !', 'burhan-ozalp' ); ?></h4>
                    <?php 
                    $footer_form_shortcode = burhan_get_option('footer_contact_form');
                    if ( ! empty( $footer_form_shortcode ) ) {
                        echo do_shortcode( $footer_form_shortcode );
                    } else {
                        ?>
                        <form class="space-y-4">
                            <input type="text" placeholder="<?php echo esc_attr__( 'Ad Soyad*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full focus:outline-none focus:border-[#8b6e4e]">
                            <input type="text" placeholder="<?php echo esc_attr__( 'Ülke*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full focus:outline-none focus:border-[#8b6e4e]">
                            <input type="tel" placeholder="<?php echo esc_attr__( 'Telefon No*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full focus:outline-none focus:border-[#8b6e4e]">
                            <textarea placeholder="<?php echo esc_attr__( 'Mesaj*', 'burhan-ozalp' ); ?>" rows="3" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full focus:outline-none focus:border-[#8b6e4e] resize-none"></textarea>
                            <button class="bg-[#8b6e4e] text-white px-8 py-3 text-base font-bold tracking-widest w-full hover:bg-opacity-90 transition-all uppercase rounded-sm cursor-pointer"><?php echo esc_html__( 'GÖNDER', 'burhan-ozalp' ); ?></button>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- Bottom Credits -->
            <div class="border-t border-gray-100 pt-12 text-center">
                <div class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-base font-bold uppercase text-gray-600 tracking-widest mb-6 px-4">
                    <?php
                    $bottom_menu_items = array();
                    $locations = get_nav_menu_locations();
                    if ( isset( $locations['bottom_bar_menu'] ) ) {
                        $menu_id = $locations['bottom_bar_menu'];
                        $raw_bottom_items = wp_get_nav_menu_items( $menu_id );
                        if ( ! empty( $raw_bottom_items ) ) {
                            foreach ( $raw_bottom_items as $item ) {
                                $bottom_menu_items[] = array(
                                    'title'  => $item->title,
                                    'url'    => $item->url,
                                    'target' => ! empty( $item->target ) ? $item->target : '_self',
                                );
                            }
                        }
                    }

                    if ( ! empty( $bottom_menu_items ) ) {
                        foreach ( $bottom_menu_items as $link ) {
                            ?>
                            <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" class="hover:text-[#8b6e4e] transition-all mb-2"><?php echo esc_html($link['title']); ?></a>
                            <?php
                        }
                    } else {
                        // Fallback elements
                        ?>
                        <a href="#" class="hover:text-[#8b6e4e] transition-all mb-2"><?php echo esc_html__( 'Randevu', 'burhan-ozalp' ); ?></a>
                        <a href="#" class="hover:text-[#8b6e4e] transition-all mb-2"><?php echo esc_html__( 'SSS', 'burhan-ozalp' ); ?></a>
                        <a href="#" class="hover:text-[#8b6e4e] transition-all mb-2"><?php echo esc_html__( 'Hakkımda', 'burhan-ozalp' ); ?></a>
                        <a href="#" class="hover:text-[#8b6e4e] transition-all mb-2"><?php echo esc_html__( 'Site Haritası', 'burhan-ozalp' ); ?></a>
                        <a href="#" class="hover:text-[#8b6e4e] transition-all mb-2"><?php echo esc_html__( 'İletişim', 'burhan-ozalp' ); ?></a>
                        <a href="#" class="hover:text-[#8b6e4e] transition-all mb-2"><?php echo esc_html__( 'KVKK', 'burhan-ozalp' ); ?></a>
                        <a href="#" class="hover:text-[#8b6e4e] transition-all mb-2"><?php echo esc_html__( 'Gizlilik Sözleşmesi', 'burhan-ozalp' ); ?></a>
                        <?php
                    }
                    ?>
                </div>
                <p class="text-base text-gray-600 uppercase tracking-widest mb-4 px-4"><?php echo esc_html( $copyright ); ?></p>
                <p class="text-base text-gray-600 max-w-2xl mx-auto italic px-4 leading-relaxed"><?php echo esc_html( $disclaimer ); ?></p>
            </div>
        </div>
    </footer>

    <!-- Fixed Contact Widgets -->
    <div class="fixed bottom-[10px] left-4 right-4 md:bottom-6 md:left-8 md:right-8 lg:left-12 lg:right-12 flex flex-row items-center justify-between z-[60]">
        <!-- Instagram Link -->
        <?php if ( ! empty( $instagram ) ) : ?>
            <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-tr from-[#f9ce34] via-[#ee2a7b] to-[#6228d7] text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 active:scale-95 transition-all cursor-pointer" aria-label="Instagram">
                <svg class="w-6 h-6 md:w-7 md:h-7 fill-current" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                </svg>
            </a>
        <?php endif; ?>
        <!-- WhatsApp Link -->
        <?php if ( ! empty( $whatsapp_phone ) ) : ?>
            <a href="https://wa.me/<?php echo esc_attr( $whatsapp_phone ); ?>" target="_blank" class="w-12 h-12 md:w-14 md:h-14 bg-[#25d366] text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 active:scale-95 transition-all cursor-pointer" aria-label="WhatsApp">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg" class="w-6 h-6 md:w-7 md:h-7" alt="WhatsApp">
            </a>
        <?php endif; ?>
    </div>

    <?php wp_footer(); ?>
</body>
</html>

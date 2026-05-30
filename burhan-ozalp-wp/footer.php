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
    <footer class="bg-white pt-24 pb-12 border-t border-gray-100 text-[#333]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 mb-20 text-center lg:text-left rtl:lg:text-right">
                <!-- Branding & Address -->
                <div class="w-full flex flex-col items-center lg:items-start rtl:lg:items-start rtl:items-start">
                   <h2 class="w-full text-3xl font-['Cormorant_Garamond'] tracking-widest text-[#333] font-light leading-none mb-10 text-center lg:text-left rtl:lg:text-right rtl:text-right" dir="ltr">
                        <span class="block text-base font-['Montserrat'] font-semibold text-[#8b6e4e] tracking-[0.3em] mb-1 uppercase text-center lg:text-left rtl:lg:text-right rtl:text-right"><?php echo esc_html( $logo_subtitle ); ?></span>
                        <span class="block text-center lg:text-left rtl:lg:text-right rtl:text-right"><?php echo esc_html( $logo_title ); ?></span>
                    </h2>
                    <div class="text-base text-[#7b5f43] space-y-6 leading-relaxed w-full flex flex-col items-center lg:items-start rtl:lg:items-start rtl:items-start text-center lg:text-left rtl:lg:text-right rtl:text-right">
                        <div class="w-full flex flex-col lg:flex-row items-center lg:items-start rtl:items-start rtl:lg:items-start text-center lg:text-left rtl:lg:text-right rtl:text-right">
                            <i class="fa-solid fa-location-dot text-sm mb-2 lg:mb-0 lg:mr-3 rtl:lg:mr-0 rtl:lg:ml-3 text-[#8b6e4e] mt-0.5 shrink-0"></i>
                            <div class="w-full">
                                <span class="block font-bold mb-1 uppercase text-gray-800"><?php echo esc_html__( 'Muayenehane Adresi:', 'burhan-ozalp' ); ?></span>
                                <?php echo esc_html( $address ); ?>
                            </div>
                        </div>
                        <div class="w-full flex flex-col lg:flex-row items-center lg:items-start rtl:items-start rtl:lg:items-start text-center lg:text-left rtl:lg:text-right rtl:text-right">
                            <i class="fa-solid fa-phone text-sm mb-2 lg:mb-0 lg:mr-3 rtl:lg:mr-0 rtl:lg:ml-3 text-[#8b6e4e] mt-0.5 shrink-0"></i>
                            <div class="w-full">
                                <span class="block font-bold mb-1 uppercase text-gray-800"><?php echo esc_html__( 'Telefonlar:', 'burhan-ozalp' ); ?></span>
                                <span dir="ltr" class="inline-block"><?php echo esc_html( $phone ); ?> <?php echo ! empty( $sec_phone ) ? ' / ' . esc_html( $sec_phone ) : ''; ?></span>
                            </div>
                        </div>
                        <div class="pt-4 w-full flex justify-center lg:justify-start rtl:justify-start rtl:lg:justify-start">
                            <a href="<?php echo esc_url( $directions_url ); ?>" target="_blank" class="bg-[#2c8d2c] text-white px-8 py-3 rounded-sm flex items-center justify-center w-full sm:w-auto font-bold tracking-widest uppercase hover:bg-opacity-90 transition-all text-xs">
                                <i class="fa-solid fa-check text-xs mr-2 rtl:mr-0 rtl:ml-2"></i> <?php echo esc_html__( 'YOL TARİFİ', 'burhan-ozalp' ); ?>
                            </a>
                        </div>
                        <div class="w-full flex gap-4 pt-4 justify-center lg:justify-start rtl:justify-start rtl:lg:justify-start">
                            <?php if ( ! empty( $facebook ) ) : ?>
                                <a href="<?php echo esc_url( $facebook ); ?>" class="w-10 h-10 border border-gray-200 rounded-full flex items-center justify-center hover:bg-[#8b6e4e] hover:text-white hover:border-[#8b6e4e] transition-all" target="_blank"><i class="fa-brands fa-facebook-f text-lg"></i></a>
                            <?php endif; ?>
                            <?php if ( ! empty( $instagram ) ) : ?>
                                <a href="<?php echo esc_url( $instagram ); ?>" class="w-10 h-10 border border-gray-200 rounded-full flex items-center justify-center hover:bg-[#8b6e4e] hover:text-white hover:border-[#8b6e4e] transition-all" target="_blank"><i class="fa-brands fa-instagram text-lg"></i></a>
                            <?php endif; ?>
                            <?php if ( ! empty( $youtube ) ) : ?>
                                <a href="<?php echo esc_url( $youtube ); ?>" class="w-10 h-10 border border-gray-200 rounded-full flex items-center justify-center hover:bg-[#8b6e4e] hover:text-white hover:border-[#8b6e4e] transition-all" target="_blank"><i class="fa-brands fa-youtube text-lg"></i></a>
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

    <!-- Fixed WhatsApp Widget -->
    <?php if ( ! empty( $whatsapp_phone ) ) : ?>
        <a href="https://wa.me/<?php echo esc_attr( $whatsapp_phone ); ?>" target="_blank" class="fixed bottom-6 right-6 rtl:right-auto rtl:left-6 bg-[#25d366] text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-all z-[60]">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg" class="w-8 h-8" alt="WhatsApp">
        </a>
    <?php endif; ?>

    <?php wp_footer(); ?>
</body>
</html>

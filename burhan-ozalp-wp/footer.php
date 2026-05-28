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

$footer_col1_title = burhan_get_option('footer_col1_title', 'HIZLI LİNKLER');
$footer_col1_links = burhan_get_option('footer_col1_links');
$footer_col2_title = burhan_get_option('footer_col2_title', 'DİĞER ESTETİKLER');
$footer_col2_links = burhan_get_option('footer_col2_links');
?>

    <!-- Footer -->
    <footer class="bg-white pt-24 pb-12 border-t border-gray-100 text-[#333]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 mb-20 text-center lg:text-left">
                <!-- Branding & Address -->
                <div class="flex flex-col items-center lg:items-start">
                   <h2 class="text-3xl font-['Cormorant_Garamond'] tracking-widest text-[#333] font-light leading-none mb-10">
                        <span class="block text-base font-['Montserrat'] font-semibold text-[#8b6e4e] tracking-[0.3em] mb-1 uppercase"><?php echo esc_html( $logo_subtitle ); ?></span>
                        <?php echo esc_html( $logo_title ); ?>
                    </h2>
                    <div class="text-base text-[#7b5f43] space-y-6 leading-relaxed text-left">
                        <div class="flex flex-col lg:flex-row items-center lg:items-start text-center lg:text-left">
                            <i class="fa-solid fa-location-dot text-sm mb-2 lg:mb-0 lg:mr-3 text-[#8b6e4e] mt-0.5 shrink-0"></i>
                            <div>
                                <span class="block font-bold mb-1 uppercase text-gray-800"><?php echo esc_html__( 'Muayenehane Adresi:', 'burhan-ozalp' ); ?></span>
                                <?php echo esc_html( $address ); ?>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row items-center lg:items-start text-center lg:text-left">
                            <i class="fa-solid fa-phone text-sm mb-2 lg:mb-0 lg:mr-3 text-[#8b6e4e] mt-0.5 shrink-0"></i>
                            <div>
                                <span class="block font-bold mb-1 uppercase text-gray-800"><?php echo esc_html__( 'Telefonlar:', 'burhan-ozalp' ); ?></span>
                                <?php echo esc_html( $phone ); ?> <?php echo ! empty( $sec_phone ) ? ' / ' . esc_html( $sec_phone ) : ''; ?>
                            </div>
                        </div>
                        <div class="pt-4 w-full flex justify-center lg:justify-start">
                            <a href="<?php echo esc_url( $directions_url ); ?>" target="_blank" class="bg-[#2c8d2c] text-white px-8 py-3 rounded-sm flex items-center justify-center w-full sm:w-auto font-bold tracking-widest uppercase hover:bg-opacity-90 transition-all text-xs">
                                <i class="fa-solid fa-check text-xs mr-2"></i> <?php echo esc_html__( 'YOL TARİFİ', 'burhan-ozalp' ); ?>
                            </a>
                        </div>
                        <div class="flex space-x-4 pt-4 justify-center lg:justify-start">
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
                <div class="grid grid-cols-2 gap-4 text-left">
                    <div>
                        <h4 class="text-base font-bold tracking-[0.2em] text-[#8b6e4e] mb-6 uppercase text-left"><?php echo esc_html($footer_col1_title); ?></h4>
                        <ul class="text-base font-semibold text-gray-500 uppercase tracking-wider space-y-4 list-none pl-0">
                            <?php if ( ! empty($footer_col1_links) ) : ?>
                                <?php 
                                foreach ( $footer_col1_links as $item ) : 
                                    $link_url = '#';
                                    $link_title = '';
                                    $link_target = '_self';
                                    if ( ! empty( $item['link'] ) && is_array( $item['link'] ) ) {
                                        $link_url    = $item['link']['url'];
                                        $link_title  = $item['link']['title'];
                                        $link_target = ! empty( $item['link']['target'] ) ? $item['link']['target'] : '_self';
                                    } elseif ( ! empty( $item['url'] ) ) {
                                        $link_url   = $item['url'];
                                        $link_title = ! empty( $item['title'] ) ? $item['title'] : '';
                                    }
                                ?>
                                    <li><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> <?php echo esc_html($link_title); ?></a></li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Burun Estetiği</a></li>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Göğüs Estetiği</a></li>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Göğüs Büyütme</a></li>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Jinekomasti</a></li>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Karın Germe</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-base font-bold tracking-[0.2em] text-[#8b6e4e] mb-6 uppercase text-left"><?php echo esc_html($footer_col2_title); ?></h4>
                        <ul class="text-base font-semibold text-gray-500 uppercase tracking-wider space-y-4 list-none pl-0">
                            <?php if ( ! empty($footer_col2_links) ) : ?>
                                <?php 
                                foreach ( $footer_col2_links as $item ) : 
                                    $link_url = '#';
                                    $link_title = '';
                                    $link_target = '_self';
                                    if ( ! empty( $item['link'] ) && is_array( $item['link'] ) ) {
                                        $link_url    = $item['link']['url'];
                                        $link_title  = $item['link']['title'];
                                        $link_target = ! empty( $item['link']['target'] ) ? $item['link']['target'] : '_self';
                                    } elseif ( ! empty( $item['url'] ) ) {
                                        $link_url   = $item['url'];
                                        $link_title = ! empty( $item['title'] ) ? $item['title'] : '';
                                    }
                                ?>
                                    <li><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> <?php echo esc_html($link_title); ?></a></li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Brezilya Poposu</a></li>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Boyun Germe</a></li>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Faça / Jilet İzi</a></li>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Kepçe Kulak Estetiği</a></li>
                                <li><a href="#" class="hover:text-[#8b6e4e] flex items-center transition-all"><i class="fa-solid fa-chevron-right text-[10px] mr-2 text-[#8b6e4e]"></i> Yağ Enjeksiyonu</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <!-- Contact Form Footer -->
                <div class="bg-[#f8f6f3] p-8 rounded-sm">
                    <h4 class="text-base font-bold tracking-[0.2em] text-[#8b6e4e] mb-6 uppercase text-left"><?php echo esc_html__( 'Numaranızı Bırakın Arayalım !', 'burhan-ozalp' ); ?></h4>
                    <form class="space-y-4">
                        <input type="text" placeholder="<?php echo esc_attr__( 'Ad Soyad*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full focus:outline-none focus:border-[#8b6e4e]">
                        <input type="text" placeholder="<?php echo esc_attr__( 'Ülke*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full focus:outline-none focus:border-[#8b6e4e]">
                        <input type="tel" placeholder="<?php echo esc_attr__( 'Telefon No*', 'burhan-ozalp' ); ?>" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full focus:outline-none focus:border-[#8b6e4e]">
                        <textarea placeholder="<?php echo esc_attr__( 'Mesaj*', 'burhan-ozalp' ); ?>" rows="3" class="bg-white border-b border-gray-200 px-4 py-2.5 text-base w-full focus:outline-none focus:border-[#8b6e4e] resize-none"></textarea>
                        <button class="bg-[#8b6e4e] text-white px-8 py-3 text-base font-bold tracking-widest w-full hover:bg-opacity-90 transition-all uppercase rounded-sm cursor-pointer"><?php echo esc_html__( 'GÖNDER', 'burhan-ozalp' ); ?></button>
                    </form>
                </div>
            </div>

            <!-- Bottom Credits -->
            <div class="border-t border-gray-100 pt-12 text-center">
                <div class="flex flex-wrap justify-center space-x-6 text-base font-bold uppercase text-gray-400 tracking-widest mb-6 px-4">
                    <a href="#" class="hover:text-gray-600 transition-all mb-2"><?php echo esc_html__( 'Randevu', 'burhan-ozalp' ); ?></a>
                    <a href="#" class="hover:text-gray-600 transition-all mb-2"><?php echo esc_html__( 'SSS', 'burhan-ozalp' ); ?></a>
                    <a href="#" class="hover:text-gray-600 transition-all mb-2"><?php echo esc_html__( 'Hakkımda', 'burhan-ozalp' ); ?></a>
                    <a href="#" class="hover:text-gray-600 transition-all mb-2"><?php echo esc_html__( 'Site Haritası', 'burhan-ozalp' ); ?></a>
                    <a href="#" class="hover:text-gray-600 transition-all mb-2"><?php echo esc_html__( 'İletişim', 'burhan-ozalp' ); ?></a>
                    <a href="#" class="hover:text-gray-600 transition-all mb-2"><?php echo esc_html__( 'KVKK', 'burhan-ozalp' ); ?></a>
                    <a href="#" class="hover:text-gray-600 transition-all mb-2"><?php echo esc_html__( 'Gizlilik Sözleşmesi', 'burhan-ozalp' ); ?></a>
                </div>
                <p class="text-base text-gray-400 uppercase tracking-widest mb-4 px-4"><?php echo esc_html( $copyright ); ?></p>
                <p class="text-base text-gray-300 max-w-2xl mx-auto italic px-4 leading-relaxed"><?php echo esc_html( $disclaimer ); ?></p>
            </div>
        </div>
    </footer>

    <!-- Fixed WhatsApp Widget -->
    <?php if ( ! empty( $whatsapp_phone ) ) : ?>
        <a href="https://wa.me/<?php echo esc_attr( $whatsapp_phone ); ?>" target="_blank" class="fixed bottom-6 right-6 bg-[#25d366] text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-all z-[60]">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg" class="w-8 h-8" alt="WhatsApp">
        </a>
    <?php endif; ?>

    <?php wp_footer(); ?>
</body>
</html>

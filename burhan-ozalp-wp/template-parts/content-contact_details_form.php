<?php
/**
 * Template part for displaying Contact Details & Form ACF layout.
 *
 * @package burhan-ozalp
 */

$address_title = get_sub_field('address_title');
if ( empty( $address_title ) ) {
    $address_title = esc_html__( 'MUAYENEHANE ADRESİ', 'burhan-ozalp' );
}

$address_text = get_sub_field('address_text');
if ( empty( $address_text ) ) {
    $address_text = esc_html__( 'Hamidiye, Cendere Cad. Kordon İstanbul Güzelyalı Sitesi No: 49, 34038 Kağıthane/İstanbul', 'burhan-ozalp' );
}

$phone_1 = get_sub_field('phone_1');
if ( empty( $phone_1 ) ) {
    $phone_1 = '+90 532 157 05 77';
}

$phone_2 = get_sub_field('phone_2');
if ( empty( $phone_2 ) ) {
    $phone_2 = '+90 212 261 12 12';
}

$email = get_sub_field('email');
if ( empty( $email ) ) {
    $email = 'info@burhanozalp.com';
}

$form_title = get_sub_field('form_title');
if ( empty( $form_title ) ) {
    $form_title = esc_html__( 'İletişim Formu', 'burhan-ozalp' );
}

$form_subtitle = get_sub_field('form_subtitle');
if ( empty( $form_subtitle ) ) {
    $form_subtitle = esc_html__( 'Merak Ettiğiniz Her Şeyi Sorabilirsiniz', 'burhan-ozalp' );
}

$cf7_shortcode = get_sub_field('cf7_shortcode');
?>

<!-- Contact Details & Form -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <!-- Left: Address Info -->
            <div class="space-y-12">
                <div>
                    <h3 class="text-2xl font-['Cormorant_Garamond'] font-bold tracking-widest text-[#333] mb-8 uppercase"><?php echo esc_html( $address_title ); ?></h3>
                    <p class="text-[#7b5f43] leading-relaxed mb-6">
                        <?php echo nl2br( esc_html( $address_text ) ); ?>
                    </p>
                    <div class="space-y-4 font-bold text-gray-800">
                        <?php if ( ! empty( $phone_1 ) ) : ?>
                            <div class="flex items-center">
                                <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $phone_1) ); ?>" class="text-gray-800 hover:text-[#8b6e4e] transition-colors"><?php echo esc_html( $phone_1 ); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $phone_2 ) ) : ?>
                            <div class="flex items-center">
                                <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $phone_2) ); ?>" class="text-gray-800 hover:text-[#8b6e4e] transition-colors"><?php echo esc_html( $phone_2 ); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $email ) ) : ?>
                            <div class="flex items-center">
                                <a href="mailto:<?php echo esc_attr( $email ); ?>" class="text-[#8b6e4e] hover:opacity-85 transition-opacity underline"><?php echo esc_html( $email ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Right: Form -->
            <div>
                <h3 class="text-2xl font-['Cormorant_Garamond'] font-bold tracking-widest text-[#333] mb-8 uppercase"><?php echo esc_html( $form_title ); ?></h3>
                <?php if ( ! empty( $form_subtitle ) ) : ?>
                    <p class="text-sm text-gray-500 mb-10"><?php echo esc_html( $form_subtitle ); ?></p>
                <?php endif; ?>
                
                <?php if ( ! empty( $cf7_shortcode ) ) : ?>
                    <div class="theme-cf7-forms">
                        <?php echo do_shortcode( $cf7_shortcode ); ?>
                    </div>
                <?php else : ?>
                    <form class="space-y-8">
                        <div class="relative">
                            <input type="text" placeholder="<?php echo esc_attr__( 'Ad Soyad*', 'burhan-ozalp' ); ?>" class="w-full bg-white border-b border-gray-200 py-3 text-base focus:outline-none focus:border-[#8b6e4e] transition-colors">
                        </div>
                        <div class="relative">
                            <input type="text" placeholder="<?php echo esc_attr__( 'Ülke*', 'burhan-ozalp' ); ?>" class="w-full bg-white border-b border-gray-200 py-3 text-base focus:outline-none focus:border-[#8b6e4e] transition-colors">
                        </div>
                        <div class="relative">
                            <input type="tel" placeholder="<?php echo esc_attr__( 'Telefon No*', 'burhan-ozalp' ); ?>" class="w-full bg-white border-b border-gray-200 py-3 text-base focus:outline-none focus:border-[#8b6e4e] transition-colors">
                        </div>
                        <div class="relative">
                            <textarea placeholder="<?php echo esc_attr__( 'Mesaj*', 'burhan-ozalp' ); ?>" rows="4" class="w-full bg-white border-b border-gray-200 py-3 text-base focus:outline-none focus:border-[#8b6e4e] transition-colors resize-none"></textarea>
                        </div>
                        <button class="bg-[#6d553e] text-white px-12 py-4 font-bold tracking-widest uppercase hover:bg-opacity-90 transition-all rounded-sm shadow-md"><?php echo esc_html__( 'GÖNDER', 'burhan-ozalp' ); ?></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

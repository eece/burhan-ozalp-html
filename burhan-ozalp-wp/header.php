<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class("bg-[#fcfaf7] text-[#333] font-['Montserrat',sans-serif]"); ?>>
    <?php wp_body_open(); ?>

    <?php
    // Get Site Option Variables
    $phone = burhan_get_option('phone_number', '+90 532 157 05 77');
    $facebook = burhan_get_option('facebook_url', '#');
    $instagram = burhan_get_option('instagram_url', '#');
    $youtube = burhan_get_option('youtube_url', '#');
    $contact_btn_text = burhan_get_option('quick_contact_text', 'HIZLI İLETİŞİM');
    $contact_btn_url = burhan_get_option('quick_contact_url', '#');
    $logo_title = burhan_get_option('logo_title', 'BURHAN ÖZALP');
    $logo_subtitle = burhan_get_option('logo_subtitle', 'Doc.Dr.');
    ?>

    <!-- Top Header -->
    <header class="bg-white border-b border-gray-100 hidden sm:block">
        <div class="container mx-auto px-4 py-2 flex flex-wrap justify-between items-center text-xs uppercase tracking-wider text-gray-700 font-bold">
            <div class="flex items-center gap-6">
                <div>
                    <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $phone) ); ?>" class="flex items-center text-gray-700 hover:text-[#8b6e4e] transition-colors">
                        <i class="fa-solid fa-phone text-[10px] mr-2 rtl:mr-0 rtl:ml-2 text-[#8b6e4e]"></i>
                        <?php echo esc_html__( 'Bizi Arayın:', 'burhan-ozalp' ); ?>&nbsp;<span dir="ltr"><?php echo esc_html( $phone ); ?></span>
                    </a>
                </div>
                <div class="hidden md:flex items-center gap-4 border-l rtl:border-l-0 rtl:border-r border-gray-200 pl-6 rtl:pl-0 rtl:pr-6 text-gray-500">
                    <?php if ( ! empty( $facebook ) ) : ?>
                        <a href="<?php echo esc_url( $facebook ); ?>" class="hover:text-[#8b6e4e] transition-colors" target="_blank"><i class="fa-brands fa-facebook-f text-base"></i></a>
                    <?php endif; ?>
                    <?php if ( ! empty( $instagram ) ) : ?>
                        <a href="<?php echo esc_url( $instagram ); ?>" class="hover:text-[#8b6e4e] transition-colors" target="_blank"><i class="fa-brands fa-instagram text-base"></i></a>
                    <?php endif; ?>
                    <?php if ( ! empty( $youtube ) ) : ?>
                        <a href="<?php echo esc_url( $youtube ); ?>" class="hover:text-[#8b6e4e] transition-colors" target="_blank"><i class="fa-brands fa-youtube text-base"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET" class="relative hidden sm:block">
                    <input type="text" name="s" placeholder="<?php echo esc_attr_x( 'ARA', 'placeholder', 'burhan-ozalp' ); ?>" class="bg-gray-50 border border-gray-200 px-3 py-1.5 w-40 text-xs focus:outline-none focus:border-[#8b6e4e]" value="<?php echo get_search_query(); ?>">
                    <button type="submit" class="absolute right-2 rtl:right-auto rtl:left-2 top-2 text-gray-450 hover:text-[#8b6e4e] focus:outline-none bg-transparent border-0 cursor-pointer">
                        <i class="fa-solid fa-magnifying-glass text-[10px]"></i>
                    </button>
                </form>
                <a href="<?php echo esc_url( $contact_btn_url ); ?>" class="bg-[#2c8d2c] text-white px-4 py-2 flex items-center hover:bg-opacity-90 transition-all rounded-sm text-xs font-bold">
                    <i class="fa-solid fa-check text-xs mr-2 rtl:mr-0 rtl:ml-2"></i>
                    <?php echo esc_html( $contact_btn_text ); ?>
                </a>
            </div>
        </div>
    </header>

    <!-- Mobile Top Header (Centered) -->
    <div class="sm:hidden bg-white border-b border-gray-100 py-3">
        <div class="container mx-auto px-4 flex flex-col items-center space-y-3 text-[11px] uppercase tracking-wider text-gray-700 font-bold text-center">
            <div class="flex items-center justify-center">
                <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $phone) ); ?>" class="flex items-center text-gray-700 hover:text-[#8b6e4e] transition-colors">
                    <i class="fa-solid fa-phone text-[10px] mr-2 rtl:mr-0 rtl:ml-2 text-[#8b6e4e]"></i>
                    <?php echo esc_html__( 'Bizi Arayın:', 'burhan-ozalp' ); ?>&nbsp;<span dir="ltr"><?php echo esc_html( $phone ); ?></span>
                </a>
            </div>
            <a href="<?php echo esc_url( $contact_btn_url ); ?>" class="bg-[#2c8d2c] text-white px-6 py-2 flex items-center hover:bg-opacity-90 transition-all rounded-sm text-xs font-bold mx-auto">
                <i class="fa-solid fa-check text-xs mr-2 rtl:mr-0 rtl:ml-2"></i>
                <?php echo esc_html( $contact_btn_text ); ?>
            </a>
        </div>
    </div>

    <!-- Navigation Header -->
    <nav class="bg-white sticky top-0 z-50 shadow-sm border-b border-gray-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="z-50" dir="ltr">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block text-left">
                    <h1 class="text-2xl md:text-3xl font-['Cormorant_Garamond'] tracking-widest text-[#333] font-light leading-none text-left">
                        <span class="block text-[10px] md:text-base font-['Montserrat'] font-semibold text-[#8b6e4e] tracking-[0.3em] mb-1 uppercase text-left"><?php echo esc_html( $logo_subtitle ); ?></span>
                        <?php echo esc_html( $logo_title ); ?>
                    </h1>
                </a>
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex flex-wrap justify-center items-center gap-4 md:gap-8 text-xs font-bold uppercase tracking-[0.15em] text-gray-600">
                <?php
                $menu_tree = array();
                $header_menu_location = 'header_menu';
                $locations = get_nav_menu_locations();
                if ( isset( $locations[ $header_menu_location ] ) ) {
                    $menu_id = $locations[ $header_menu_location ];
                    $menu_items = wp_get_nav_menu_items( $menu_id );
                    if ( ! empty( $menu_items ) ) {
                        // Level 1 items
                        $level1 = array();
                        // Level 2 & 3 items grouped
                        $level2_and_3 = array();
 
                        foreach ( $menu_items as $item ) {
                            $parent_id = intval( $item->menu_item_parent );
                            $formatted_item = array(
                                'id'           => $item->ID,
                                'title'        => $item->title,
                                'url'          => $item->url,
                                'target'       => ! empty( $item->target ) ? $item->target : '_self',
                                'sub_menu'     => array(),
                                'sub_sub_menu' => array()
                            );
 
                            if ( $parent_id === 0 ) {
                                $level1[ $item->ID ] = $formatted_item;
                            } else {
                                $formatted_item['parent_id'] = $parent_id;
                                $level2_and_3[ $item->ID ] = $formatted_item;
                            }
                        }
 
                        // Pass 2: Separate Level 2 and Level 3
                        $level2 = array();
                        $level3 = array();
                        foreach ( $level2_and_3 as $id => $item_data ) {
                            $parent_id = $item_data['parent_id'];
                            if ( isset( $level1[ $parent_id ] ) ) {
                                // Parent is Level 1, so this is Level 2
                                $level2[ $id ] = $item_data;
                            } else {
                                // Parent is not in Level 1 (it must be level 2), so this is Level 3
                                $level3[ $id ] = $item_data;
                            }
                        }
 
                        // Pass 3: Nest Level 3 inside Level 2
                        foreach ( $level3 as $id => $item_data ) {
                            $parent_id = $item_data['parent_id'];
                            if ( isset( $level2[ $parent_id ] ) ) {
                                $level2[ $parent_id ]['sub_sub_menu'][ $id ] = $item_data;
                            }
                        }
 
                        // Pass 4: Nest Level 2 inside Level 1
                        foreach ( $level2 as $id => $item_data ) {
                            $parent_id = $item_data['parent_id'];
                            if ( isset( $level1[ $parent_id ] ) ) {
                                $level1[ $parent_id ]['sub_menu'][ $id ] = $item_data;
                            }
                        }
 
                        $menu_tree = $level1;
                    }
                }
                if ( ! empty( $menu_tree ) ) :
                    foreach ( $menu_tree as $item ) :
                        $item_url = '#';
                        $item_title = '';
                        $item_target = '_self';
                        if ( ! empty( $item['link'] ) && is_array( $item['link'] ) ) {
                            $item_url    = $item['link']['url'];
                            $item_title  = $item['link']['title'];
                            $item_target = ! empty( $item['link']['target'] ) ? $item['link']['target'] : '_self';
                        } elseif ( ! empty( $item['url'] ) ) {
                            $item_url   = $item['url'];
                            $item_title = ! empty( $item['title'] ) ? $item['title'] : '';
                        }
                ?>
                        <li class="relative group py-2">
                            <a href="<?php echo esc_url( $item_url ); ?>" target="<?php echo esc_attr( $item_target ); ?>" class="hover:text-[#8b6e4e] transition-colors"><?php echo esc_html( $item_title ); ?></a>
                            <?php if ( ! empty( $item['sub_menu'] ) ) : ?>
                                <ul class="absolute left-0 rtl:left-auto rtl:right-0 top-full hidden group-hover:block bg-white shadow-xl min-w-[220px] border-t-2 border-[#8b6e4e] py-2 z-50 text-left rtl:text-right">
                                    <?php 
                                    foreach ( $item['sub_menu'] as $sub_item ) : 
                                        $sub_url = '#';
                                        $sub_title = '';
                                        $sub_target = '_self';
                                        if ( ! empty( $sub_item['link'] ) && is_array( $sub_item['link'] ) ) {
                                            $sub_url    = $sub_item['link']['url'];
                                            $sub_title  = $sub_item['link']['title'];
                                            $sub_target = ! empty( $sub_item['link']['target'] ) ? $sub_item['link']['target'] : '_self';
                                        } elseif ( ! empty( $sub_item['url'] ) ) {
                                            $sub_url   = $sub_item['url'];
                                            $sub_title = ! empty( $sub_item['title'] ) ? $sub_item['title'] : '';
                                        }
                                    ?>
                                        <li class="relative <?php echo ! empty( $sub_item['sub_sub_menu'] ) ? 'group/sub' : ''; ?>">
                                            <a href="<?php echo esc_url( $sub_url ); ?>" target="<?php echo esc_attr( $sub_target ); ?>" class="flex items-center justify-between px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">
                                                <span><?php echo esc_html( $sub_title ); ?></span>
                                                <?php if ( ! empty( $sub_item['sub_sub_menu'] ) ) : ?>
                                                    <i class="fa-solid fa-chevron-right text-[10px] rtl:!hidden"></i>
                                                    <i class="fa-solid fa-chevron-left text-[10px] !hidden rtl:!inline-block"></i>
                                                <?php endif; ?>
                                            </a>
                                            <?php if ( ! empty( $sub_item['sub_sub_menu'] ) ) : ?>
                                                <ul class="absolute left-full rtl:left-auto rtl:right-full top-0 hidden group-hover/sub:block bg-white shadow-xl min-w-[220px] border-l rtl:border-l-0 rtl:border-r border-gray-100 py-2">
                                                    <?php 
                                                    foreach ( $sub_item['sub_sub_menu'] as $sub_sub_item ) : 
                                                        $sub_sub_url = '#';
                                                        $sub_sub_title = '';
                                                        $sub_sub_target = '_self';
                                                        if ( ! empty( $sub_sub_item['link'] ) && is_array( $sub_sub_item['link'] ) ) {
                                                            $sub_sub_url    = $sub_sub_item['link']['url'];
                                                            $sub_sub_title  = $sub_sub_item['link']['title'];
                                                            $sub_sub_target = ! empty( $sub_sub_item['link']['target'] ) ? $sub_sub_item['link']['target'] : '_self';
                                                        } elseif ( ! empty( $sub_sub_item['url'] ) ) {
                                                            $sub_sub_url   = $sub_sub_item['url'];
                                                            $sub_sub_title = ! empty( $sub_sub_item['title'] ) ? $sub_sub_item['title'] : '';
                                                        }
                                                    ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( $sub_sub_url ); ?>" target="<?php echo esc_attr( $sub_sub_target ); ?>" class="block px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">
                                                                <?php echo esc_html( $sub_sub_title ); ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                <?php
                    endforeach;
                else :
                    // Fallback Navigation List matching HTML template
                ?>
                    <li class="relative group py-2">
                        <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-[#8b6e4e] transition-colors">Hakkımda</a>
                        <ul class="absolute left-0 rtl:left-auto rtl:right-0 top-full hidden group-hover:block bg-white shadow-xl min-w-[200px] border-t-2 border-[#8b6e4e] py-2 z-50 text-left rtl:text-right">
                            <li><a href="#" class="block px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">Özgeçmiş</a></li>
                            <li class="relative group/sub">
                                <a href="#" class="flex items-center justify-between px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">
                                    <span>Kariyer</span>
                                    <i class="fa-solid fa-chevron-right text-[10px] rtl:!hidden"></i>
                                    <i class="fa-solid fa-chevron-left text-[10px] !hidden rtl:!inline-block"></i>
                                </a>
                                <ul class="absolute left-full rtl:left-auto rtl:right-full top-0 hidden group-hover/sub:block bg-white shadow-xl min-w-[200px] border-l rtl:border-l-0 rtl:border-r border-gray-100 py-2">
                                    <li><a href="#" class="block px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">Eğitim</a></li>
                                    <li><a href="#" class="block px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">Sertifikalar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="relative group py-2">
                        <a href="#" class="hover:text-[#8b6e4e] transition-colors">İşlemler</a>
                        <ul class="absolute left-0 rtl:left-auto rtl:right-0 top-full hidden group-hover:block bg-white shadow-xl min-w-[220px] border-t-2 border-[#8b6e4e] py-2 z-50 text-left rtl:text-right">
                            <li><a href="#" class="block px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">Lipödem Cerrahisi</a></li>
                            <li><a href="#" class="block px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">Burun Estetiği</a></li>
                            <li><a href="#" class="block px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">Vücut Estetiği</a></li>
                            <li><a href="#" class="block px-6 py-3 text-xs hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors">Yüz Estetiği</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:text-[#8b6e4e] transition-colors">Lipödem</a></li>
                    <li><a href="#" class="hover:text-[#8b6e4e] transition-colors">Galeri</a></li>
                    <li><a href="#" class="hover:text-[#8b6e4e] transition-colors">İletişim</a></li>
                <?php endif; ?>

                <!-- Polylang Language Selection -->
                <li class="relative group py-2">
                    <?php if ( function_exists( 'pll_the_languages' ) ) : ?>
                        <?php
                        $langs = pll_the_languages( array( 'raw' => 1 ) );
                        if ( ! empty( $langs ) ) :
                            foreach ( $langs as $lang ) :
                                if ( $lang['current_lang'] ) :
                        ?>
                                    <button class="flex items-center hover:text-[#8b6e4e] transition-colors cursor-pointer">
                                        <img src="<?php echo esc_url( $lang['flag'] ); ?>" class="w-4 mr-2 rtl:mr-0 rtl:ml-2" alt="<?php echo esc_attr( $lang['slug'] ); ?>"> 
                                        <span class="text-xs uppercase"><?php echo esc_html( $lang['slug'] ); ?></span>
                                        <i class="fa-solid fa-chevron-down text-[10px] ml-1 rtl:ml-0 rtl:mr-1 opacity-50"></i>
                                    </button>
                                    <ul class="absolute right-0 rtl:right-auto rtl:left-0 top-full hidden group-hover:block bg-white shadow-xl min-w-[120px] border-t-2 border-[#8b6e4e] py-2 z-50 text-left rtl:text-right">
                                        <?php
                                        foreach ( $langs as $other_lang ) :
                                            if ( ! $other_lang['current_lang'] ) :
                                        ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $other_lang['url'] ); ?>" class="flex items-center px-4 py-2 hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors text-xs uppercase text-[#333]">
                                                        <img src="<?php echo esc_url( $other_lang['flag'] ); ?>" class="w-4 mr-2 rtl:mr-0 rtl:ml-2" alt="<?php echo esc_attr( $other_lang['slug'] ); ?>"> <?php echo esc_html( $other_lang['slug'] ); ?>
                                                    </a>
                                                </li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </ul>
                        <?php
                                endif;
                            endforeach;
                        endif;
                        ?>
                    <?php else : ?>
                        <!-- Static Fallback if Polylang is missing -->
                        <button class="flex items-center hover:text-[#8b6e4e] transition-colors cursor-pointer">
                            <img src="https://flagcdn.com/w20/tr.png" class="w-4 mr-2 rtl:mr-0 rtl:ml-2" alt="TR"> 
                            <span class="text-xs uppercase">TR</span>
                            <i class="fa-solid fa-chevron-down text-[10px] ml-1 rtl:ml-0 rtl:mr-1 opacity-50"></i>
                        </button>
                        <ul class="absolute right-0 rtl:right-auto rtl:left-0 top-full hidden group-hover:block bg-white shadow-xl min-w-[120px] border-t-2 border-[#8b6e4e] py-2 z-50 text-left rtl:text-right">
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 hover:text-[#8b6e4e] transition-all text-xs uppercase text-[#333]">
                                    <img src="https://flagcdn.com/w20/gb.png" class="w-4 mr-2 rtl:mr-0 rtl:ml-2" alt="EN"> EN
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>

            <!-- Mobile Menu Toggles -->
            <div class="flex items-center gap-4 lg:hidden">
                <div class="relative">
                    <?php if ( function_exists( 'pll_the_languages' ) ) : ?>
                        <?php
                        $langs = pll_the_languages( array( 'raw' => 1 ) );
                        if ( ! empty( $langs ) ) :
                            foreach ( $langs as $lang ) :
                                if ( $lang['current_lang'] ) :
                        ?>
                                    <button class="mobile-lang-btn flex items-center hover:text-[#8b6e4e] transition-colors cursor-pointer">
                                        <img src="<?php echo esc_url( $lang['flag'] ); ?>" class="w-5" alt="<?php echo esc_attr( $lang['slug'] ); ?>"> 
                                        <i class="fa-solid fa-chevron-down text-[10px] ml-1 rtl:ml-0 rtl:mr-1 opacity-50"></i>
                                    </button>
                                    <ul class="mobile-lang-menu absolute right-0 rtl:right-auto rtl:left-0 top-full hidden bg-white shadow-xl min-w-[100px] border-t-2 border-[#8b6e4e] py-2 z-50 text-left rtl:text-right">
                                        <?php
                                        foreach ( $langs as $other_lang ) :
                                            if ( ! $other_lang['current_lang'] ) :
                                        ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $other_lang['url'] ); ?>" class="flex items-center px-4 py-2 hover:bg-gray-50 hover:text-[#8b6e4e] transition-colors text-xs font-bold uppercase text-[#333]">
                                                        <img src="<?php echo esc_url( $other_lang['flag'] ); ?>" class="w-4 mr-2 rtl:mr-0 rtl:ml-2" alt="<?php echo esc_attr( $other_lang['slug'] ); ?>"> <?php echo esc_html( $other_lang['slug'] ); ?>
                                                    </a>
                                                </li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </ul>
                        <?php
                                endif;
                            endforeach;
                        endif;
                        ?>
                    <?php else : ?>
                        <button class="mobile-lang-btn flex items-center hover:text-[#8b6e4e] transition-colors cursor-pointer">
                            <img src="https://flagcdn.com/w20/tr.png" class="w-5" alt="TR"> 
                            <i class="fa-solid fa-chevron-down text-[10px] ml-1 rtl:ml-0 rtl:mr-1 opacity-50"></i>
                        </button>
                        <ul class="mobile-lang-menu absolute right-0 rtl:right-auto rtl:left-0 top-full hidden bg-white shadow-xl min-w-[100px] border-t-2 border-[#8b6e4e] py-2 z-50 text-left rtl:text-right">
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 hover:text-[#8b6e4e] transition-all text-xs font-bold uppercase text-[#333]">
                                    <img src="https://flagcdn.com/w20/gb.png" class="w-4 mr-2 rtl:mr-0 rtl:ml-2" alt="EN"> EN
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
                <button id="mobile-menu-btn" class="text-[#333] focus:outline-none z-50">
                    <i class="fa-solid fa-bars text-2xl animate-pulse-slow"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Panel -->
        <div id="mobile-menu" class="fixed inset-0 bg-white z-[200] transform translate-x-full transition-transform duration-300 ease-in-out lg:hidden overflow-y-auto pb-12 text-left rtl:text-right">
            <div class="flex justify-end p-6">
                <button id="mobile-menu-close" class="text-[#333] focus:outline-none">
                    <i class="fa-solid fa-times text-3xl"></i>
                </button>
            </div>
            <div class="container mx-auto px-6">
                <ul class="space-y-6 text-lg font-bold uppercase tracking-widest text-[#333]">
                    <?php
                    if ( ! empty( $menu_tree ) ) :
                        foreach ( $menu_tree as $item ) :
                            $item_url = '#';
                            $item_title = '';
                            $item_target = '_self';
                            if ( ! empty( $item['link'] ) && is_array( $item['link'] ) ) {
                                $item_url    = $item['link']['url'];
                                $item_title  = $item['link']['title'];
                                $item_target = ! empty( $item['link']['target'] ) ? $item['link']['target'] : '_self';
                            } elseif ( ! empty( $item['url'] ) ) {
                                $item_url   = $item['url'];
                                $item_title = ! empty( $item['title'] ) ? $item['title'] : '';
                            }
                    ?>
                            <li>
                                <?php if ( ! empty( $item['sub_menu'] ) ) : ?>
                                    <div class="flex justify-between items-center cursor-pointer mobile-accordion-btn">
                                        <span><?php echo esc_html( $item_title ); ?></span>
                                        <i class="fa-solid fa-plus text-xs"></i>
                                    </div>
                                    <ul class="mt-4 ml-4 rtl:ml-0 rtl:mr-4 space-y-4 text-sm font-semibold text-gray-500 hidden mobile-accordion-content border-l rtl:border-l-0 rtl:border-r border-gray-100 pl-4 rtl:pl-0 rtl:pr-4 capitalize tracking-normal">
                                        <?php 
                                        foreach ( $item['sub_menu'] as $sub_item ) : 
                                            $sub_url = '#';
                                            $sub_title = '';
                                            $sub_target = '_self';
                                            if ( ! empty( $sub_item['link'] ) && is_array( $sub_item['link'] ) ) {
                                                $sub_url    = $sub_item['link']['url'];
                                                $sub_title  = $sub_item['link']['title'];
                                                $sub_target = ! empty( $sub_item['link']['target'] ) ? $sub_item['link']['target'] : '_self';
                                            } elseif ( ! empty( $sub_item['url'] ) ) {
                                                $sub_url   = $sub_item['url'];
                                                $sub_title = ! empty( $sub_item['title'] ) ? $sub_item['title'] : '';
                                            }
                                        ?>
                                            <li>
                                                <?php if ( ! empty( $sub_item['sub_sub_menu'] ) ) : ?>
                                                    <div class="flex justify-between items-center cursor-pointer mobile-accordion-btn mt-2">
                                                        <span><?php echo esc_html( $sub_title ); ?></span>
                                                        <i class="fa-solid fa-plus text-xs"></i>
                                                    </div>
                                                    <ul class="mt-4 ml-4 rtl:ml-0 rtl:mr-4 space-y-4 text-xs font-semibold text-gray-400 hidden mobile-accordion-content border-l rtl:border-l-0 rtl:border-r border-gray-100 pl-4 rtl:pl-0 rtl:pr-4 capitalize tracking-normal">
                                                        <?php 
                                                        foreach ( $sub_item['sub_sub_menu'] as $sub_sub_item ) : 
                                                            $sub_sub_url = '#';
                                                            $sub_sub_title = '';
                                                            $sub_sub_target = '_self';
                                                            if ( ! empty( $sub_sub_item['link'] ) && is_array( $sub_sub_item['link'] ) ) {
                                                                $sub_sub_url    = $sub_sub_item['link']['url'];
                                                                $sub_sub_title  = $sub_sub_item['link']['title'];
                                                                $sub_sub_target = ! empty( $sub_sub_item['link']['target'] ) ? $sub_sub_item['link']['target'] : '_self';
                                                            } elseif ( ! empty( $sub_sub_item['url'] ) ) {
                                                                $sub_sub_url   = $sub_sub_item['url'];
                                                                $sub_sub_title = ! empty( $sub_sub_item['title'] ) ? $sub_sub_item['title'] : '';
                                                            }
                                                        ?>
                                                            <li><a href="<?php echo esc_url( $sub_sub_url ); ?>" target="<?php echo esc_attr( $sub_sub_target ); ?>" class="hover:text-[#8b6e4e]"><?php echo esc_html( $sub_sub_title ); ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else : ?>
                                                    <a href="<?php echo esc_url( $sub_url ); ?>" target="<?php echo esc_attr( $sub_target ); ?>" class="hover:text-[#8b6e4e]"><?php echo esc_html( $sub_title ); ?></a>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <a href="<?php echo esc_url( $item_url ); ?>" target="<?php echo esc_attr( $item_target ); ?>" class="block hover:text-[#8b6e4e]"><?php echo esc_html( $item_title ); ?></a>
                                <?php endif; ?>
                            </li>
                    <?php
                        endforeach;
                    else :
                        // Fallback Menu for mobile
                    ?>
                        <li>
                            <div class="flex justify-between items-center cursor-pointer mobile-accordion-btn">
                                <span>Hakkımda</span>
                                <i class="fa-solid fa-plus text-xs"></i>
                            </div>
                            <ul class="mt-4 ml-4 rtl:ml-0 rtl:mr-4 space-y-4 text-sm font-semibold text-gray-500 hidden mobile-accordion-content border-l rtl:border-l-0 rtl:border-r border-gray-100 pl-4 rtl:pl-0 rtl:pr-4 capitalize tracking-normal">
                                 <li><a href="#" class="hover:text-[#8b6e4e]">Özgeçmiş</a></li>
                                 <li><a href="#" class="hover:text-[#8b6e4e]">Eğitim</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="flex justify-between items-center cursor-pointer mobile-accordion-btn">
                                <span>İşlemler</span>
                                <i class="fa-solid fa-plus text-xs"></i>
                            </div>
                            <ul class="mt-4 ml-4 rtl:ml-0 rtl:mr-4 space-y-4 text-sm font-semibold text-gray-500 hidden mobile-accordion-content border-l rtl:border-l-0 rtl:border-r border-gray-100 pl-4 rtl:pl-0 rtl:pr-4 capitalize tracking-normal">
                                 <li><a href="#" class="hover:text-[#8b6e4e]">Lipödem Cerrahisi</a></li>
                                 <li><a href="#" class="hover:text-[#8b6e4e]">Burun Estetiği</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="block hover:text-[#8b6e4e]">Lipödem</a></li>
                        <li><a href="#" class="block hover:text-[#8b6e4e]">Galeri</a></li>
                        <li><a href="#" class="block hover:text-[#8b6e4e]">İletişim</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

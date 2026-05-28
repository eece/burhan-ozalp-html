<?php
/**
 * ACF Pro Custom Fields Registration (PHP Include)
 * Direct inclusion ensures a plug-and-play installation of the theme with auto-configured ACF.
 */

if( function_exists('acf_add_local_field_group') ):

// 1. Theme General Site Options (Global setup)
acf_add_local_field_group(array(
    'key' => 'group_theme_options',
    'title' => 'Site Options (Genel Ayarlar)',
    'fields' => array(
        array(
            'key' => 'field_logo_title',
            'label' => 'Logo & Marka Başlığı',
            'name' => 'logo_title',
            'type' => 'text',
            'default_value' => 'BURHAN ÖZALP',
        ),
        array(
            'key' => 'field_logo_subtitle',
            'label' => 'Logo Üst Açıklama',
            'name' => 'logo_subtitle',
            'type' => 'text',
            'default_value' => 'Doc.Dr.',
        ),
        array(
            'key' => 'field_phone_number',
            'label' => 'Telefon Numarası',
            'name' => 'phone_number',
            'type' => 'text',
            'default_value' => '+90 532 157 05 77',
        ),
        array(
            'key' => 'field_secondary_phone',
            'label' => 'Alternatif / Masaüstü Telefon',
            'name' => 'secondary_phone',
            'type' => 'text',
            'default_value' => '+90 212 261 12 12',
        ),
        array(
            'key' => 'field_facebook_url',
            'label' => 'Facebook Linki',
            'name' => 'facebook_url',
            'type' => 'url',
        ),
        array(
            'key' => 'field_instagram_url',
            'label' => 'Instagram Linki',
            'name' => 'instagram_url',
            'type' => 'url',
        ),
        array(
            'key' => 'field_youtube_url',
            'label' => 'Youtube Linki',
            'name' => 'youtube_url',
            'type' => 'url',
        ),
        array(
            'key' => 'field_quick_contact_text',
            'label' => 'Hızlı İletişim Buton Metni',
            'name' => 'quick_contact_text',
            'type' => 'text',
            'default_value' => 'HIZLI İLETİŞİM',
        ),
        array(
            'key' => 'field_quick_contact_url',
            'label' => 'Hızlı İletişim Linki',
            'name' => 'quick_contact_url',
            'type' => 'text',
            'default_value' => '#',
        ),
        array(
            'key' => 'field_office_address',
            'label' => 'Ofis Adresi (Footer)',
            'name' => 'office_address',
            'type' => 'textarea',
            'default_value' => "Hamidiye, Cendere Cad. Kordon İstanbul Güzelyalı Sitesi No: 49, 34038 Kağıthane/İstanbul",
        ),
        array(
            'key' => 'field_directions_url',
            'label' => 'Yol Tarifi (Harita) Linki',
            'name' => 'directions_url',
            'type' => 'url',
        ),
        array(
            'key' => 'field_copyright_text',
            'label' => 'Copyright Metni',
            'name' => 'copyright_text',
            'type' => 'text',
            'default_value' => '© 2025 Tüm Hakları Doç. Dr. Burhan Özalp\'a Aittir.',
        ),
        array(
            'key' => 'field_disclaimer_text',
            'label' => 'Yasal Uyarı Metni',
            'name' => 'disclaimer_text',
            'type' => 'textarea',
            'default_value' => "Bu sitede yer alan makaleler tamamen bilgilendirme amaçlı olup, tanı ve tedavi amacıyla kullanılamaz. Tüm sağlık sorunları için doktorunuza başvurunuz.",
        ),
        array(
            'key' => 'field_header_menu',
            'label' => 'Header Menü Linkleri (ACF)',
            'name' => 'header_menu',
            'type' => 'repeater',
            'instructions' => 'Üst menü hiyerarşisini kolayca tasarlayın. Eğer tanımlamazsanız şık bir varsayılan menü gösterilir.',
            'layout' => 'row',
            'button_label' => 'Yeni Menü Elemanı Ekle',
            'sub_fields' => array(
                array(
                    'key' => 'field_header_menu_link',
                    'label' => 'Bağlantı (Link Seçiçi)',
                    'name' => 'link',
                    'type' => 'link',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_header_submenu',
                    'label' => 'Alt Menü Elemanları',
                    'name' => 'sub_menu',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => 'Alt Menü Ekle',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_header_sub_link',
                            'label' => 'Alt Menü Bağlantısı',
                            'name' => 'link',
                            'type' => 'link',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_header_subsubmenu',
                            'label' => '3. Seviye Alt Menü Elemanları',
                            'name' => 'sub_sub_menu',
                            'type' => 'repeater',
                            'layout' => 'row',
                            'button_label' => 'Üçüncü Seviye Ekle',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_header_sub_sub_link',
                                    'label' => 'Bağlantı',
                                    'name' => 'link',
                                    'type' => 'link',
                                    'required' => 1,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-settings',
            ),
        ),
    ),
));

// 2. Page Options Group (Display / Title Settings & Flexible content layouts)
acf_add_local_field_group(array(
    'key' => 'group_page_settings',
    'title' => 'Sayfa Ayarları (Ayar / Görünüm)',
    'fields' => array(
        array(
            'key' => 'field_hide_page_title',
            'label' => 'Sayfa Başlığını Gizle',
            'name' => 'hide_page_title',
            'type' => 'true_false',
            'instructions' => 'Aktif edilirse üstteki gri renkli "Sayfa Başlığı" (Page Header) alanı gizlenir.',
            'ui' => 1,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
        ),
    ),
));

// 3. Flexible Content Section
acf_add_local_field_group(array(
    'key' => 'group_page_flexible_content',
    'title' => 'Sayfa İçeriği Bölümleri (ACF Flexible Content Sections)',
    'fields' => array(
        array(
            'key' => 'field_flexible_sections',
            'label' => 'Bölümler (Sections)',
            'name' => 'flexible_sections',
            'type' => 'flexible_content',
            'button_label' => 'Yeni Bölüm Ekle (Add Section)',
            'layouts' => array(
                // Layout: Hero Slider
                'layout_hero_slider' => array(
                    'key' => 'layout_hero_slider',
                    'name' => 'hero_slider',
                    'label' => 'Slayt Gösterisi (Hero Slider)',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_hero_slides',
							'label' => 'Slaytlar (Slides)',
                            'name' => 'slides',
                            'type' => 'repeater',
                            'layout' => 'row',
                            'button_label' => 'Yeni Slayt Ekle',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_slide_image',
                                    'label' => 'Masaüstü Resmi (Desktop)',
                                    'name' => 'image',
                                    'type' => 'image',
                                    'return_format' => 'url',
                                ),
                                array(
                                    'key' => 'field_slide_image_mobile',
                                    'label' => 'Mobil Resmi (Mobile)',
                                    'name' => 'image_mobile',
                                    'type' => 'image',
                                    'return_format' => 'url',
                                ),
                                array(
                                    'key' => 'field_slide_subtitle',
                                    'label' => 'Üst Başlık (Alt Kategori)',
                                    'name' => 'subtitle',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_slide_title',
                                    'label' => 'Ana Başlık',
                                    'name' => 'title',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_slide_btn_text',
                                    'label' => 'Buton Metni',
                                    'name' => 'btn_text',
                                    'type' => 'text',
                                    'default_value' => 'Detaylar',
                                ),
                                array(
                                    'key' => 'field_slide_btn_url',
                                    'label' => 'Buton Linki',
                                    'name' => 'btn_url',
                                    'type' => 'text',
                                ),
                            ),
                        ),
                    ),
                ),
                // Layout: Callback Bar
                'layout_callback_bar' => array(
                    'key' => 'layout_callback_bar',
                    'name' => 'callback_bar',
                    'label' => 'Bizi Arayalım Formu (Callback Bar)',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_callback_title',
                            'label' => 'Form Sol Başlığı',
                            'name' => 'title',
                            'type' => 'text',
                            'default_value' => 'Numaranızı Bırakın Arayalım',
                        ),
                    ),
                ),
                // Layout: Popular Operations
                'layout_popular_operations' => array(
                    'key' => 'layout_popular_operations',
                    'name' => 'popular_operations',
                    'label' => 'Popüler Estetik Operasyonlar Gridi',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_ops_title',
                            'label' => 'Bölüm Başlığı',
                            'name' => 'title',
                            'type' => 'text',
							'default_value' => 'POPÜLER ESTETİK OPERASYONLAR',
                        ),
                        array(
                            'key' => 'field_ops_items',
                            'label' => 'Operasyonlar',
                            'name' => 'items',
                            'type' => 'repeater',
                            'layout' => 'table',
                            'button_label' => 'Operasyon Ekle',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_op_image',
                                    'label' => 'Görsel / Resim Seçin',
                                    'name' => 'image',
                                    'type' => 'image',
                                    'return_format' => 'url',
                                ),
                                array(
                                    'key' => 'field_op_link',
                                    'label' => 'Operasyon Linki',
                                    'name' => 'link',
                                    'type' => 'link',
                                    'return_format' => 'array',
                                ),
                            ),
                        ),
                    ),
                ),
                // Layout: Biography Block
                'layout_biography' => array(
                    'key' => 'layout_biography',
                    'name' => 'biography',
                    'label' => 'Biyografi & Doktor Hakkımızda Alanı',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_bio_label',
                            'label' => 'Üst Etiket (Biografi)',
                            'name' => 'label',
                            'type' => 'text',
                            'default_value' => 'BİYOGRAFİ',
                        ),
                        array(
                            'key' => 'field_bio_title',
                            'label' => 'Doktor Başlığı / Adı',
                            'name' => 'title',
                            'type' => 'text',
                            'default_value' => 'DOÇ. DR. BURHAN ÖZALP',
                        ),
                        array(
                            'key' => 'field_bio_image',
                            'label' => 'Doktor Resmi',
                            'name' => 'image',
                            'type' => 'image',
                            'return_format' => 'url',
                        ),
                        array(
                            'key' => 'field_bio_content',
                            'label' => 'Biyografi İçeriği',
                            'name' => 'content',
                            'type' => 'wysiwyg',
                        ),
                        array(
                            'key' => 'field_bio_btn_text',
                            'label' => 'Buton Metni',
                            'name' => 'btn_text',
                            'type' => 'text',
                            'default_value' => 'BİYOGRAFİ',
                        ),
                        array(
                            'key' => 'field_bio_btn_url',
                            'label' => 'Buton Linki',
                            'name' => 'btn_url',
                            'type' => 'text',
                        ),
                    ),
                ),
                // Layout: Latest Posts Blog Block
                'layout_latest_posts' => array(
                    'key' => 'layout_latest_posts',
                    'name' => 'latest_posts',
                    'label' => 'Güncel Blog Seksiyonu (Latest Blog Posts)',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_blog_title',
                            'label' => 'Seksiyon Başlığı',
                            'name' => 'title',
                            'type' => 'text',
                            'default_value' => 'Güncel Yazılar',
                        ),
                        array(
                            'key' => 'field_blog_count',
                            'label' => 'Yazı Sayısı',
                            'name' => 'post_count',
							'type' => 'number',
                            'default_value' => 3,
                        ),
                        array(
                            'key' => 'field_blog_tag_filter',
                            'label' => 'Filtrelenecek Etiket / Tag (Varsayılan boş bırakılırsa son en yeni yazıları getirir)',
                            'name' => 'tag_filter',
                            'type' => 'taxonomy',
                            'taxonomy' => 'post_tag',
                            'field_type' => 'select',
                            'add_term' => 0,
                            'save_terms' => 0,
                            'load_terms' => 0,
                            'return_format' => 'id',
                        ),
                    ),
                ),
                // Light Content WYSIWYG Editor section mapping for standard contents
                'layout_rich_text' => array(
                    'key' => 'layout_rich_text',
                    'name' => 'rich_text',
                    'label' => 'Serbest Metin / Editör İçeriği (Rich Text)',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_rich_text_content',
                            'label' => 'Metin ve Görseller',
                            'name' => 'editor_content',
                            'type' => 'wysiwyg',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
        ),
    ),
));

endif;

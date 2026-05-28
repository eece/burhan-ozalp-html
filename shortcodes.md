# WordPress Shortcodes & Form Templates

Bu dosya, sitedeki çeşitli bileşenlerin dinamik form sistemleri (örneğin Contact Form 7) ile uyumlu kodlarını ve shortcode yapılarını barındırır.

## 1. Bizi Arayalım Formu (Callback Bar)

Bu form, web sitesinde bulunan horizontal "Numaranızı Bırakın Arayalım" alanının WordPress + Contact Form 7 (CF7) eklentisine uygun şablonudur.

### Contact Form 7 Markup
Aşağıdaki HTML kodunu Contact Form 7 yönetim panelindeki **Form** bölümüne doğrudan kopyalayıp yapıştırabilirsiniz:

```html
<div class="flex flex-wrap items-center gap-4 justify-center">
    [text* your-name class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:sm:w-48 class:focus:outline-none class:focus:border-[#8b6e4e] placeholder "Ad Soyad*"]

    [email* your-email class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:sm:w-44 class:focus:outline-none class:focus:border-[#8b6e4e] placeholder "E-posta*"]

    [text* your-country class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:sm:w-36 class:focus:outline-none class:focus:border-[#8b6e4e] placeholder "Ülke*"]

    [tel* your-phone class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:sm:w-36 class:focus:outline-none class:focus:border-[#8b6e4e] placeholder "Telefon*"]

    [select* your-subject class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:text-gray-400 class:focus:outline-none class:w-full class:sm:w-36 "Konu*" "Burun Estetiği" "Vücut Estetiği"]

    [submit class:bg-[#8b6e4e] class:text-white class:px-8 class:py-3 class:text-base class:font-bold class:tracking-widest class:hover:bg-opacity-90 class:transition-all class:uppercase class:rounded-sm class:cursor-pointer "GÖNDER"]
</div>
```

> **Önemli İpucu (Contact Form 7 P Etiketi Engelleme):** 
> Contact Form 7, form içindeki her satır arasına otomatik olarak `<p>` ve `<br>` etiketleri ekler. Bu durumun flex hiyerarşisini ve Tailwind tasarımlarını bozmasını engellemek için `wp-config.php` dosyanıza şu satırı eklemeniz önerilir:
> ```php
> define( 'WPCF7_AUTOP', false );
> ```
> Veya CSS dosyanızda şu şekilde devre dışı bırakabilirsiniz:
> ```css
> .wpcf7 p, .wpcf7 br { display: none !important; }
> ```

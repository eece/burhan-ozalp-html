# WordPress Shortcodes & Form Templates

Bu dosya, sitedeki çeşitli bileşenlerin dinamik form sistemleri (örneğin Contact Form 7) ile uyumlu kodlarını ve shortcode yapılarını barındırır.

## 1. Bizi Arayalım Formu (Callback Bar)

Bu form, web sitesinde bulunan horizontal "Numaranızı Bırakın Arayalım" alanının WordPress + Contact Form 7 (CF7) eklentisine uygun şablonudur.

### Contact Form 7 Markup
Aşağıdaki HTML kodunu Contact Form 7 yönetim panelindeki **Form** bölümüne doğrudan kopyalayıp yapıştırabilirsiniz:

```html
<div class="flex flex-wrap items-center gap-4 justify-center">
    [text* your-name placeholder "Ad Soyad*"]

    [email* your-email placeholder "E-posta*"]

    [text* your-country placeholder "Ülke*"]

    [tel* your-phone placeholder "Telefon*"]

    [select* your-subject "Konu*" "Burun Estetiği" "Vücut Estetiği"]

    [submit "GÖNDER"]
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

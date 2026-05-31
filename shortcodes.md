# WordPress Shortcodes & Form Templates

Bu dosya, sitedeki çeşitli bileşenlerin dinamik form sistemleri (örneğin Contact Form 7) ile uyumlu kodlarını ve shortcode yapılarını barındırır.

## 1. Bizi Arayalım Formu (Callback Bar)

Bu form, web sitesinde bulunan horizontal "Numaranızı Bırakın Arayalım" alanının WordPress + Contact Form 7 (CF7) eklentisine uygun şablonudur.

### Contact Form 7 Markup
Aşağıdaki HTML kodunu Contact Form 7 yönetim panelindeki **Form** bölümüne doğrudan kopyalayıp yapıştırabilirsiniz:

```html
<div class="flex flex-wrap items-start gap-4 justify-center">
    [text* your-name class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:sm:w-48 class:focus:outline-none class:focus:border-brand placeholder "Ad Soyad*"]

    [email* your-email class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:sm:w-44 class:focus:outline-none class:focus:border-brand placeholder "E-posta*"]

    [text* your-country class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:sm:w-36 class:focus:outline-none class:focus:border-brand placeholder "Ülke*"]

    [tel* your-phone class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:sm:w-36 class:focus:outline-none class:focus:border-brand placeholder "Telefon*"]

    [select* your-subject class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:text-gray-400 class:focus:outline-none class:w-full class:sm:w-36 "Konu*" "Burun Estetiği" "Vücut Estetiği"]

    [submit class:bg-brand class:text-white class:px-8 class:py-3 class:text-base class:font-bold class:tracking-widest class:hover:bg-opacity-90 class:transition-all class:uppercase class:rounded-sm class:cursor-pointer "GÖNDER"]
</div>
```

## 2. Footer İletişim Formu (Footer Contact Form)

Bu form, sayfa alt bilgisinde (Footer) yer alan "Numaranızı Bırakın Arayalım !" başlıklı dikey iletişim alanının WordPress + Contact Form 7 (CF7) eklentisine uygun şablonudur.

### Contact Form 7 Markup
Aşağıdaki HTML kodunu Contact Form 7 yönetim panelindeki **Form** bölümüne doğrudan kopyalayıp yapıştırabilirsiniz:

```html
<div class="space-y-4">
    [text* your-name class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:focus:outline-none class:focus:border-brand placeholder "Ad Soyad*"]

    [text* your-country class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:focus:outline-none class:focus:border-brand placeholder "Ülke*"]

    [tel* your-phone class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:focus:outline-none class:focus:border-brand placeholder "Telefon No*"]

    [textarea* your-message x3 class:bg-white class:border-b class:border-gray-200 class:px-4 class:py-2.5 class:text-base class:w-full class:focus:outline-none class:focus:border-brand class:resize-none placeholder "Mesaj*"]

    [submit class:bg-brand class:text-white class:px-8 class:py-3 class:text-base class:font-bold class:tracking-widest class:w-full class:hover:bg-opacity-90 class:transition-all class:uppercase class:rounded-sm class:cursor-pointer "GÖNDER"]
</div>
```

## 3. İletişim Sayfası Formu (Contact Page Form)

Bu form, "İletişim Bilgileri ve Form" sayfa şablonunda kullanılan geniş kapsamlı iletişim formunun WordPress + Contact Form 7 (CF7) eklentisine uygun şablonudur.

### Contact Form 7 Markup
Aşağıdaki HTML kodunu Contact Form 7 yönetim panelindeki **Form** bölümüne doğrudan kopyalayıp yapıştırabilirsiniz:

```html
<div class="space-y-8">
    <div class="relative">
        [text* your-name class:w-full class:bg-white class:border-b class:border-gray-200 class:py-3 class:text-base class:focus:outline-none class:focus:border-[#8b6e4e] class:transition-colors placeholder "Ad Soyad*"]
    </div>
    <div class="relative">
        [text* your-country class:w-full class:bg-white class:border-b class:border-gray-200 class:py-3 class:text-base class:focus:outline-none class:focus:border-[#8b6e4e] class:transition-colors placeholder "Ülke*"]
    </div>
    <div class="relative">
        [tel* your-phone class:w-full class:bg-white class:border-b class:border-gray-200 class:py-3 class:text-base class:focus:outline-none class:focus:border-[#8b6e4e] class:transition-colors placeholder "Telefon No*"]
    </div>
    <div class="relative">
        [textarea* your-message x4 class:w-full class:bg-white class:border-b class:border-gray-200 class:py-3 class:text-base class:focus:outline-none class:focus:border-[#8b6e4e] class:transition-colors class:resize-none placeholder "Mesaj*"]
    </div>
    [submit class:bg-[#6d553e] class:text-white class:px-12 class:py-4 class:font-bold class:tracking-widest class:uppercase class:hover:bg-opacity-90 class:transition-all class:rounded-sm class:shadow-md class:cursor-pointer "GÖNDER"]
</div>
```

## 4. Randevu Formu (Appointment Form)

Bu form, polylang çok dilli uyumluluğuna sahip "Randevu Formu" bileşeninin WordPress + Contact Form 7 (CF7) eklentisine uygun şablonudur. Alan etiketleri ve yer tutucular `{translated text}` formatında hazırlanmıştır; böylece **Multilingual Contact Form 7 with Polylang** eklentisi tarafından otomatik olarak algılanıp tercüme edilebilirler.

### Contact Form 7 Markup
Aşağıdaki HTML kodunu Contact Form 7 yönetim panelindeki **Form** bölümüne doğrudan kopyalayıp yapıştırabilirsiniz:

```html
<div class="space-y-8">
    <div class="relative">
        [text* your-name class:w-full class:bg-white class:border-b class:border-gray-200 class:py-3 class:text-base class:focus:outline-none class:focus:border-[#8b6e4e] class:transition-colors placeholder "{Ad Soyad}*"]
    </div>

    <div class="relative">
        [tel* your-phone class:w-full class:bg-white class:border-b class:border-gray-200 class:py-3 class:text-base class:focus:outline-none class:focus:border-[#8b6e4e] class:transition-colors placeholder "{Telefon No}*"]
    </div>

    <div class="relative">
        <label class="block text-sm font-semibold text-gray-500 mb-1">{Tarih Seçiniz} <span class="text-xs text-gray-400 font-normal">({Randevu Tarihi})</span></label>
        [date your-date class:w-full class:bg-white class:border-b class:border-gray-200 class:py-3 class:text-base class:focus:outline-none class:focus:border-[#8b6e4e] class:transition-colors]
    </div>

    <div class="relative">
        <label class="block text-sm font-semibold text-gray-500 mb-1">{Konu}</label>
        [select your-subject class:w-full class:bg-white class:border-b class:border-gray-200 class:py-3 class:text-base class:focus:outline-none class:focus:border-[#8b6e4e] class:transition-colors "{Seçiniz}" "{Burun Estetiği}" "{Yağ Aldırma Ameliyatı (Liposuction)}" "{Popo Büyütme, Popo Kaldırma ve Popo Dikleştirme}" "{Meme Büyütme}" "{Meme Dikleştirme}" "{Meme Küçültme}" "{Karın Germe(Abdominoplasti)}" "{Erkek Memesinin Aşırı Büyümesi Tedavisi}" "{Saç Ektirme}" "{Dolgu - Yağ Enjeksiyonu}" "{Dudak Kaldırma}" "{Diğer Estetik Operasyonlar}"]
    </div>

    <div class="relative">
        <label class="block text-sm font-semibold text-gray-500 mb-1">{Mesajınız} <span class="text-xs text-gray-400 font-normal">({varsa mesajınızı yazınız})</span></label>
        [textarea your-message x4 class:w-full class:bg-white class:border-b class:border-gray-200 class:py-3 class:text-base class:focus:outline-none class:focus:border-[#8b6e4e] class:transition-colors class:resize-none]
    </div>

    [submit class:bg-[#6d553e] class:text-white class:px-12 class:py-4 class:font-bold class:tracking-widest class:uppercase class:hover:bg-opacity-90 class:transition-all class:rounded-sm class:shadow-md class:cursor-pointer "{GÖNDER}"]
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

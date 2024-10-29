# 📨 PHP Contact Form Gateway Suite

Form kontak modern dengan integrasi WhatsApp Gateway dan Email SMTP. Dibuat menggunakan PHP, jQuery AJAX, dan CSS modern untuk pengalaman pengguna yang optimal.

## ✨ Fitur Utama
- 📱 Desain responsif untuk desktop dan mobile
- 💬 Integrasi dengan WhatsApp Gateway
- 📧 Pengiriman email otomatis via SMTP Gmail
- 💾 Penyimpanan data ke text file
- ⚡ Pengiriman form menggunakan AJAX
- ✅ Validasi data real-time
- ⚙️ Konfigurasi terpisah dan mudah disesuaikan

## 🚀 Teknologi yang Digunakan
- PHP 7.4+
- jQuery 3.6.0
- PHPMailer
- CSS3 Modern
- WhatsApp Gateway API

## 📋 Prasyarat
- PHP 7.4 atau lebih tinggi
- Composer
- Akun Gmail (untuk SMTP)
- API Key WhatsApp Gateway

## 💻 Cara Instalasi

1. Clone repository
```bash
git clone https://github.com/classyid/contact-form-whatsapp-email.git
cd contact-form-whatsapp-email
```

2. Install dependencies
```bash
composer install
```

3. Konfigurasi
- Salin `config.example.php` ke `config.php`
- Sesuaikan pengaturan di `config.php`
```php
// Konfigurasi WhatsApp
define('WA_API_KEY', 'your_api_key');
define('WA_SENDER', 'your_sender_number');

// Konfigurasi Email
define('SMTP_USERNAME', 'your_email@gmail.com');
define('SMTP_PASSWORD', 'your_app_password');
```

4. Pengaturan Folder
```bash
chmod 755 data
touch data/submissions.txt
chmod 644 data/submissions.txt
```

## 📝 Penggunaan
1. Buka `index.html` di browser
2. Isi form dengan data yang valid
3. Data akan:
   - Tersimpan di `data/submissions.txt`
   - Terkirim ke WhatsApp yang ditentukan
   - Terkirim ke email yang dikonfigurasi

## ⚙️ Kustomisasi
- Ubah warna: Edit variabel di `style.css`
- Ubah teks: Edit di `index.html`
- Ubah logika: Edit di `process.php`

## 🤝 Kontribusi
Kontribusi selalu disambut baik! Silakan buat issue atau pull request.

## 📄 Lisensi
MIT License - lihat file [LICENSE.md](LICENSE.md)

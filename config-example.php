<?php
// Konfigurasi Whatsapp Gateway
define('WA_API_KEY', '<apikey>');
define('WA_SENDER', '<sender>');
define('WA_RECIPIENT', '<penerima>');
define('WA_ENDPOINT', 'https://m-pedia/send-message');

// Konfigurasi Email SMTP
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', '<username-email>');
define('SMTP_PASSWORD', '<password-email>'); // Use App Password from Google Account
define('SMTP_FROM_NAME', 'Form PHP');
define('SMTP_TO_EMAIL', '<email-tujuan>');

// Konfigurasi Aktivasi Pengiriman
define('ENABLE_WHATSAPP', true);
define('ENABLE_EMAIL', true);

// Path untuk menyimpan data
define('DATA_FILE', 'data/submissions.txt');
?>

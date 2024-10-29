<?php
require 'functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$data = [
    'nama' => $_POST['nama'] ?? '',
    'hp' => $_POST['hp'] ?? '',
    'email' => $_POST['email'] ?? ''
];

// Validasi data
if (empty($data['nama']) || empty($data['hp']) || empty($data['email'])) {
    echo json_encode(['success' => false, 'message' => 'Semua field harus diisi']);
    exit;
}

if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Format email tidak valid']);
    exit;
}

// Simpan ke file
saveToFile($data);

// Kirim WhatsApp
$waSuccess = sendWhatsapp($data);

// Kirim Email
$emailSuccess = sendEmail($data);

echo json_encode([
    'success' => true,
    'message' => 'Data berhasil dikirim',
    'details' => [
        'whatsapp' => $waSuccess,
        'email' => $emailSuccess
    ]
]);
?>

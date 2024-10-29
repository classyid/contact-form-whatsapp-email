<?php
require 'config.php';
require 'vendor/autoload.php'; // For PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function saveToFile($data) {
    $dataString = date('Y-m-d H:i:s') . " | " . 
                  $data['nama'] . " | " . 
                  $data['hp'] . " | " . 
                  $data['email'] . "\n";
                  
    file_put_contents(DATA_FILE, $dataString, FILE_APPEND);
}

function sendWhatsapp($data) {
    if (!ENABLE_WHATSAPP) return true;
    
    $message = "New Contact Form Submission\n" .
               "Nama: " . $data['nama'] . "\n" .
               "No HP: " . $data['hp'] . "\n" .
               "Email: " . $data['email'];
               
    $postData = [
        'api_key' => WA_API_KEY,
        'sender' => WA_SENDER,
        'number' => WA_RECIPIENT,
        'message' => $message
    ];
    
    $ch = curl_init(WA_ENDPOINT);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response !== false;
}

function sendEmail($data) {
    if (!ENABLE_EMAIL) return true;
    
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;
        
        $mail->setFrom(SMTP_USERNAME, SMTP_FROM_NAME);
        $mail->addAddress(SMTP_TO_EMAIL);
        
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "
            <h2>New Contact Form Submission</h2>
            <p><strong>Nama:</strong> {$data['nama']}</p>
            <p><strong>No HP:</strong> {$data['hp']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
        ";
        
        return $mail->send();
    } catch (Exception $e) {
        return false;
    }
}

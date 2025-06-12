<?php
// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';



header('Content-Type: application/json');

// Lấy dữ liệu từ form
$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Kiểm tra dữ liệu
if (!$name || !$email || !$subject || !$message) {
    echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin.']);
    exit;
}

// Gửi mail
$mail = new PHPMailer(true);

try {
    // SMTP cấu hình
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';     // hoặc SMTP server của bạn
    $mail->SMTPAuth = true;
    $mail->Username = 'badaotulong123@gmail.com';    // Email bạn dùng để gửi
    $mail->Password = 'hisl ytee gyip kzat';       // App Password hoặc mật khẩu email
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

$mail->CharSet = 'UTF-8'; // <-- dòng này

    // Nội dung email
    $mail->setFrom($email, $name);
    $mail->addAddress('badaotulong123@gmail.com');  // Email bạn muốn nhận liên hệ

    $mail->Subject = $subject;
    $mail->Body    = "Tên: $name\nEmail: $email\n\nNội dung:\n$message";

    $mail->send();

    echo json_encode(['status' => 'success', 'message' => 'Gửi thành công!']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Không gửi được email.']);
}
?>

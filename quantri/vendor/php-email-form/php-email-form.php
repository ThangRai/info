<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
  $subject = htmlspecialchars($_POST["subject"]);
  $message = htmlspecialchars($_POST["message"]);

  if (!$email) {
    echo "Invalid email address";
    exit;
  }

  $to = "badaotulong123@gmail.com";  // 🔁 Thay bằng email thật bạn muốn nhận thư
  $body = "From: $name\nEmail: $email\n\n$message";

  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";

  if (mail($to, $subject, $body, $headers)) {
    echo "OK";
  } else {
    echo "Email sending failed";
  }
}
?>

<?php
// SECURITY: Allow only POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: index.html");
  exit;
}

// SANITIZE INPUT
$name   = htmlspecialchars(trim($_POST["name"]));
$mobile = htmlspecialchars(trim($_POST["mobile"]));
$edd    = htmlspecialchars(trim($_POST["edd"]));

// BASIC VALIDATION
if (empty($name) || empty($mobile) || empty($edd)) {
  echo "All fields are required.";
  exit;
}

// =======================
// EMAIL CONFIGURATION
// =======================
$to = "your-email@example.com"; // 🔴 CHANGE THIS
$subject = "New Appointment Request - Elite Hospital";

$message = "
New Appointment Request

Name: $name
Mobile: $mobile
EDD: $edd
";

$headers = "From: no-reply@yourdomain.com\r\n";
$headers .= "Reply-To: $mobile\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8";

// SEND EMAIL
mail($to, $subject, $message, $headers);

// =======================
// OPTIONAL: SAVE TO FILE
// =======================
$data = date("Y-m-d H:i:s") . " | $name | $mobile | $edd\n";
file_put_contents("appointments.txt", $data, FILE_APPEND);

// SUCCESS MESSAGE
echo "
<!DOCTYPE html>
<html>
<head>
  <title>Thank You</title>
  <style>
    body {
      font-family: Arial;
      background: #f5f5f5;
      text-align: center;
      padding: 80px;
    }
    .box {
      background: #fff;
      padding: 40px;
      max-width: 500px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    h2 { color: #66cc00; }
  </style>
</head>
<body>
  <div class='box'>
    <h2>Appointment Submitted Successfully!</h2>
    <p>Our team will contact you shortly.</p>
  </div>
</body>
</html>
";
?>

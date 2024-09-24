<?php
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('configuration.php');


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

function sendEmail($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'digitalproductnp@gmail.com';
        $mail->Password   = 'ogqzefziltbgartr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('digitalproductnp@gmail.com', 'Digital Product Nepal');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "
        <html>
        <head>
            <title>Your OTP Code for Digital Product Nepal</title>
        </head>
        <body>
            <p>Dear User,</p>
            <p>Thank you for registering with Digital Product Nepal. To complete your registration, please use the following OTP code:</p>
            <h2 style='color: #2e6c80;'>$otp</h2>
            <p>This OTP is valid for the next 10 minutes. Please do not share this code with anyone.</p>
            <p>If you did not request this OTP, please ignore this email.</p>
            <br>
            <p>Best regards,</p>
            <p>Digital Product Nepal Team</p>
        </body>
        </html>
        ";

        $mail->AltBody = "Your OTP code is $otp.";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['REGISTER'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $selectDatabase = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($selectDatabase);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already registered');</script>";
    } else {
        $stmt->close();
        $otp = rand(100000, 999999);
        $sql = "INSERT INTO users (username, password, email, firstname, lastname, otp, status) VALUES (?, ?, ?, ?, ?, ?, 'inactive')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $username, $password, $email, $firstname, $lastname, $otp);

        if ($stmt->execute()) {
            sendEmail($email, $otp);
            $_SESSION['username'] = $username;
            header('Location: verify.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

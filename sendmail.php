<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
//Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP(); // Sử dụng SMTP để gửi mail
    $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
    $mail->SMTPAuth = true; // Bật xác thực SMTP
    $mail->Username = 'dmhung04@gmail.com'; // Tài khoản email
    $mail->Password = 'bntqtdheuqczugcz'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
    $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
    $mail->Port = 465; // Cổng kết nối SMTP là 465

//Recipients
    $email= $_POST['email'];
    $mail->addAddress($email);
    $mail->setFrom('dmhung04@gmail.com', 'Mingrand'); // Địa chỉ email và tên người gửi
//Content
    $mail->isHTML(true);   // Set email format to HTML
    $mail->Subject = 'Reset your password';
    $code = mt_rand(10000, 99999);
    $_SESSION['code'] = $code;
    if(isset($_POST['email'])){
        $_SESSION['email'] = $_POST['email'];
    }
    $mail->Body = 'Your code to reset password is <b>' . $code.'</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Nội dung

    $mail->send();
    echo "Message has been sent <a href='./sendcode.php'>  Reset your password </a>" ;
} catch (Exception $e) {
    echo "Message could not be sent. <a href='javascript: history.go(-1)'>Go Back</a>";}
?>
<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['submitContact'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['telephone'];
    $message = $_POST['message'];

    
    $data = [
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'phone' => $phone,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    $file = 'contact_form.json';


    if (!file_exists($file)) {
        file_put_contents($file, json_encode([], JSON_PRETTY_PRINT));
    }


    $jsonData = json_decode(file_get_contents($file), true);


    $jsonData[] = $data;


    file_put_contents($file, json_encode($jsonData, JSON_PRETTY_PRINT));


    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'danushkaaberathna0@gmail.com';
        $mail->Password = 'ggizthcvevtflvnv';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender info
        $mail->setFrom('danushkaaberathna0@gmail.com', 'Movie Library');
        $mail->addAddress('danushkaaberathna0@gmail.com', 'Movie Library');
        $mail->addAddress('dumidu.kodithuwakku@ebeyonds.com', 'Movie Library');
        $mail->addAddress('prabhath.senadheera@ebeyonds.com', 'Movie Library');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Movie Library-New Enquiry for Contact Form ';
        $mail->Body = '<h3><b>Hello Admin,</b>You got a New Enquiry for Contact Form </h3>
        <h4>FullName : ' . $firstName . ' ' . $lastName . '</h4> 
        <h4>Email Address : ' . $email . '</h4>
        <h4>Mobile Number : ' . $phone . '</h4>
        <h4>Message : ' . $message . '</h4>';

        if ($mail->send()) {
            $_SESSION['status'] = "Message has been sent";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(0);
        } else {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit(0);
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header('Location: index.php');
    exit(0);
}
?>
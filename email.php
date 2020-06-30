<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require"PHPMailer/vendor/autoload.php";

$from_name = "Dari";
$user_email = "isi email";
$pass_email = "isi password";

$email_penerima = "isi email penerima";
$penerima_nama = "nama_penerima";

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPDebug = true;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $user_email;
    $mail->Password   = $pass_email;
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    //Penerima
    $mail->setFrom($user_email, $from_name);
    $mail->addAddress($email_penerima, $penerima_nama);
    $mail->addReplyTo($user_email, 'Information');

    // Content
    $mail->isHTML(true);
    $mail->Subject = "Sedang mencoba kirim email";
    $mail->Body    = "Mengirim email.. apakah anda melihat pesan ini??";
    $mail->AltBody = "Apakah anda melihat sebuah pesan?";
    $mail->send();
    return true;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
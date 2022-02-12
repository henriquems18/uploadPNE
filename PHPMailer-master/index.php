<?php
header('Content-Type: text/html; charset=UTF-8');
	
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = 2;  
   // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'suporte1.pne@gmail.com';                     // SMTP username
    $mail->Password   = 'Vini.grillo123';                               // SMTP password
 // $mail->SMTPSecure = 'startls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('suporte1.pne@gmail.com', 'Suporte');
    $mail->addAddress('vini_grillo@hotmail.com', '');     // Add a recipient
 // $mail->addAddress('ellen@example.com');               // Name is optional
 // $mail->addReplyTo('info@example.com', 'Information');
 // $mail->addCC('cc@example.com');
 // $mail->addBCC('bcc@example.com');

    // Attachments
 //   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
 //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Alterar Senha';
    $mail->Body    = 'Henrique é Viadão!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Sua nova Senha foi enviada no e-mail!';
} catch (Exception $e) {
    echo "Esse email não esta cadastrado no Banco de Dados! {$mail->ErrorInfo}";
}
?>
<!doctype html>
<html class="no-js" lang="pt-br">

<li><a href="../PHP/logincandidato.php">Voltar</a></li> 
</html>
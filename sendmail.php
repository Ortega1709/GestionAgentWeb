<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.fr';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'test@hostinger-tutorials.fr';
$mail->Password = 'VOTRE MOT DE PASSE ICI';
$mail->setFrom('test@hostinger-tutorials.fr', 'Votre nom');
$mail->addReplyTo('test@hostinger-tutorials.fr', 'Votre nom');
$mail->addAddress('exemple@gmail.com', 'Nom du destinataire');
$mail->Subject = 'Essai de PHPMailer';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'Ceci est le contenu du message en texte clair';
//$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Erreur de Mailer : ' . $mail->ErrorInfo;
} else {
    echo 'Le message a été envoyé.';
}
?>

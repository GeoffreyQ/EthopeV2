<?php

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$sujet = strip_tags(htmlspecialchars($_POST['sujet']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$services = strip_tags(htmlspecialchars($_POST['services']));

$email_subject = 'Éthope - '.$services.' - '.$sujet.'.';

$email_body = '<p>You have received a new message from your website contact form.</p>';
$email_body .= '<p>Name: '.$name.'</p><br />';
$email_body .= '<p>Phone: '.$phone.'</p><br />';
$email_body .= '<p>Email: '.$email_address.'</p><br />';
$email_body .= '<p>Service: '.$services.'</p><br />';
$email_body .= '<p>Sujet: '.$sujet.'</p><br />';
$email_body .= '<p>Message: '.$message.'</p><br />';

date_default_timezone_set('Etc/UTC');

    require '../PHPMailerAutoload.php';

    $mail = new PHPMailer();

    $mail->IsSMTP();                        //Enable SMTP debugging
    $mail->SMTPDebug  = 1;                    // 0 = off (for production use)
    $mail->Debugoutput = 'html';            // 1 = client messages
    $mail->Host       = 'smtp.gmail.com';    // 2 = client and server messages
    $mail->Port       = 465;    // ou 465
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth   = true;
    $mail->Username = "mylene.chaumette@gmail.com";
    $mail->Password = "180987";

    $mail->IsHTML(true);
    $mail->Subject = $email_subject;
    $mail->Body = $email_body;
    $mail->setFrom('noreply@ethope.ca', 'Éthope');
    $mail->addReplyTo('noreply1@ethope.ca', 'Éthope1');
    $mail->AddAddress('mylene.quervel-chaumette@ethope.ca', 'Moi');

    if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else {
      echo "Message sent!";
    }

?>

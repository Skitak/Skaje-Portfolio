<?php
//require_once "vendor/autoload.php";
  
/*$transport = Swift_SmtpTransport::newInstance()
  ->setHost("smtp.1and1.com")
  ->setUsername("bouquinbastien@gmail.com")
  ->setPassword("7409facd190")
  ->setEncryption("tls");

$mail = Swift_Message::newInstance($transport)
  ->setSubject("Portfolio Message")
  ->setFrom("nico.1701@live.fr")
  ->setTo("bas2205@live.fr")
  ->setBody("Hi, this is mah message");

$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($mail);

echo $result;

*/

//$mail = new PHPMailer();
//$mail->isMail();
//Set the hostname of the mail server
//$mail->Host = "smtp.1and1.com";
//Set the SMTP port number - likely to be 25, 465 or 587
//$mail->Port = 25;
//Whether to use SMTP authentication
//$mail->SMTPAuth = true;
//$mail->SMTPSecure = 'tls';
//Username to use for SMTP authentication
//$mail->Username = "bouquinbastien@gmail.com";
//Password to use for SMTP authentication
//$mail->Password = "7409facd190";
/*
$mail->setFrom("nico.1701@live.fr", "quelqu'un");
$mail->Body = "hi";
$mail->Subject ="wow";
$mail->addAddress("bas2205@live.fr", "BB");
if ($mail->Send())
  echo "ok!";
else
  echo $mail->ErrorInfo;*/
/*

if (mail("bas2205@live.fr","wow","hi"))
  echo "done";
else echo "no";*/
/*
$transport = Swift_MailTransport::newInstance();

// Create the message
$message = Swift_Message::newInstance();
$message->setTo(array(
  "bas2205@live.fr" => "Aurelio De Rosa"
));
$message->setSubject("This email is sent using Swift Mailer");
$message->setBody("You're our best client ever.");
$message->setFrom("account@bank.com", "Your bank");

// Send the email
$mailer = Swift_Mailer::newInstance($transport);
$res = $mailer->send($message);
echo $res;*/
    $destinataire = 'bas2205@live.fr';
    $nom     =  'Bouquin';
    $email   =  'nico.1701@live.fr';
    $objet   =  'hi';
    $message =  'Salut bro';
    //$headers = 'From: '.$nom.' <'.$email.'>' . "\r\n";
    if (!mail($destinataire, $objet, $message))
      echo "error";
?>
<?php
  include "header.html";
  require_once 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
  $nom = "";
  $email = "";
  $tel = "";
  $message = "";

  if (!empty($_POST)){
    $nom = !empty($_POST["nom"])? $_POST["nom"] : "";
    $email = !empty($_POST["mail"])? $_POST["mail"] : "";
    $tel = !empty($_POST["telephone"])? $_POST["telephone"] : "";
    $message = !empty($_POST["message"])? $_POST["message"] : "";
    $err = false;
    if (empty($_POST["nom"])){
      echo '<div class="error-name">Veuillez entrer votre nom s\'il vous plaît</div>';
      $err = true;
    }if (empty($_POST["mail"])){
      echo '<div class="error-mail">Veuillez entrer votre adrese email s\'il vous plaît</div>';
      $err = true;
    }if (empty($_POST["message"])){
      echo '<div class="error-mesage">Veuillez entrer un message s\'il vous plaît</div>';
      $err = true;
    } if  (!$err){
      $message = wordwrap ($message, 70, "\r\n");
      if (isset($_POST["telephone"])){
        $message = 'Téléphone : ' . $_POST['telephone'] . ' ' . $message;
      }
      $header = "From: " . $email;
      if (mail("Sorignet.gautrot.arthur@gmail.com","Portfolio message de $nom",$message, $header))
        echo "done";
      else
        echo "error";
      /*$mail = new PHPMailer();
      $mail->isMail();
      $mail->Host = "smtp.1and1.com";
      $mail->Port = 25;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';

      $mail->Username = "bouquinbastien@gmail.com";
      $mail->Password = "7409facd190";

      $mail->SetFrom($email,$nom);
      $mail->AddAddress("bas2205@live.fr", "Arthur");
      $mail->Subject = "Portfolio message";
      $mail->Body = $message;
      if ($mail->Send())
        echo "done";
        else
          echo $mail->ErrorInfo;*/
    }
  }

 ?>
  <form class="contact" action="Contact.php" method="post">
    <fieldset>
      <label for="nom">Nom complet*</label>
      <input type="text" name="nom">
    </fieldset>
    <fieldset>
      <label for="mail">Email*</label>
      <input type="email" name="mail">
    </fieldset>
    <fieldset>
      <label for="telephone">Téléphone</label>
      <input type="text" name="telephone">
    </fieldset>
    <fieldset>
      <label for="message">Message</label>
      <textarea name="message"></textarea>
    </fieldset>
      <input type="submit" value="Envoyer">
  </form>
</body>

</html>

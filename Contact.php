<?php
  include "header.html";
  require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
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
      $mail = new PHPMailer;
      $mail->setFrom($email);
      $mail->addAddress("bas2205@live.fr");
      $mail->Subject = "Portfolio message from : $nom";
      $mail->Body = $message;
      if ($mail->send())
        echo "done";
        else echo "error : " . $mail->ErrorInfo;
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

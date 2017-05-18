<?php
  if (!session_id ())
    session_start();

  if ($_SESSION["connected"]){
  header("Location:http://arthursorignet.com/menu.php");
  exit();
  }

  if (!empty($_POST)){
    if (empty($_POST["mail"]) || empty($_POST["mdp"])){
      echo "remplie tous les champs stp gros";
    }
    else {
      $connection = new mysqli("sql11.freesqldatabase.com", "sql11173301", "AbDUiMCajz", "sql11173301");
      $query = $connection->query("SELECT mail, mdp from ACCOUNT")->fetch_assoc();
      if ($_POST["mail"] !== $query["mail"] || hash('sha256', $_POST["mdp"]) !== $query["mdp"]){
        echo "Nope, t'as fait une faute gros.";
      } else {
        $_SESSION["connected"] = true;
          header("Location:http://arthursorignet.com/menu.php");
          exit();
      }
  }
}
  include "header.html";
?>
<form class="connexion" action="connexion.php" method="post">
  <fieldset>
    <label for="mail">Mail</label>
    <input type="text" name="mail">
  </fieldset>
  <fieldset>
    <label for="mdp">Mot de passe</label>
    <input type="password" name="mdp">
  </fieldset>
    <input type="submit" value="Envoyer">
</form>

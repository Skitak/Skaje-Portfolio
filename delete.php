<?php

if (!session_id ())
  session_start();

if (!isset($_SESSION["connected"]) || !$_SESSION["connected"]){
  header("Location:http://arthursorignet.com/connexion.php");
  exit();
}

$connection = new mysqli("sql11.freesqldatabase.com", "sql11173301", "AbDUiMCajz", "sql11173301");
$image = $connection->query("SELECT image FROM GAME WHERE id='" . $_GET["id"] . "'")->fetch_assoc()["image"];
unlink("Images/" . $image);
$query = $connection->query("DELETE FROM GAME WHERE id='" . $_GET["id"] . "'");

header("Location:http://arthursorignet.com/menu.php");
exit();
?>

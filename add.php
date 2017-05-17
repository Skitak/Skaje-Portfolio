<?php

if (!session_id ())
  session_start();

if (!isset($_SESSION["connected"]) || !$_SESSION["connected"]){
  header("Location:http://192.168.0.100/connexion.php");
  exit();
}

$connection = new mysqli("sql11.freesqldatabase.com", "sql11173301", "AbDUiMCajz", "sql11173301");
$query = $connection->query("INSERT INTO GAME (title,image,link,text) VALUES ('title','template.jpeg','http://arthursorignet.com', 'template, should be full')");
header("Location:http://192.168.0.100/menu.php");
exit();
?>

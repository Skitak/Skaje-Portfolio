<?php

if (!session_id ())
  session_start();

if (!isset($_SESSION["connected"]) || !$_SESSION["connected"]){
  header("Location:http://arthursorignet.com");
  exit();
}

$_SESSION["connected"] = false;
header("Location:http://arthursorignet.com");
exit();
?>

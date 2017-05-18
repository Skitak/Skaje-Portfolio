<?php

if (!session_id ())
  session_start();

if (!isset($_SESSION["connected"]) || !$_SESSION["connected"]){
  header("Location:http://arthursorignet.com/connexion.php");
  exit();
}

  $connection = new mysqli("sql11.freesqldatabase.com", "sql11173301", "AbDUiMCajz", "sql11173301");
  $query = $connection->query("SELECT image, title, link, id FROM GAME ORDER BY id desc");
  include "header.html";

?>

<article class="php-menu">
  <a href="add.php" class="php-menu-game-add">
    ADD
  </a>
<?php
  while ($row = $query->fetch_assoc()) { ?>
    <div class="php-menu-game">
      <h2><?php echo $row['title'];?> : <?php echo $row['id'];?></h2>
      <a href=<?php echo '"' . $row['link'] . '"';?>>
        <div class="php-menu-game-bottom">
          <img src=<?php echo '"Images/' . $row['image'] . '"';?> width="300px" height="200px">
          <div class="php-menu-game-icons">
            <a href=<?php echo '"http://arthursorignet.com/modifs.php?id=' . $row['id'] . '"';?> class="modif"></a>
            <a href=<?php echo '"http://arthursorignet.com/delete.php?id=' . $row['id'] . '"';?> class="delete"></a>
          </div>
        </div>
      </a>
    </div>
  <?php
  }
?>

</article>
</body>
</html>

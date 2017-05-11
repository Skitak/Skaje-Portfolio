<?php
  if (!session_id ())
    session_start();
  include "header.html";

  $_SESSION["bdd"] = array();
  $_SESSION["hi"] = "hi";
  $_SESSION["bdd"]["Address"] = "sql11.freesqldatabase.com";
  $_SESSION["bdd"]["user"] = "sql11173301";
  $_SESSION["bdd"]["password"] = "AbDUiMCajz";
  $_SESSION["bdd"]["name"] = "sql11173301";

  $connection = new mysqli($_SESSION["bdd"]["Address"],
                           $_SESSION["bdd"]["user"],
                           $_SESSION["bdd"]["password"],
                           $_SESSION["bdd"]["name"]);

  $query = $connection->query("SELECT id, image, title FROM GAME ORDER BY id desc");

 ?>
  <content class="l-body-carousel">
    <div class="pannel Left"><span class="arrow"></span></div>
    <div class="pannel Right"><span class="arrow"></span></div>
    <?php
    $number = 0;
    $class;
      while ($row = $query->fetch_assoc()){
        if ($number == 0)
          $class = "show-right";
        else if ($numer == 1)
          $class = "fading";
        else $class = "hidden";
          $number++?>
        <a href=<?php echo '"Jeu.php?id=' . $row['id'] . '"';?> class=<?php echo '"' . $class . '"';?>>
          <article >
            <img src=<?php echo '"Images/' . $row['image'] . '"';?> alt="Bjr">
            <h2><?php echo $row['title'];?></h2>
          </article>
        </a>

        <?php
      }
    ?>
  </content>
  <script src="JavaScript/index.js"></script>
</body>

</html>

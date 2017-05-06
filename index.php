<?php
  include "header.html";
  $bdd_Address = "localhost";
  $bdd_user = "skitak";
  $bdd_password = "uic75015";
  $bdd_name = "Arthur";

  $connection = new mysqli($bdd_Address, $bdd_user, $bdd_password, $bdd_name);

  $query = $connection->query("SELECT title,image,link FROM GAME");

 ?>
  <content class="l-body-carousel">
    <div class="pannel Left"><span class="arrow"></span></div>
    <div class="pannel Right"><span class="arrow"></span></div>
    <?php

      while ($row = $query->fetch_assoc()){?>

        <a href="#" class="hidden">
          <article >
            <img src=<?php echo '"Images/' . $row['image'] . '"';?> alt="Bjr">
            <h2>Nom de jeu</h2>
          </article>
        </a>

        <?php
      }
    ?>
  </content>
  <script src="JavaScript/index.js"></script>
</body>

</html>

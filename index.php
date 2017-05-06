<?php
  include "header.html";

  $bdd_Address = "localhost";
  $bdd_user = "skitak";
  $bdd_password = "uic75015";
  $bdd_name = "arthur";

  $connection = new mysqli($bdd_Address, $bdd_user, $bdd_password, $bdd_name);

  $query = $connection->query("SELECT name,image,link FROM game");

 ?>
  <content class="l-body-carousel">
    <div class="pannel Left"><span class="arrow"></span></div>
    <div class="pannel Right"><span class="arrow"></span></div>
    <?php

      for ($rowNum = $query->num_rows -1 ; $rowNum >= 0; $rowNUm--){
        $query->data_seek($row_no);
        $row = $res->fetch_assoc();?>

        <a href="#" class="hidden">
          <article >
            <img src=<?php echo '"' . $row['image'] . '"';?> alt="Bjr">
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

<?php
  if (!session_id ())
    session_start();
  include "header.html";
  if (empty($_GET["id"])){
    echo "error";
    require "errorRequest.html";
  } else if (!isset($_SESSION["bdd"])){
    echo $_SESSION["hi"];
    echo "no session variable yets";
  }
  else {
    $connection = new mysqli($_SESSION["bdd"]["Address"],
                           $_SESSION["bdd"]["user"],
                           $_SESSION["bdd"]["password"],
                           $_SESSION["bdd"]["name"]);
    $query = $connection->query('SELECT * FROM GAME where id="' . $_GET['id'] .'"');
    if ($row = $query->fetch_assoc()){
?>

  <article class="l-body-game">
    <h2><?php echo $row["title"]?></h2>
    <div class="image-link-container">
      <a href=<?php echo '"' . $row["link"] . '"'?> class="image-link"></a>
      <img src=<?php echo '"Images/' . $row["image"] . '"'?> alt="Bjr">
    </div>
    <p>
          <?php echo '"' . $row["text"] . '"'?></p>
  </article>
</body>

</html>
<?php
  } else {
        echo 'Le jeu numero ' . $_GET['id'] . ' n\'existe pas.';
    }
  }
 ?>
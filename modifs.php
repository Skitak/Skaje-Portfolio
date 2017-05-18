<?php
if (!session_id ())
  session_start();

if (!isset($_SESSION["connected"]) || !$_SESSION["connected"]){
  header("Location:http://arthursorignet.com/connexion.php");
  exit();
}
$connection = new mysqli("sql11.freesqldatabase.com", "sql11173301", "AbDUiMCajz", "sql11173301");
if (!empty($_POST)){
  if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){
    $query = $connection->query("UPDATE GAME SET id='" . $_POST["id"] . "',title='"
                            . $_POST["title"] . "', link='" . $_POST["link"] . "',text='" .
                              $_POST["text"] . "' WHERE id='" . $_GET["id"] . "'");
    header("Location:http://arthursorignet.com/menu.php");
    exit();
  } else {
  $query = $connection->query("SELECT image FROM GAME where id='" . $_GET["id"] . "'")->fetch_assoc();
  $target_dir = "Images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "Image needed gros";
          $uploadOk = 0;
      }
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "format jgp, jpeg, png ou gif stp";
      $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo "il y a eu un problème du coup gros";
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        unlink($target_dir . $query["image"]);
        $query = $connection->query("UPDATE GAME SET id='" . $_POST["id"] . "',title='" . $_POST["title"] . "',image='" .
                                       $_FILES["fileToUpload"]["name"] .
                                      "',link='" . $_POST["link"] . "',text='" .
                                      $_POST["text"] . "' WHERE id='" . $_GET["id"] . "'");
        header("Location:http://arthursorignet.com/menu.php");
        exit();
      } else {
        echo "Ha merde, il y a eu un problème ... Envoie un sms et j'essaie de règler ça (j'ai dû reçevoir un mail normalement)";
        mail("bas2205@live.fr","pb site Arthur", "Faut que tu check le site de Arthur, il a pas pu upload.");
      }
  }

}
}
else {
  $query = $connection->query("SELECT text, title, link, id FROM GAME where id='" . $_GET["id"] . "'");
  $row = $query->fetch_assoc();
  include "header.html";

  ?>

  <form class="modifs" action=<?php echo '"modifs.php?id=' . $_GET['id'] . '"';?> method="post" enctype="multipart/form-data">
    <fieldset>
      <label for="id">id</label>
      <input type="number" name="id" value=<?php echo '"' . $row['id'] . '"';?> required>
    </fieldset>
    <fieldset>
      <label for="title">titre</label>
      <input type="text" name="title" value=<?php echo '"' . $row['title'] . '"';?> required>
    </fieldset>
    <fieldset>
      <label for="link">lien</label>
      <input type="url" name="link" value=<?php echo '"' . $row['link'] . '"';?> required>
    </fieldset>
    <fieldset>
      <label for="text">text</label>
      <textarea name="text">
<?php echo $row['text'];?>
      </textarea>
    </fieldset>
    <fieldset>
      <label for="fileToUpload">fichier</label>
      <input type="file" name="fileToUpload">
    </fieldset>
      <input type="submit" value="Envoyer">
  </form>
</body>
</html>
  <?php
}
?>

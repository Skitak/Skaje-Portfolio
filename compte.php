<?php
if (!session_id ())
  session_start();

if (!isset($_SESSION["connected"]) || !$_SESSION["connected"]){
  header("Location:http://arthursorignet.com");
  exit();
}

$connection = new mysqli("sql11.freesqldatabase.com", "sql11173301", "AbDUiMCajz", "sql11173301");

function uploadFile($nameOfFile, $connection){
  $query = $connection->query("SELECT $nameOfFile FROM ACCOUNT")->fetch_assoc();
  $target_dir = "Assets/";
  $target_file = $target_dir . basename($_FILES[$nameOfFile]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES[$nameOfFile]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "Image needed gros";
          $uploadOk = 0;
      }
  }
  if ($uploadOk == 0) {
    echo "il y a eu un problème du coup gros";
  } else {
      if (move_uploaded_file($_FILES[$nameOfFile]["tmp_name"], $target_file)) {
        unlink($target_dir . $query[$nameOfFile]);
        $query = $connection->query("UPDATE ACCOUNT SET $nameOfFile='" . $_FILES[$nameOfFile]["name"] . "'");
      } else {
        echo "Ha merde, il y a eu un problème ... Envoie un sms et j'essaie de règler ça (j'ai dû reçevoir un mail normalement)";
        mail("bas2205@live.fr","pb site Arthur", "Faut que tu check le site de Arthur, il a pas pu upload.");
      }
  }
}
if (!empty($_POST)){
  if(!(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name']))){
    uploadFile("image", $connection);
  }

  if(!(!file_exists($_FILES['cv']['tmp_name']) || !is_uploaded_file($_FILES['cv']['tmp_name']))){
    uploadFile("cv", $connection);
  }

    $query = $connection->query("UPDATE ACCOUNT SET mail='" . $_POST["mail"] . "',text='"
                            . $_POST["text"] . "'");
    header("Location:http://arthursorignet.com/menu.php");
    exit();
}
else {
  $query = $connection->query("SELECT mail, text FROM ACCOUNT");
  $row = $query->fetch_assoc();
  include "header.html";

  ?>

  <form class="modifs" action="compte.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <label for="mail">mail</label>
      <input type="email" name="mail" value=<?php echo '"' . $row['mail'] . '"';?> required>
    </fieldset>
    <fieldset>
      <label for="text">text</label>
      <textarea name="text"><?php echo $row['text'];?></textarea>
    </fieldset>
    <fieldset>
      <label for="image">Photo</label>
      <input type="file" name="image">
    </fieldset>
    <fieldset>
      <label for="cv">CV</label>
      <input type="file" name="cv">
    </fieldset>
      <input type="submit" value="submit">
  </form>
</body>
</html>
  <?php
}
?>

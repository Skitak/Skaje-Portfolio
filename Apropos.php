<?php
$connection = new mysqli("sql11.freesqldatabase.com", "sql11173301", "AbDUiMCajz", "sql11173301");
$query = $connection->query("SELECT image, text FROM ACCOUNT")->fetch_assoc();

  include "header.html";
 ?>
  <img src=<?php echo "'Assets/" . $query["image"] . "'"?>"Assets/logo.png" alt="logo" width="200px" height="200px">
  <h1>Arthur Sorignet--Gautrot</h1>
  <p><?php echo $query["text"] ?></p>

</body>

</html>

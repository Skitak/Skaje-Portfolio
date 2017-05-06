<?php
  include "header.html";
 ?>
  <form class="contact" action="Contact.html" method="post">
    <fieldset>
      <label for="nom">Nom complet*</label>
      <input type="text" name="nom">
    </fieldset>
    <fieldset>
    <label for="nom">Email*</label>
    <input type="email" name="mail">
    </fieldset>
    <fieldset>
    <label for="nom">Téléphone</label>
    <input type="text" name="telephone">
    </fieldset>
    <fieldset>
    <label for="nom">Message</label>
    <textarea name="message"></textarea>
    </fieldset>
    <input type="submit" value="Envoyer">
  </form>
</body>

</html>

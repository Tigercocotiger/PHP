<form method="POST" action="test.php">
  <label for="theme">Choisir un thème:</label>
  <select name="theme" id="pet-select">
    <option value="0">--Please choose an option--</option>
    <?php

    include_once 'conn.php';
    $result = $objPdo->query("select * from theme ");
    foreach ($result as $row)
      echo "<option value=" . $row['idtheme'] . ">" . $row['description'] . "</option>";

    ?>
  </select>
  <input type="submit" value="Envoyer">
</form>


<?php
if ($_POST) {
  $test = $_POST['theme'];
  if ($test == 0) {
    echo "<script>alert('Veuillez selectionnez un thème')</script>";
  } else {
    include_once 'conn.php';
    $result = $objPdo->query("select * from theme where idtheme=$test ");
    foreach ($result as $row)
    echo $row['description'];
  }
} ?>
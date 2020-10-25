<html>
</head>


<body>
  <form method="POST" action="newcompte.php">
    <div class="container">
      <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="nom"><b>Nom</b></label>
      <input type="text" placeholder="Enter nom" name="nom" value="<?php if (isset($_POST['nom'])) {
                                                                      echo htmlentities($_POST['nom']);
                                                                    } ?>" required>

      <label for="prenom"><b>Prénom</b></label>
      <input type="text" placeholder="Enter prénom" name="prenom" value="<?php if (isset($_POST['prenom'])) {
                                                                            echo htmlentities($_POST['prenom']);
                                                                          } ?>" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" value="<?php if (isset($_POST['email']) && testmail($_POST['email'])) {
                                                                          echo htmlentities($_POST['email']);
                                                                        } ?>" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      <hr>
      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

      <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
      <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
    <?php

    if ($_POST) {
      $today = date("Y-n-j");
      include('conn.php');
      $_POST['nom'] = trim(htmlentities($_POST['nom']));
      $_POST['prenom'] = trim(htmlentities($_POST['prenom']));
      $_POST['email'] = trim(htmlentities($_POST['email']));
      $_POST['psw'] = trim(htmlentities($_POST['psw']));
      $_POST['psw-repeat'] = trim(htmlentities($_POST['psw-repeat']));
      if (testmail($_POST['email'])) {
        if ($_POST['psw'] == $_POST['psw-repeat']) {
          if (testpsw($_POST['psw'])) {
            $insert_stmt = $objPdo->prepare("INSERT INTO redacteur (nom,prenom,email,motdepasse,datecompte) VALUES(:nomS, :prenomS, :emailS, :motdepasseS, :datecompteS)");
            $insert_stmt->bindValue('nomS', $_POST['nom'], PDO::PARAM_STR);
            $insert_stmt->bindValue('prenomS', $_POST['prenom'], PDO::PARAM_STR);
            $insert_stmt->bindValue('emailS', $_POST['email'], PDO::PARAM_STR);
            $insert_stmt->bindValue('motdepasseS', $_POST['psw'], PDO::PARAM_STR);
            $insert_stmt->bindValue('datecompteS', $today, PDO::PARAM_STR);
            $insert_stmt->execute();
            echo "<script>alert('ajout ok')</script>";
            session_start();
            $_SESSION['login'] = 'ok';
            $_SESSION['user'] = $_POST['email'];
            header("location: accueil.php");

          } else echo "<script>alert('Le mot de passe doit faire 8 charactères minimum et doit contenir :         1 majuscule  1 chiffre   et 1 caratère spécial ')</script>";
        } else echo "<script>alert('les mots de passe sont différents')</script>";
      } else echo "<script>alert('Email déjà utilisé ou format incorect')</script>";
    }

    function testmail($mail)
    {
      if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        include('conn.php');
        $stmt = $objPdo->query("select * from redacteur where email = '$mail'");
        $stmt->execute([$mail]);
        $user = $stmt->fetch();
        if (!$user) {
          return true;
        } else
          return false;
      } else
        return false;
    }

    function testpsw($psw)
    {
      // Given password
      $password = $psw;

      // Validate password strength
      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      $number    = preg_match('@[0-9]@', $password);
      $specialChars = preg_match('@[^\w]@', $password);

      if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        return false;
        //echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
      } else {
        return true;
        echo 'Strong password.';
      }
    }

    ?>
  </form>

</body>

</html>
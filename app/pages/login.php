<?php
  include '../components/header.php';
?>

<link href="../public/css/register-login.css" rel="stylesheet">

<div class="back">
  <img class="back__image" src="../public/icons/arrow.svg" alt="Flèche retour">
  <a class="back__link" href="../index.php">Retour à l'accueil</a>
</div>

  <section class="homepage">

    <div class="container">

      <div class="logo">
        <img class="logo__image" src="../public/images/logo-hetic.svg" alt="">
      </div>

      <form class="form" action="../controllers/login.php" method="POST">

        <div class="error-container">
          <input class="input input--email" type="name" name="name" placeholder="Pseudo">
          <p class="error error--email"></p>
        </div>

        <div class="error-container">
          <input class="input input--password" type="password" name="password" placeholder="Mot de passe">
          <p class="error error--password"></p>
        </div>

        <button class="button">Se connecter</button>
      </form>

      <?php 
        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

        if($query) {
          parse_str($query, $params);

          $error_code = intval($params["error"], 10);
  
          $errors = [
            1 => "Le mot de passe n'est pas bon.",
            2 => "L'utilisateur n'existe pas, <a class='error-bdd__link' href='register.php'>créer un compte</a>.",
          ];
   
          if (array_key_exists($error_code, $errors)) {
            echo '<div class="error-bdd"> <p>' . $errors[intval($params["error"], 10)] . '</p> </div>'; 
          }
          else 
            echo "<p>Erreur inconnue</p>";
        }
      ?>

    </div>

  </section> 

  <script src="../public/js/auth/login.js" type="module"></script>

  
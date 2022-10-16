<?php
  include '../components/header.php';
?>

<link href="../public/css/register-login.css" rel="stylesheet">
</head>

<body>

  <div class="back">
    <img class="back__image" src="../public/icons/arrow.svg" alt="Flèche retour">
    <a class="back__link" href="../index.php">Retour à l'accueil</a>
  </div>

  <section class="homepage">
    <div class="container">

      <div class="logo">
          <img class="logo__image" src="../public/images/logo-hetic.svg" alt="">
      </div>

      <form class="form" action="../controllers/register.php" method="POST">

        <div class="error-container">
          <input class="input input--email" type="text" name="name" placeholder="Pseudo">
          <p class="error error--email"></p>
        </div>  

        <div class="error-container">
          <input class="input input--password" type="password" name="password" placeholder="Mot de passe" minlength="1">
          <p class="error error--password"></p>
        </div>

        <div class="error-container">
          <input class="input input--confirm-password" type="password" name="password_confirmation" placeholder="Confirmation du mot de passe" data-confirmError="Les deux mots de passe ne correspondent pas.">
          <p class="error error--confirm-password"></p>
        </div>

        <div class="admin-container">
          <input class="admin-container__input" name="admin" type="checkbox">
          <p class="admin-container__text">Avoir le statut de admin.</p>
        </div>
        <button class="button">Créer un compte</button>
      </form>   

      <?php 
        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

        if($query) {
          parse_str($query, $params);

          $error_code = intval($params["error"], 10);
  
          $errors = [
            1 => 'Le pseudo est déjà associé à un compte, <a class="error-bdd__link" href="login.php">connectez-vous</a>.',
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

<?php include '../components/footer.php' ?>

<script src="../public/js/auth/register.js" type="module"></script>

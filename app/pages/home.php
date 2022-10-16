<?php
  include '../components/header.php';
?>

  <link href="../public/css/home.css" rel="stylesheet">

  <section class="section-publication">

    <p class="user">Username</p>

    <button class="logout">Se déconnecter</button>

    <form class="form" action="../controllers/publication.php" method="POST">
      <div class="error-container">
        <input class="input input--text" type="text" name="publication" placeholder="Écrire une publication...">
        <p class="error error--text"></p>
      </div>
      <button class="button">Publier</button>
    </form>

    <div class="publications">
      <div class="publication">
        <button class=" publication__delete">Supprimer</button>
        <p class="publication__content">Je suis un super post</p>
      </div>

      <div class="publication">
        <p class="publication__content">Je suis un super post</p>
      </div>
      
    </div>

  </section>

  

  <script src="../public/js/publication.js" type="module"></script>

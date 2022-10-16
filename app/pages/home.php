<?php
  session_start();
  include '../components/header.php';
  require_once "../database/pdo.php";

  $publications = $pdo -> prepare("SELECT * FROM posts");
  $publications -> execute();
?>

  <link href="../public/css/home.css" rel="stylesheet">

  <section class="section-publication">

    <p class="user"><?php echo $_SESSION['user']['name']?></p>

    <a href="../controllers/logout.php" class="logout">Se déconnecter</a>

    <form class="form" action="../controllers/publication.php" method="POST">
      <div class="error-container">
        <input class="input input--text" type="text" name="publication" placeholder="Écrire une publication...">
        <p class="error error--text"></p>
      </div>
      <button class="button">Publier</button>
    </form>

    <div class="publications">

      <?php foreach($publications as $publication){ ?>
        <div class="publication">
          <?php if($_SESSION['user']['user_id'] === $publication['user_id'] || $_SESSION['user']['admin'] === 1):?>
            <a href="../controllers/delete_post.php?id=<?=$publication['post_id']?>" class="publication__delete">Supprimer</a> 
          <?php endif ?>
          <p class="publication__content"> <?php echo $publication['content']?></p>
        </div>
      <?php } ?>
    </div>
  </section>
  <script src="../public/js/publication.js" type="module"></script>

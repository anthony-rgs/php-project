<?php
  include 'components/header.php';
?>

<link href="../public/css/index.css" rel="stylesheet">


<section class="homepage">
  <img class="logo" src="../public/images/logo-hetic.svg" alt="Logo de l'école HETIC">
  <div class="container">
    <div class="homepage-content">
      <img class="homepage-image homepage-image--computer" src="../public/images/homepage-image.png" alt="Image de présentation de l'école">
      <div class="presentation">
        <h1 class="presentation__h1">L'information et le partage par les étudiants !</h1>
        <p class="presentation__text">Connectez-vous avec votre pseudo et rejoignez la communauté de HETIC. Partagez, parrainez et entraidez-vous.</p>
        <div class="buttons">
          <a class="button button--login" href="../pages/login.php"><p class="button__text">Se connecter</p> </a>
          <a class="button button--register" href="../pages/register.php"><p class="button__text">Créer un compte</p></a>
        </div>
      </div>
    </div>
  </div>
  
</section>

<footer class="footer"><p class="footer__text">Réalisé par <a class="footer__link" href="https://anth.ooo" target="blank">Anthony Ringressi</a></p></footer>



<?php
  include 'components/footer.php'
?>
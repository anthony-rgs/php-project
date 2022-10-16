<?php
  session_start();
  require_once "../database/pdo.php";

  $content = htmlspecialchars($_POST['publication']);

  $insert = $pdo -> prepare("INSERT INTO posts (user_id, content) VALUES (:user_id, :content)");
  $insert -> execute(array(
    ':user_id' => $_SESSION['user']['user_id'],
    ':content' => $content
  ));

  header('Location: ../pages/home.php'); die();
?>
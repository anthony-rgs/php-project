<?php
  require_once "../database/pdo.php";

  $content = htmlspecialchars($_POST['publication']);
  $user_id = 1;

  // var_dump($content);

  $insert = $pdo -> prepare("INSERT INTO posts (user_id, content) VALUES (:user_id, :content)");
  $insert -> execute(array(
    ':user_id' => $user_id,
    ':content' => $content
  ));

  header('Location: ../pages/home.php'); die();
?>
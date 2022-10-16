<?php
  session_start();
  require_once "../database/pdo.php";

  if(isset($_GET['id'])){
    $delete = $pdo -> prepare("DELETE FROM posts WHERE post_id = :post_id");
    $delete -> execute(array(
      ":post_id" => $_GET['id']
    ));
  }
  header('Location: ../pages/home.php'); die();
  ?>
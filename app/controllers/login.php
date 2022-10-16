<?php 
  session_start();
  require_once '../database/pdo.php';

  $name = htmlspecialchars($_POST['name']);
  $password = htmlspecialchars($_POST['password']);

  $check = $pdo -> prepare('SELECT name, password FROM users WHERE name = :name');
  $check -> execute(array(':name' => $name));
  $data = $check -> fetch();
  $row = $check -> rowCount();

  if($row > 0) {
    if(password_verify($password, $data['password'])){
      $check = $pdo -> prepare('SELECT name, user_id, admin FROM users WHERE name = :name');
      $check -> execute(array(':name' => $name));
      $data = $check -> fetch();
  
      $_SESSION['user'] = $data;
      header('Location: ../pages/home.php'); die();
    }
    else 
      header('Location: ../pages/login.php?error=1'); die();
  }
  header('Location: ../pages/login.php?error=2'); die();
?>
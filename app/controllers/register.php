<?php
  session_start();
  require_once "../database/pdo.php";

  $name = htmlspecialchars($_POST['name']);
  $check = $pdo -> prepare('SELECT name, user_id FROM users WHERE name = :name');
  $check -> execute(array(':name' => $name));
  $data = $check -> fetch();
  $row = $check -> rowCount();

  if($row === 0) {
    $password = htmlspecialchars($_POST['password']);
    $cost = ['cost' => 12];
    $password_hash = password_hash($password, PASSWORD_BCRYPT, $cost);
    $admin = @htmlspecialchars($_POST['admin']);

    if(empty($admin)){
      $admin = 0;
    }
    else 
      $admin = 1;
  
    $insert = $pdo -> prepare("INSERT INTO users (name, password, admin) VALUES (:name, :password, :admin)");
    $insert -> execute(array(
        ':name' => $name,
        ':password' => $password_hash,
        'admin' => $admin
    ));

    $check = $pdo -> prepare('SELECT name, user_id, admin FROM users WHERE name = :name');
    $check -> execute(array(':name' => $name));
    $data = $check -> fetch();

    $_SESSION['user'] = $data;
    header('Location: ../pages/home.php'); die();
  }

  header('Location: ../pages/register.php?error=1'); die();


?>
<?php
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

  $pass = md5($pass."salt5");

  $mysql = new mysqli('localhost', 'root', 'root', 'register-db');

  $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass' ");

  $user = $result->fetch_assoc();
//ini_set('display_errors', 1);
  if (!is_countable($user)) {
    $result = $mysql->query("SELECT * FROM `admins` WHERE `login` = '$login' AND `pass` = '$pass' ");
    $admin = $result->fetch_assoc();
    if (!is_countable($admin)) {
      echo "Пользователь не найден";
      exit();
    }
    
    setcookie('admin', $admin['login'], time() + (86400 * 30), "/"); // 86400 = 1 day
    $mysql->close();
    header("Location: /");
    exit();
  } 

  setcookie('user', $user['login'], time() + (86400 * 30), "/"); // 86400 = 1 day
  $mysql->close();
  header("Location: /");
  exit();

?>


<?php
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

//   if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
//     echo "Недопустимая длинна логина";
//     exit();
//   } else if (mb_strlen($name) < 4 || mb_strlen($name) > 90) {
//     echo "Недопустимая длинна имени";
//     exit();
//   } else if (mb_strlen($pass) < 4 || mb_strlen($pass) > 90) {
//     echo "Недопустимая длинна пароля (от 4 симолов до 90)";
//     exit();
//   }

  $pass = md5($pass."salt5");

  $mysql = new mysqli('localhost', 'root', 'root', 'register-db');
  $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");
  $mysql->close();
  header("Location: /");
  exit();
?>
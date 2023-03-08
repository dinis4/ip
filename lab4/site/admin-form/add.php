<?php
    $login = $_POST['login'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $pass = md5($pass."salt5");
    $mysql = new mysqli('localhost', 'root', 'root', 'register-db');
    $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");
    $mysql->close();
    header("Location: /");
    exit();
?>
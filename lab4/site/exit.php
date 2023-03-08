<?php
    setcookie('user', $user['login'], -1, "/");
    setcookie('admin', $user['login'], -1, "/");
    header("Location: /");
?>
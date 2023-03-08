<?php
    $id = $_POST['id'];
    // echo "User Has submitted the form and entered this name : <b> $name </b>";
    $mysql = new mysqli('localhost', 'root', 'root', 'register-db');
    $result = mysqli_query($mysql, "DELETE FROM users WHERE id=$id");
    header("Location: /");
    exit();
?>
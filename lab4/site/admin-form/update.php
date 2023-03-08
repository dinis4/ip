<?php
    $log = $_POST['log'];
    $id = $_POST['id'];

    $mysql = new mysqli('localhost', 'root', 'root', 'register-db');
    // $mysql->query("UPDATE  `users` (`login`) VALUES('$log') WHERE id=$id");
    $sql = "UPDATE users SET login='$log' WHERE id=$id";
    $mysql->query($sql);
    // if ($mysql->query($sql)) {
        
    //     echo "Record updated successfully";
    // } else {
    //     echo "Error updating record: " . $conn->error;
    // }
    $mysql->close();
    header("Location: /");
    exit();
?>
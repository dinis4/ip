
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>inserting PHP code into html</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    if(isset($_COOKIE['user']) == true) {
        readfile("user.php");
    } else if (isset($_COOKIE['admin']) == true){
        include("admin.php");
    } else {
        readfile("auth.html");
    }
    ?>
</body>
</html>
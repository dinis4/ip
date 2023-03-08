<?php
  $mysql = new mysqli('localhost', 'root', 'root', 'register-db');

  $query = $mysql->query("SELECT * FROM `users`");
  while($row = $query->fetch_array()){
    $id = $row['id'];
    $log = $row['login'];

      echo "<table id='$id'>";
      echo "<tr>";
      //   echo "<td>".$row['login']."</td>";
      //   echo "<td>".$row['id']."</td>";
    //   echo "<td><input value='$log' name='log' ></td>";
      echo '
      <form method="post" action="admin-form/update.php">
      <td><input value='.$log.' name="log" ></td>
      <td>
      <button class="btn btn-info" name="id" value='.$id.'>обновить</button>
      </form></td>';
      echo '<td><form method="post" action="admin-form/delete.php">
      <button class="btn btn-danger" name="id" value='.$id.'>удалить</button>
      </form></td>';
      echo "</tr>";
      echo "</table>";
    }


echo '<td><form method="post" action="admin-form/add.php" class="pt-4">
<input type="text" class="form-control w-25" name="login" id="login" placeholder="Введите логин"/><br>
<input type="text" class="form-control w-25" name="name" id="name" placeholder="Введите имя"/><br>
<input type="text" class="form-control w-25" name="pass"  id="pass"  placeholder="Введите пароль"/>  <br>
<button class="btn btn-success mb-2">Добавить</button></form></td>';

echo "Чтобы выйти нажмите <a href='exit.php'>Здесь</a>"

?>
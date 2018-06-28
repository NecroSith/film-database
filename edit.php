<?php 

require('config.php');
require('dbconnect.php');

$connect = dbconnect();

require('films.php');

if (array_key_exists('update', $_POST)) {

  if ($_POST['name'] == '') {
    $errors[] = "Не введено навзание фильма";
  }
  else if ($_POST['genre'] == '') {
    $errors[] = "Не введен жанр фильма";
  }
  else if ($_POST['year'] == '') {
    $errors[] = "Не указан год создания фильма";
  }
  else {
    $result = update_film($connect, $_POST['name'], $_POST['genre'], $_POST['year'], $_GET['id']);

    if($result) {
      // $success = true;
      echo "<div class='success'>Ошибка. Фильм не был добавлен в базу.</p>";
    }
    else {
      echo "<div class='error'>Ошибка. Фильм не был добавлен в базу.</p>";
      // $success = false;
    }
  }

}

$film = get_film($connect, $_GET['id']);

 include('views/head.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');

?>





<?php 

require('config.php');
require('dbconnect.php');

$connect = dbconnect();

require('films.php');


if (array_key_exists('add', $_POST)) {

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
  	$result = add_film($connect, $_POST['name'], $_POST['genre'], $_POST['year'], $_POST['description']);

  	if($result) {
      $success = true;
      // echo "<div class='success'>Ошибка. Фильм не был добавлен в базу.</p>";
    }
    else {
      echo "<div class='error'>Ошибка. Фильм не был добавлен в базу.</p>";
      $success = false;
    }
  }


}

include('views/head.tpl');
include('views/notifications.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');

?>
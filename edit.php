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
    $result = update_film($connect, $_POST['name'], $_POST['genre'], $_POST['year'], $_GET['id'], $_POST['description']);

    if($result) {
      $resultSuccess = "Фильм был успешно добавлен в базу";
    }
    else {
      $resultError = "Ошибка. Фильм не был добавлен в базу";
    }
  }

}

$film = get_film($connect, $_GET['id']);

include('views/head.tpl');
include('views/notifications.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');

?>




